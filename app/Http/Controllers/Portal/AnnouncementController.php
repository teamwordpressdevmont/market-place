<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function addEdit(){

        $roles = Role::all(); 
        return view('announcement.add-edit', compact('roles'));
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
            ->with('users') // Role nahi, ab users ka relation fetch hoga
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
            'role' => 'required|exists:roles,name'
        ]);
    
        DB::beginTransaction();
        try {


            $announcement = Announcement::create([
                'title'   => $request->title,
                'message' => $request->message
            ]);
                
            $users = User::whereHas('roles', function ($query) use ($request) {
                $query->where('name', $request->role);
            })->pluck('id');
            
            // dd($users);
    
            if ($users->isNotEmpty()) {
                $announcement->users()->attach($users);
            }
    
            DB::commit();
            return redirect()->route('announcement.list')->with('success', 'Announcement submitted successfully!');
        } catch (\Throwable $e) {  // Throwable used for better error catching
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Announcement: ' . $e->getMessage());
        }
    }    
    
}
