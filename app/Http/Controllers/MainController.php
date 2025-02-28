<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\Order;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

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

    public function getCustomerOrder(Request $request)
    {
        try {
            $request->validate([
                'id' => 'nullable|integer|exists:users,id',
                'filter' => 'nullable|string|in:active_job,pending_job,completed_job',
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

            $query = Order::with(['orderDetail', 'customer', 'tradeperson'])->orderByDesc('created_at');

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

    public function getCustomerProfile(Request $request)
    {
        try {
            

            $user = User::with('customer')->find(auth()->user()->id);

            return response()->json([
                'success' => true,
                'message' => 'User retrieved successfully',
                'data' => $user
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
    
    // public function getCustomerReview(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'user_id' => 'required|integer|exist:users,id'
    //         ]);



    //     } catch (ValidationException $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Validation error',
    //             'errors' => $e->errors()
    //         ], 422);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
}