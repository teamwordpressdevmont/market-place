<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\Order;
use App\Models\Token;
use App\Models\Tradeperson;
use App\Models\OrderProposal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


use Illuminate\Support\Facades\Crypt;


class MainController extends Controller
{
    /**
     * Get Reports API
     * If `meta_key` is provided, filter by key.
     */
    public function getReports(Request $request)
    {
        try {
            $query = Report::query();

            if ($request->has('meta_key')) {
                $query->where('key', $request->meta_key);
            }

            $reports = $query->get();

            return response()->json([
                'success' => true,
                'data' => $reports,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching reports.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store Report API
     */
    public function storeReport(Request $request)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'key' => 'required|string|unique:reports,key',
                'value' => 'required|string',
            ]);

            // Transaction for safe DB operation
            DB::beginTransaction();

            $report = Report::create($validatedData);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Report added successfully!',
                'data' => $report,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error adding report.',
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
                'per_page' => 'nullable|integer|min:1|max:100',
                'with_proposal' => 'nullable|boolean',
                'with_reviews' => 'nullable|boolean'
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

            $offset = $request->input('offset', 0);
            $perPage = $request->input('per_page', 10);
            $orders = $query->offset($offset)->limit($perPage)->get();


            return response()->json([
                'success' => true,
                'message' => 'Orders retrieved successfully',
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

    // get security token api for public api
    public static function getToken()
    {
        try {
            $token = Token::latest()->first();
            if (!$token) {
                return response()->json([
                    'success' => false,
                    'message' => 'No token found',
                    'encrypted_token' => null,
                    'decrypted_token' => null
                ], 404);
            }
            $decryptedToken = Crypt::decryptString($token->token);
            return response()->json([
                'success' => true,
                'message' => 'Token retrieved successfully',
                'encrypted_token' => $token->token,
                'decrypted_token' => $decryptedToken
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve token',
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

            // Update order details
            $order->update([
                'tradeperson_id' => $orderProposal->tradeperson_id,
                'order_status' => 2
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

    // register tradeperson api -- post
    public function storeTradePerson(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'first_name' => 'required|string|min:3|max:30',
                'last_name' => 'sometimes|string|min:3|max:30',
                'gender' => 'required|string|in:Male,Female',
                'phone_number' => 'sometimes|string|regex:/^\+?[0-9]{7,15}$/',
                'city' => 'required|string',
                'postal_code' => 'required|string|regex:/^\d{5,6}$/',
                'about_me' => 'sometimes|string|min:10|max:1000',
                'address' => 'required|string',
                'categories' => 'required|array',
                'categories.*' => 'sometimes|integer|exists:categories,id',
                'portfolio' => 'sometimes|array',
                'portfolio.*' => 'image|mimes:jpg,png,jpeg|max:2048',
                'certificate' => 'sometimes|file|mimes:pdf,doc,docx|max:5120',
                'avatar' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            // Create User
            $fullName = trim($request->first_name . ' ' . $request->get('last_name', ''));

            $user = User::create([
                'email' => $request->email,
                'name' => $fullName,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
                'user_approved' => 1
            ]);
            $user->assignRole('tradeperson');
            // Handle Avatar Upload
            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('avatar', 'public');
                $user->avatar = $path;
                $user->save(); // Save user after updating avatar
            }

            // Create Tradeperson Entry
            $traderPerson = Tradeperson::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'phone' => $request->phone_number, // Fixed variable
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'about_me' => $request->about_me,
                'address' => $request->address,
            ]);

            // Handle Portfolio Images
            if ($request->hasFile('portfolio')) {
                $portfolioArr = [];
                foreach ($request->file('portfolio') as $portfolio) {
                    $path = $portfolio->store('tradeperson_portfolio', 'public');
                    $portfolioArr[] = $path;
                }
                $traderPerson->portfolio = $portfolioArr;
                $traderPerson->save();
            }

            // Handle Certificate Upload
            if ($request->hasFile('certificate')) {
                $certificatePath = $request->file('certificate')->store('tradeperson_certificate', 'public');
                $traderPerson->certificate = $certificatePath;
                $traderPerson->save();
            }

            if ($request->categories) {
                $traderPerson->categories()->attach($request->categories);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Trade Person registered successfully!',
                'data' => $user->load('tradeperson')
            ], 201); // 201 is better for resource creation
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

            // Update TradePerson
            $traderPerson->update([
                'first_name' => $validatedData['first_name'] ?? $traderPerson->first_name,
                'last_name' => $validatedData['last_name'] ?? $traderPerson->last_name,
                'gender' => $validatedData['gender'] ?? $traderPerson->gender,
                'phone' => $validatedData['phone_number'] ?? $traderPerson->phone,
                'city' => $validatedData['city'] ?? $traderPerson->city,
                'postal_code' => $validatedData['postal_code'] ?? $traderPerson->postal_code,
                'about_me' => $validatedData['about_me'] ?? $traderPerson->about_me,
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