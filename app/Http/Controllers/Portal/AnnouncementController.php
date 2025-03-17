<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function addEdit(){

        return view('announcement.add-edit');
    }

    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');

        $announcements = Announcement::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', "%{$search}%")
                        ->orWhere('message', 'like', "%{$search}%");
        })
        ->with('role')
        ->orderBy($sortBy, $sortDirection)
        ->paginate(10);

        // If the request is AJAX, return only the HTML content
        if ($request->ajax()) {
            return response()->json([
                'html' => view('announcement.list', compact('announcements'))->render(),
                'pagination' => (string) $announcements->appends($request->query())->links()
            ]);
        }

        return view('announcement.list', compact('announcements', 'search', 'sortBy', 'sortDirection'));
    }


    public function store(Request $request) {
        $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'nullable|string',
            'role_id' => 'nullable|integer|exists:roles,id',
        ]);
    
        DB::beginTransaction();
        try {
            $validatedData = $request->only(['title', 'message', 'role_id']);
    
            // Ensure role_id is null if empty, otherwise convert to integer
            $validatedData['role_id'] = !empty($validatedData['role_id']) ? (int) $validatedData['role_id'] : null;
    
            Announcement::create($validatedData);
    
            DB::commit();
            return redirect()->route('announcement.list')->with('success', 'Announcement submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Announcement: ' . $e->getMessage());
        }
    }
    
    
}
