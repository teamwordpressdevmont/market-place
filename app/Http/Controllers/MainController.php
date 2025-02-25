<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


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
}
