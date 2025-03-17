<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserNotification;
use Auth;

class NotificationApiController extends Controller
{
    /**
     * Get Notifications
     */
    public function getNotifications(Request $request)
    {
        try {

            $query = UserNotification::with('notifications')->where('user_id', Auth::user()->id)->orderByDesc('created_at');

            // Offset & Limit for manual pagination
            $offset = $request->input('offset', 0);
            $perPage = $request->input('per_page', 10);
            $totalCount = $query->count();
            $orders = $query->offset($offset)->limit($perPage)->get();
            return response()->json([
                'success' => true,
                'message' => 'All notifications successfully',
                'total_notifications' => $totalCount,
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


    public function readNotifications(Request $request)
    {
        try {

            $validated = $request->validate([
                'notification_id' => 'required',
            ]);

            $notificationIds = $request->input('notification_id'); // Can be single ID or array

            // Convert to array if it's a single ID
            if (!is_array($notificationIds)) {
                $notificationIds = [$notificationIds];
            }

            // Mark notifications as read
            $user_notification = UserNotification::whereIn('id', $notificationIds)->where('user_id',auth()->user()->id)->update(['read' => 1]);

            return response()->json([
                'success' => true,
                'message' => 'Notification Marked successfully',
                'data' => $user_notification,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to mark notification read',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
