<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProposal;
use App\Models\OrderMilestone;
use App\Models\TradepersonReview;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\Notification;
use App\Models\UserNotification;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Events\SubmitProposal;


class TradepersonApiController extends Controller
{
    // Search Orders
    public function searchOrders(Request $request)
    {
        try {
            $query = Order::with(['orderDetail', 'categories'])
                ->leftJoin('order_details', 'orders.id', '=', 'order_details.order_id')
                ->leftJoin('order_categories', 'orders.id', '=', 'order_categories.order_id');


            // Search by title or description
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->whereLike('order_details.title', "%$search%")
                        ->orWhereLike('order_details.description', "%$search%");
                });
            }

            // Filter by category
            if ($request->filled('categories')) {
                $categoryIds = $request->input('categories');

                foreach ($categoryIds as $categoryId) {
                    $query->whereHas('categories', function ($q) use ($categoryId) {
                        $q->where('category_id', $categoryId);
                    });
                }
            }

            // Budget range filter
            if ($request->filled('budget_min')) {
                $query->where('order_details.budget', '>=', $request->input('budget_min'));
            }
            if ($request->filled('budget_max')) {
                $query->where('order_details.budget', '<=', $request->input('budget_max'));
            }

            // Filter by postal code (location)
            if ($request->filled('location')) {
                $location = $request->input('location');
                $query->whereLike('order_details.location', "%$location%");
            }

            // Filter by urgent orders
            if ($request->filled('urgent')) {
                $query->where('order_details.urgent', $request->input('urgent'));
            }

            $allowed_status = [1];
            $query->whereIn('order_status', $allowed_status);

            $offset = $request->input('offset', 0);
            $perPage = $request->input('per_page', 10);
            $totalCount = $query->count(); // Get total count of orders

            $orders = $query->select('orders.*')->distinct()->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'message' => 'Orders retrieved successfully',
                'total_orders' => $totalCount,
                'offset' => $offset,
                'per_page' => $perPage,
                'data' => $orders,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve orders',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    //Deactivate Account
    public function deleteAccount(Request $request)
    {
        $tradeperson = $request->user();

        if (!$tradeperson) {
            return response()->json(['message' => 'Unauthorized: No associated tradeperson found'], 401);
        }

        // already deactivated
        if ($tradeperson->user_approved == 0) {
            return response()->json(['message' => 'Account already deleted'], 400);
        }

        // Update user_approved to 0
        $tradeperson->update(['user_approved' => 0]);

        return response()->json(['message' => 'Account deleted successfully'], 200);
    }


    // submit proposal
    public function submitProposal(Request $request)
    {
        try {
            $tradeperson = $request->user()->tradeperson;

            if (!$tradeperson) {
                return response()->json(['success' => false, 'message' => 'Unauthorized: No associated tradeperson found'], 401);
            }

            // Validate request
            $validated = $request->validate([
                'order_id' => 'required|exists:orders,id',
                'proposed_price' => 'required|numeric|min:0',
                'proposal_description' => 'required|string',
                'featured' => 'nullable|boolean',
                'milestones' => 'nullable|array',
                'milestones.*.title' => 'required|string',
                'milestones.*.days' => 'nullable|integer|min:1',
                'milestones.*.approved' => 'nullable|boolean',
            ]);

            $order = Order::find($request->order_id);

            if (!$order) {
                return response()->json(['success' => false, 'message' => 'Order not found'], 404);
            }

            if (!$order->customer_id) {
                return response()->json(['success' => false, 'message' => 'Order has no associated customer'], 400);
            }

            DB::beginTransaction();

            // Create Proposal
            $proposal = OrderProposal::create([
                'customer_id' => $order->customer_id,
                'tradeperson_id' => $tradeperson->id,
                'order_id' => $request->order_id,
                'proposed_price' => $request->proposed_price,
                'proposal_description' => $request->proposal_description, // FIXED TYPO
                'proposal_status' => 3, // Default: Pending
                'featured' => $request->featured ?? 0,
            ]);

            $milestones = null;
            if (!empty($request->milestones)) {
                $milestoneData = array_map(function ($milestone) {
                    return [
                        'title' => $milestone['title'],
                        'days' => $milestone['days'] ?? null,
                        'approved' => $milestone['approved'] ?? 0
                    ];
                }, $request->milestones);

                $milestones = OrderMilestone::create([
                    'order_id' => $order->id,
                    'tradeperson_id' => $tradeperson->id,
                    'milestone' => json_encode($milestoneData),
                ]);
            }

            $customer_user_id = Customer::where('id', $order->customer_id)->value('user_id');

            $notification = Notification::where("id", 7)->first();
            $user_notification = UserNotification::create([
                'notification_id' => $notification->id,
                'user_id' => $customer_user_id,
                'reference_link' => url('/api/orders'),
            ]);

            $notification = Notification::where("id", 6)->first();
            $user_notification = UserNotification::create([
                'notification_id' => $notification->id,
                'user_id' => $customer_user_id,
                'reference_link' => url('/api/orders'),
            ]);

            DB::commit();

            // Retrieve required details for email
            $customer = Customer::find($order->customer_id);
            $customerName = $customer->first_name . ' ' . $customer->last_name;
            $customerEmail = User::where('id', $customer->user_id)->value('email');

            $currentUserTradePerson = $request->user()->name;

            $orderDetails = OrderDetail::find($request->order_id);
            $orderTitle = $orderDetails->title;

            $submitProposalEmailData = (object)[
                'current_user_tradeperson' => $currentUserTradePerson,
                'customer_name' => $customerName,
                'order_title' => $orderTitle,
                'customerEmail_Sender' => $customerEmail
            ];

            event(new SubmitProposal($submitProposalEmailData));

            return response()->json([
                'success' => true,
                'message' => 'Proposal submitted successfully',
                'proposal' => $proposal,
                'milestones' => $milestones ? json_decode($milestones->milestone) : null,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error (to avoid exposing sensitive details)
            \Log::error('Proposal Submission Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // get Reviews
    public function getTradepersonReviews(Request $request)
    {
        try {
            // Get the tradeperson ID from the authenticated user
            $tradeperson_id = optional($request->user()->tradeperson)->id;

            if (!$tradeperson_id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized: No associated tradeperson found',
                ], 403);
            }

            // Get filters from request
            $orderId = $request->input('order_id');
            $customerId = $request->input('customer_id');
            $rating = $request->input('rating');

            // Query Builder
            $query = TradepersonReview::query();

            if ($tradeperson_id) {
                $query->where('tradeperson_id', $tradeperson_id);
            }

            if ($orderId) {
                $query->where('order_id', $orderId);
            }

            if ($customerId) {
                $query->where('customer_id', $customerId);
            }

            if ($rating) {
                $query->where('rating', $rating);
            }

            // Offset & Limit for manual pagination
            $offset = $request->input('offset', 0);
            $perPage = $request->input('per_page', 10);
            $totalCount = $query->count();
            $reviews = $query->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'message' => 'Tradeperson reviews retrieved successfully',
                'total_reviews' => $totalCount,
                'offset' => $offset,
                'per_page' => $perPage,
                'data' => $reviews,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve tradeperson reviews',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getTradepersonOrder(Request $request)
    {
        try {
            $tradeperson_id = optional($request->user()->tradeperson)->id;

            if (!$tradeperson_id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized: No associated tradeperson found',
                ], 403);
            }

            // Validate request parameters
            $request->validate([
                'customer_id' => 'nullable|integer|exists:orders,customer_id',
                'filter' => 'nullable|string|in:active_job,progress_job,pending_job,completed_job,recent_jobs',
                'offset' => 'nullable|integer|min:0',
                'per_page' => 'nullable|integer|min:1|max:100',
                'with_proposal' => 'nullable|boolean',
                'with_reviews' => 'nullable|boolean',
                'with_details' => 'nullable|boolean',
                'with_categories' => 'nullable|boolean',
                'with_milestones' => 'nullable|boolean'
            ]);

            $customer_id = $request->input('customer_id');
            $filter = $request->input('filter');
            $offset = (int) $request->input('offset', 0);
            $perPage = (int) $request->input('per_page', 10);

            // Query Builder
            $query = Order::query();

            // Apply tradeperson filter
            if ($tradeperson_id) {
                $query->where('tradeperson_id', $tradeperson_id);
            }

            // Apply customer filter
            if ($customer_id) {
                $query->where('customer_id', $customer_id);
            }

            // Apply status filter
            if ($filter) {
                $statusMap = [
                    'active_job' => 1,
                    'progress_job' => 2,
                    'pending_job' => 3,
                    'completed_job' => 4
                ];

                if ($filter === 'recent_jobs') {
                    $query->orderByDesc('created_at');
                } elseif (isset($statusMap[$filter])) {
                    $query->where('order_status', $statusMap[$filter]);
                }
            }

            // Include relationships dynamically
            $relations = [];

            if ($request->boolean('with_proposal')) {
                $relations[] = 'orderProposals';
            }

            if ($request->boolean('with_reviews')) {
                $relations[] = 'review';
            }

            if ($request->boolean('with_details')) {
                $relations[] = 'orderDetail';
            }

            if ($request->boolean('with_categories')) {
                $relations[] = 'categories';
            }

            if ($request->boolean('with_milestones')) {
                $relations[] = 'orderMilestones';
            }

            if (!empty($relations)) {
                $query->with($relations);
            }

            // Fetch results with pagination
            $totalCount = $query->count();
            $orders = $query->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'message' => 'Tradeperson orders retrieved successfully',
                'total_orders' => $totalCount,
                'offset' => $offset,
                'per_page' => $perPage,
                'data' => $orders,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // get trade person profile api -- get
    public function getTradePersonProfile(Request $request)
    {
        try {
            $user = User::with('tradeperson.categories')->find(auth()->user()->id);
            $categories = Category::where('parent_id', null)->get();

            return response()->json([
                'success' => true,
                'message' => 'User retrieved successfully',
                'data' => [
                    'user' => $user,
                    'categories' => $categories
                ],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // update trade person api - patch
    public function updateTradePerson(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::find($request->user()->id);
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $validatedData = $request->validate([
                'email' => 'sometimes|email|unique:users,email,' . $user->id,
                'password' => 'sometimes|min:6',
                'first_name' => 'sometimes|string|min:3|max:30',
                'last_name' => 'sometimes|string|min:3|max:30',
                'gender' => 'sometimes|string|in:Male,Female',
                'phone_number' => 'sometimes|string|regex:/^\+?[0-9]{7,15}$/',
                'city' => 'sometimes|string',
                'postal_code' => 'sometimes|string|regex:/^\d{5,6}$/',
                'about_me' => 'sometimes|string|min:10|max:1000',
                'service' => 'sometimes|string|min:10|max:1000',
                'address' => 'sometimes|string',
                'categories' => 'sometimes|array',
                'categories.*' => 'integer|exists:categories,id',
                'portfolio' => 'sometimes|array',
                'portfolio.*' => 'image|mimes:jpg,png,jpeg|max:2048',
                'certificate' => 'sometimes|file|mimes:pdf,doc,docx|max:5120',
                'avatar' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',

            ]);


            $traderPerson = TradePerson::where('user_id', $user->id)->first();
            if (!$traderPerson) {
                return response()->json([
                    'success' => false,
                    'message' => 'TradePerson not found'
                ], 404);
            }

            $userData = [
                'email' => $request->email ?? $user->email,
                'password' => $request->has('password') ? Hash::make($validatedData['password']) : $user->password,
                'name' => trim(($validatedData['first_name'] ?? $traderPerson->first_name) . ' ' . ($validatedData['last_name'] ?? $traderPerson->last_name))
            ];

            $user->update($userData);

            // Handle Avatar Upload
            if ($request->hasFile('avatar')) {
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }
                $path = $request->file('avatar')->store('avatar', 'public');
                $user->update(['avatar' => $path]);
            }

            $nick_name = strtoupper(substr($validatedData['first_name'] ?? $traderPerson->first_name, 0, 1)) . ' ' . strtoupper(substr($validatedData['last_name'] ?? $traderPerson->last_name, 0, 1));

            // Update TradePerson
            $traderPerson->update([
                'first_name' => $validatedData['first_name'] ?? $traderPerson->first_name,
                'last_name' => $validatedData['last_name'] ?? $traderPerson->last_name,
                'nick_name' => $nick_name,
                'gender' => $validatedData['gender'] ?? $traderPerson->gender,
                'phone' => $validatedData['phone_number'] ?? $traderPerson->phone,
                'city' => $validatedData['city'] ?? $traderPerson->city,
                'postal_code' => $validatedData['postal_code'] ?? $traderPerson->postal_code,
                'about_me' => $validatedData['about_me'] ?? $traderPerson->about_me,
                'service' => $validatedData['service'] ?? $traderPerson->service,
                'address' => $validatedData['address'] ?? $traderPerson->address,
            ]);

            // Handle Portfolio
            if ($request->hasFile('portfolio')) {
                if ($traderPerson->portfolio) {
                    foreach (json_decode($traderPerson->portfolio) as $oldFile) {
                        if (Storage::disk('public')->exists($oldFile)) {
                            Storage::disk('public')->delete($oldFile);
                        }
                    }
                }
                $portfolioArr = [];
                foreach ($request->file('portfolio') as $portfolio) {
                    $portfolioArr[] = $portfolio->store('tradeperson_portfolio', 'public');
                }
                $traderPerson->update(['portfolio' => json_encode($portfolioArr)]);
            }

            // Handle Certificate Upload
            if ($request->hasFile('certificate')) {
                if ($traderPerson->certificate && Storage::disk('public')->exists($traderPerson->certificate)) {
                    Storage::disk('public')->delete($traderPerson->certificate);
                }
                $certificatePath = $request->file('certificate')->store('tradeperson_certificate', 'public');
                $traderPerson->update(['certificate' => $certificatePath]);
            }

            // Update Categories
            if ($request->has('categories')) {
                $traderPerson->categories()->sync($validatedData['categories']);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'TradePerson updated successfully!',
                'data' => $user->load('tradeperson')
            ], 200);
        } catch (ValidationException $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}