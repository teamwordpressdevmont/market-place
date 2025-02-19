<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CustomerApiController extends Controller
{
    // submit order
    public function createOrder(Request $request)
    {
        try {
            // Validate incoming request
            $validated = $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'tradeperson_id' => 'nullable|exists:tradepersons,id',
                'order_status' => 'required|string|max:255',
                'payment_status' => 'required|string|max:255',
            ]);

            // Use DB Transaction to ensure atomicity
            DB::beginTransaction();

            // Create Order
            $order = Order::create($validated);

            // Commit the transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'data' => $order
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
    
    // get orders
    public function getOrders(Request $request)
    {
        try {
            // Start query
            $query = Order::with(['customer', 'tradeperson'])->orderBy('created_at', 'desc');

            // Apply filters dynamically
            if ($request->has('tradeperson_id')) {
                $query->where('tradeperson_id', $request->tradeperson_id);
            }

            if ($request->has('customer_id')) {
                $query->where('customer_id', $request->customer_id);
            }

            if ($request->has('order_status')) {
                $query->where('order_status', $request->order_status);
            }

            if ($request->has('payment_status')) {
                $query->where('payment_status', $request->payment_status);
            }

            // Default values for pagination
            $offset = $request->input('offset', 0);   // Default: 0
            $perPage = $request->input('per_page', 10); // Default: 10

            // Get paginated orders
            $orders = $query->offset($offset)->limit($perPage)->get();
            $totalCount = Order::count();

            return response()->json([
                'success' => true,
                'message' => 'Orders retrieved successfully',
                'total_orders' => $totalCount,
                'offset' => $offset,
                'per_page' => $perPage,
                'data' => $orders
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
