<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderProposal;
use App\Models\OrderDetail;
use App\Models\TradepersonReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\Notification;
use App\Models\UserNotification;
use App\Models\Tradeperson;

class CustomerApiController extends Controller
{

    /**
     * Create Order for customer
     */
    public function createOrder(Request $request)
    {

        try {
            // Validate request data
            $validated = $request->validate([
                'tradeperson_id' => 'nullable|exists:tradepersons,id',
                'payment_status' => 'required|string|max:255',
                // Order Details
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'budget' => 'nullable|numeric',
                'urgent' => 'nullable|boolean',
                'urgent_price' => 'nullable|string',
                'job_start_timeline' => 'nullable|string',
                'job_end_timeline' => 'nullable|string',
                'location' => 'nullable|string',
                'address' => 'nullable|string',
                'image' => 'nullable|array',
                'image.*' => 'image',
                'additional_notes' => 'nullable|string',
                'featured' => 'nullable|string',
                // Categories
                'categories' => 'required|array',
                'categories.*' => 'required|exists:categories,id'
            ]);

            // Use DB Transaction to ensure atomicity
            DB::beginTransaction();
            $customer_id = auth()->user()?->customer?->id;

            if (!$customer_id) {
                return response()->json([
                    'success' => false,
                    "message" => "Customer Detail Not Found",
                ], 404);
            }


            $order = Order::create([
                'customer_id' => $customer_id,
                'tradeperson_id' => $validated['tradeperson_id'] ?? null,
                'order_status' => 1,
                'payment_status' => $validated['payment_status'],
            ]);
            $imagePaths = [];
            if ($request->hasFile("image")) {
                foreach ($request->file("image") as $image) {
                    $path = $image->store("order_images", "public"); // Store image in storage/app/public/order_images
                    $imagePaths[] = basename($path); // Store only the image name
                }
            }
            // Step 2: Create Order Details
            $orderDetails = OrderDetail::create([
                'order_id' => $order->id,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'budget' => $validated['budget'] ?? null,
                'urgent' => $validated['urgent'] ?? false,
                'urgent_price' => $validated['urgent_price'] ?? null,
                'job_start_timeline' => $validated['job_start_timeline'] ?? null,
                'job_end_timeline' => $validated['job_end_timeline'] ?? null,
                'location' => $validated['location'] ?? null,
                'address' => $validated['address'] ?? null,
                'image' => json_encode($imagePaths), // Store as JSON
                'additional_notes' => $validated['additional_notes'] ?? null,
                'featured' => $validated['featured'] ?? null,
            ]);

            // Step 3: Assign Categories
            $categoriesWithTimestamps = collect($validated['categories'])->mapWithKeys(function ($categoryId) {
                return [$categoryId => ['created_at' => now(), 'updated_at' => now()]];
            })->toArray();

            $order->categories()->attach($categoriesWithTimestamps);

            // Commit the transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'data' => [
                    'order' => $order,
                    'order_details' => $orderDetails,
                    'categories' => $validated['categories']
                ]
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Rollback in case of failure
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to create order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get Order for customer
     */
    public function getOrders(Request $request)
    {
        try {
            $request->validate([
                'tradeperson_id' => 'nullable|integer|exists:tradepersons,id',
                'customer_id' => 'nullable|integer|exists:customers,id',
                'order_status' => 'nullable|integer|in:1,2,3,4,5',
                'payment_status' => 'nullable|string|in:paid,unpaid',
                'budget_min' => 'nullable|numeric|min:0',
                'budget_max' => 'nullable|numeric|min:0',
                'urgent' => 'nullable|boolean',
                'featured' => 'nullable|boolean',
                'location' => 'nullable|string',
                'search' => 'nullable|string',
                'offset' => 'nullable|integer|min:0',
                'per_page' => 'nullable|integer|min:1|max:100',
                'with_category' => 'nullable|boolean',
                'with_review' => 'nullable|boolean',
                'with_proposals' => 'nullable|boolean',
            ]);


            $query = Order::with(['orderDetail', 'customer', 'tradeperson'])->orderByDesc('created_at');

            if ($request->filled('with_category')) {
                $query->with('categories');
            }

            if ($request->filled('with_proposals')) {
                $query->with('proposals');
            }

            if ($request->filled('with_review')) {
                $query->with('review');
            }

            if ($request->filled('tradeperson_id')) {
                $query->where('tradeperson_id', $request->tradeperson_id);
            }
            if ($request->filled('customer_id')) {
                $query->where('customer_id', $request->customer_id);
            }
            if ($request->filled('order_status')) {
                $query->where('order_status', $request->order_status);
            }
            if ($request->filled('payment_status')) {
                $query->where('payment_status', $request->payment_status == "paid" ? 1 : 0);
            }

            $query->whereHas('orderDetail', function ($q) use ($request) {
                if ($request->filled('budget_min')) {
                    $q->where('budget', '>=', (float) $request->budget_min);
                }
                if ($request->filled('budget_max')) {
                    $q->where('budget', '<=', (float) $request->budget_max);
                }
                if ($request->filled('urgent')) {
                    $q->where('urgent', $request->urgent);
                }
                if ($request->filled('featured')) {
                    $q->where('featured', $request->featured);
                }
                if ($request->filled('location')) {
                    $q->where('location', 'like', "%{$request->location}%");
                }
                if ($request->filled('search')) {
                    $q->where(function ($sq) use ($request) {
                        $sq->where('title', 'like', "%{$request->search}%")
                            ->orWhere('description', 'like', "%{$request->search}%");
                    });
                }
            });

            // Offset & Limit for manual pagination
            $offset = $request->input('offset', 0);
            $perPage = $request->input('per_page', 10);
            $totalCount = $query->count();
            $orders = $query->offset($offset)->limit($perPage)->get();
            return response()->json([
                'success' => true,
                'message' => 'Orders retrieved successfully',
                'total_orders' => $totalCount,
                'offset' => $offset,
                'per_page' => $perPage,
                'data' => $orders
            ]);
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

    /**
     * Submit Review for Order by customer
     */
    public function submitReview(Request $request)
    {
        try {
            $customer_id = optional($request->user()->customer)->id;

            if (!$customer_id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized: No associated customer found',
                ], 403);
            }

            // Validate request
            $validated = $request->validate([
                'tradeperson_id' => 'required|exists:tradepersons,id',
                'order_id' => 'required|exists:orders,id',
                'review' => 'nullable|string',
                'rating' => 'required|numeric|min:1|max:5',
            ]);

            // Check if the review already exists for this order and tradeperson
            $existingReview = TradepersonReview::where('order_id', $validated['order_id'])->first();

            if ($existingReview) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already reviewed this order.',
                ], 400);
            }

