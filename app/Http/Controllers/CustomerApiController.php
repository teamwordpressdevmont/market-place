<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\TradepersonReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
                'customer_id' => 'required|exists:customers,id',
                'tradeperson_id' => 'nullable|exists:tradepersons,id',
                'order_status' => 'required|string|max:255',
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
                'image.*' => 'nullable|string', 
                'additional_notes' => 'nullable|string',
                'featured' => 'nullable|string',
    
                // Categories
                'categories' => 'required|array',
                'categories.*' => 'exists:categories,id' 
            ]);
    
            // Use DB Transaction to ensure atomicity
            DB::beginTransaction();
    
            // Step 1: Create Order
            $order = Order::create([
                'customer_id' => $validated['customer_id'],
                'tradeperson_id' => $validated['tradeperson_id'] ?? null,
                'order_status' => $validated['order_status'],
                'payment_status' => $validated['payment_status'],
            ]);
    
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
                'image' => json_encode($validated['image'] ?? []), // Store as JSON
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
    
}