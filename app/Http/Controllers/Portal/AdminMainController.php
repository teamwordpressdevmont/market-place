<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class AdminMainController extends Controller
{
    
    // Function to create JSON file
    public function createJsonFile()
    {
        $filePath = public_path('myfile.json');

        if (!File::exists($filePath)) {
            $data = [];
            File::put($filePath, json_encode($data, JSON_PRETTY_PRINT));
        }

        return back()->with('success', 'JSON file created successfully.');
    }

    // Function to load JSON content
    public function showJsonContent()
    {
        $filePath = public_path('myfile.json');

        // Check if file exists
        if (!File::exists($filePath)) {
            return view('json_view', ['jsonData' => '[]']);
        }

        $jsonContent = File::get($filePath);
        return view('json_view', ['jsonData' => $jsonContent]);
    }

    // Function to append data to JSON file
    public function appendToJson(Request $request)
    {
        $filePath = public_path('myfile.json');

        if (!File::exists($filePath)) {
            return back()->with('error', 'JSON file does not exist.');
        }

        $newData = json_decode($request->json_data, true);

        // Validate JSON input
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->with('error', 'Invalid JSON format.');
        }

        // Read existing data
        $existingData = json_decode(File::get($filePath), true);

        // Append new data
        $updatedData = array_merge($existingData, [$newData]);

        // Save the updated JSON back to the file
        File::put($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));

        return back()->with('success', 'Data appended successfully.');
    }
}