            $order = Order::find($validated['order_id']);

            // Ensure the order exists
            if (!$order) {
                return response()->json([
                    'success' => false,
                    'message' => 'Order not found.',
                ], 404);
            }

            // Check if the review is being submitted by the correct customer for the correct tradeperson
            if ($order->customer_id != $customer_id || $order->tradeperson_id != $validated['tradeperson_id']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid customer or tradeperson for this order.',
                ], 403);
            }

            // Use DB Transaction to ensure atomicity
            DB::beginTransaction();

            // Create the review
            $review = TradepersonReview::create([
                'customer_id' => $customer_id,
                'tradeperson_id' => $validated['tradeperson_id'],
                'order_id' => $validated['order_id'],
                'review' => $validated['review'] ?? null,
                'rating' => $validated['rating'],
            ]);

            // Commit transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Review submitted successfully',
                'data' => $review,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Rollback transaction in case of failure
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to submit review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Get Reviews by customer
     */
    public function getReviews(Request $request)
    {
        try {
            $customer_id = optional($request->user()->customer)->id;

            if (!$customer_id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized: No associated customer found',
                ], 403);
            }

            // Get filters from request
            $orderId = $request->query('order_id');
            $tradepersonId = $request->query('tradeperson_id');
            $rating = $request->query('rating');

            // Query Builder
            $query = TradepersonReview::query();

            if ($orderId) {
                $query->where('order_id', $orderId);
            }

            if ($customer_id) {
                $query->where('customer_id', $customer_id);
            }

            if ($tradepersonId) {
                $query->where('tradeperson_id', $tradepersonId);
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
                'message' => 'Reviews retrieved successfully',
                'total_orders' => $totalCount,
                'offset' => $offset,
                'per_page' => $perPage,
                'data' => $reviews,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve reviews',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // customer dashboard order API
    public function getCustomerOrder(Request $request)
    {
        try {
            $request->validate([
                'id' => 'nullable|integer|exists:users,id',
                'filter' => 'nullable|string|in:active_job,pending_job,completed_job,recent_jobs',
                'offset' => 'nullable|integer|min:0',
                'per_page' => 'nullable|integer|min:-1|max:100',
                'with_proposal' => 'nullable|boolean',
                'with_reviews' => 'nullable|boolean',
                'featured' => 'nullable|integer|in:0,1,2'
            ]);


            $user =  User::find(auth()->user()->id);

            if (!$user->hasRole('customer')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error',
                    'error' => "The provided ID does not belong to a customer."
                ], 400);
            }

            $query = Order::with(['orderDetail', 'customer', 'tradeperson']);

            if ($request->has('id')) {
                $query->where('id', $request->id);
            }

            if ($request->has('filter') && $request->get('filter') == "active_job") {
                $query->where('order_status', 1);
            }

            if ($request->has('filter') && $request->get('filter') == "pending_job") {
                $query->where('order_status', 3);
            }

            if ($request->has('filter') && $request->get('filter') == "completed_job") {
                $query->where('order_status', 4);
            }

            if ($request->has('filter') && $request->get('filter') == "recent_jobs") {
                $query->orderByDesc('created_at');
            }

            if ($request->has('with_proposal') && $request->get('with_proposal') == true) {
                $query->with('proposals');
            }

            if ($request->has('with_reviews') && $request->get('with_reviews') == true) {
                $query->with('review');
            }

            if ($request->filled('featured')) {
                $query->where('featured', $request->featured);
            }

            $total_count = $query->count();
            $offset = $request->input('offset', 0);
            $perPage = $request->input('per_page', 10);

            if ($perPage == -1) {
                $orders = $query->get();
            } else {
                $orders = $query->offset($offset)->limit($perPage)->get();
            }

            return response()->json([
                'success' => true,
                'message' => 'Orders retrieved successfully',
                'offset' => $offset,
                'per_page' => $perPage,
                'total_count' => $total_count,
                'data' => $orders
            ]);
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

    // customer profile API
    public function getCustomerProfile(Request $request)
    {
        try {
            $user = User::with('customer')->find(auth()->user()->id);
            return response()->json([
                'success' => true,
                'message' => 'User retrieved successfully',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // update Customer profile Api
    public function updateCustomerProfile(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'nullable',
                'last_name' => 'nullable',
                'email' => 'nullable|email',
                'gender' => 'nullable',
                'phone_number' => 'nullable',
                'city' => 'nullable',
                'postal_code' => 'nullable',
                'address' => 'nullable',
                'address2' => 'nullable',
                'avatar' => 'nullable|image'
            ]);

            $user = User::findOrFail(auth()->user()->id);



            if ($request->has('password')) {
                $request->validate([
                    'current_password' => 'required',
                    'password' => 'required|confirmed',
                ]);

                if (!Hash::check($request->current_password, $user->password)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error',
                        'error' => 'Current password is incorrect'
                    ], 400);
                }

                $user->password = Hash::make($request->password);
                $user->save();
            }

            if ($request->hasFile('avatar')) {
                $path =  $request->avatar->storeAs('user_avatar', 'public');
                $user->avatar = $path;
                $user->save();
            }

            // Update email if provided
            if ($request->filled('email')) {
                $user->update(['email' => $request->email]);
            }

            // Fetch customer details
            $customer = Customer::where('user_id', $user->id)->first();
            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error',
                    'error' => "Customer details not found!"
                ], 400);
            }

            $customer->update([
                'first_name' => $request->first_name ?? $customer->first_name,
                'last_name' => $request->last_name ?? $customer->last_name,
                'phone' => $request->phone_number ?? $customer->phone,
                'gender' => $request->gender ?? $customer->gender,
                'city' => $request->city ?? $customer->city,
                'country' => $request->country ?? $customer->country,
                'post_code' => $request->postal_code ?? $customer->post_code,
                'address' => $request->address ?? $customer->address,
                'address2' => $request->address2 ?? $customer->address2,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Customer updated successfully!',
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

    // get accepted propsal api
    public function getAcceptedProposal(Request $request)
    {
        try {
            $request->validate([
                'perPage' => 'nullable|integer',
                'offset' => 'nullable|integer',
                'proposal_id' => 'nullable|integer|exists:order_proposals,id',
                'status' => 'nullable|string|in:pending,accepted,rejected'
            ]);

            $customer_id = optional($request->user()->customer)->id;

            if (!$customer_id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized: No associated customer found',
                ], 403);
            }

            $perPage = $request->get('perPage', 10);
            $offset = $request->get('offset', 0);

            $query = OrderProposal::where('customer_id', $customer_id)
                ->with([
                    'order.orderDetail',
                    'tradeperson' => function ($q) {
                        $q->withCount('reviews')->withAvg('reviews', 'rating');
                    }
                ]);
            if ($request->has('proposal_id')) {
                $query->where('id', $request->proposal_id);
            }

            if ($request->has('status') && $request->get('status') == "pending") {
                $query->where('id', 3);
            }

            if ($request->has('status') && $request->get('status') == "accepted") {
                $query->where('id', 1);
            }

            if ($request->has('status') && $request->get('status') == "rejected") {
                $query->where('id', 2);
            }

            $orders = $query->offset($offset)
                ->limit($perPage)
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Proposal Retrieved Successfully',
                'offset' => $offset,
                'per_page' => $perPage,
                'data' => $orders
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // accept proposal api -- post
    public function acceptProposal(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'proposal_id' => 'required|integer|exists:order_proposals,id',
            ]);

            $orderProposal = OrderProposal::with('order')->find($request->proposal_id);

            if ($orderProposal->order->order_status == 1) {
                return response()->json([
                    'success' => false,
                    'message' => "Order is already in progress"
                ], 403);
            }


            if ($orderProposal->customer_id != auth()->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => "You can't accept this proposal"
                ], 403);
            }


            $order = Order::find($orderProposal->order_id);

            if (!$order) {
                return response()->json([
                    'success' => false,
                    'message' => "Order not found"
                ], 404);
            }

            // Update proposal status
            $orderProposal->update([
                'proposal_status' => 1,
            ]);

            //reject other propsal
            OrderProposal::where('order_id', $order->id)
                ->where('id', '!=', $orderProposal->id)
                ->update(['proposal_status' => 2]);

            // Update order details
            $order->update([
                'tradeperson_id' => $orderProposal->tradeperson_id,
                'order_status' => 2
            ]);

            $tradeperson_user_id = Tradeperson::where('id', $orderProposal->tradeperson_id)->value('user_id');

            // Create Proposal Accepted notification
            $notification = Notification::where("id", 4)->first();
            $user_notification = UserNotification::create([
                'notification_id' => $notification->id,
                'user_id' => $tradeperson_user_id,
                'reference_link' => url('/api/tradeperson-order'),
                
            ]);

            // Create Job Started notification
            $notification = Notification::where("id", 1)->first();
            $user_notification = UserNotification::create([
                'notification_id' => $notification->id,
                'user_id' => $tradeperson_user_id,
                'reference_link' => url('/api/tradeperson-order'),
                
            ]);

            DB::commit(); // Commit transaction

            return response()->json([
                'success' => true,
                'message' => "Proposal accepted and order is now in progress!"
            ]);
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

    // reject proposal api -- post
    public function rejectProposal(Request $request)
    {
        try {
            $request->validate([
                'proposal_id' => 'required|integer|exists:order_proposals,id',
            ]);

            $orderProposal = OrderProposal::find($request->proposal_id);

            // Pehle check karein ke proposal exist karta hai ya nahi
            if (!$orderProposal) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proposal not found'
                ], 404);
            }

            // Agar proposal accept ho chuka hai, to reject nahi karna chahiye
            if ($orderProposal->proposal_status == 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'This Proposal is already accepted, order is in progress'
                ], 403);
            }

            // Proposal reject karna
            $orderProposal->update([
                'proposal_status' => 2
            ]);

            // Create Proposal Rejected notification
            $notification = Notification::where("id", 5)->first();
            $user_notification = UserNotification::create([
                'notification_id' => $notification->id,
                'user_id' => $orderProposal->tradeperson_id,
                'reference_link' => url('/api/tradeperson-order'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Proposal rejected successfully!'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}