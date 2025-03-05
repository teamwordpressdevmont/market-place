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
            
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Proposal submitted successfully',
                'proposal' => $proposal,
                'milestones' => $milestones ? json_decode($milestones->milestone) : null,
            ], 201);
    
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

}
