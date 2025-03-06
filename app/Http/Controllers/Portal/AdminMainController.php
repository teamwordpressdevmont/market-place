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
    public function createJsonFile(Request $request)
    {
        $request->validate([
            'file_name' => ['required', 'regex:/^[a-zA-Z0-9_-]+$/']
        ]);

        $fileName = $request->file_name . '.json';
        $filePath = public_path($fileName);

        if (File::exists($filePath)) {
            return back()->with('error', 'File with this name already exists.');
        }

        File::put($filePath, json_encode(new \stdClass(), JSON_PRETTY_PRINT));

        return back()->with('success', 'JSON file created successfully.');
    }

    // Function to load JSON content
    public function showJsonContent(Request $request)
    {
        $publicPath = public_path();
        $jsonFiles = collect(File::files($publicPath))
            ->filter(fn($file) => $file->getExtension() === 'json')
            ->map(fn($file) => $file->getFilename())
            ->values()
            ->toArray();

        if (empty($jsonFiles)) {
            return view('json_view', ['jsonFiles' => [], 'selectedFile' => null, 'jsonData' => '']);
        }

        $selectedFile = $request->get('file', $jsonFiles[0]); // Default to first file
        $filePath = public_path($selectedFile);
        $jsonData = File::exists($filePath) ? File::get($filePath) : '';

        return view('json_view', compact('jsonFiles', 'selectedFile', 'jsonData'));
    }

    // Function to append data to JSON file
    public function updateJsonFile(Request $request)
    {
        
        if (!$request->has('selected_file')) {
            return back()->with('error', 'No file selected.');
        }
        $filePath = public_path($request->selected_file);
        

        if (!File::exists($filePath)) {
            return back()->with('error', 'Selected JSON file does not exist.');
        }

        // Validate JSON input
        $updatedData = json_decode($request->json_data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->with('error', 'Invalid JSON format.');
        }

        // Save the updated JSON back to the file
        File::put($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));

        return redirect()->route('json.show', ['file' => $request->selected_file])
            ->with('success', 'JSON file updated successfully.');
    }
    
}