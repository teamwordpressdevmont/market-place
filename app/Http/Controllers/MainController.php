<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Token;
use App\Models\Announcement;
use App\Models\UserAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


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

    /**
     * Get Notifications
     */
    public function getAnnouncements(Request $request)
    {
        try {

            $query = UserAnnouncement::with('announcements')->where('user_id', auth()->user()->id)->orderByDesc('created_at');

            // Offset & Limit for manual pagination
            $offset = $request->input('offset', 0);
            $perPage = $request->input('per_page', 10);
            $totalCount = $query->count();
            $orders = $query->offset($offset)->limit($perPage)->get();
            return response()->json([
                'success' => true,
                'message' => 'All notifications successfully retrieved',
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


    public function readAnnouncements(Request $request)
    {
        try {

            $validated = $request->validate([
                'announcement_id' => 'required',
            ]);

            $announcementIds = $request->input('announcement_id'); // Can be single ID or array

            // Convert to array if it's a single ID
            if (!is_array($announcementIds)) {
                $announcementIds = [$announcementIds];
            }

        // Mark announcement as read
        $user_announcement = UserAnnouncement::whereIn('id', $announcementIds)
            ->where('user_id', auth()->user()->id)
            ->delete();  // Use delete() here instead of destroy()

            return response()->json([
                'success' => true,
                'message' => 'Announcement read successfully',
                'data' => $user_announcement,
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
                'message' => 'Failed to mark announcement read',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}