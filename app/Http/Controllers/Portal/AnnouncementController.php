<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\User;
use App\Models\UserAnnouncement;
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
        $sortBy = in_array($request->input('sort_by'), ['id', 'title', 'created_at']) ? $request->input('sort_by') : 'id';
        $sortDirection = in_array($request->input('sort_direction'), ['asc', 'desc']) ? $request->input('sort_direction') : 'asc';
    
        $announcements = Announcement::with('users')
            ->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', "%{$search}%")
                             ->orWhere('message', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10)
            ->appends($request->query());
    
        if ($request->ajax()) {
            return response()->json([
                'html' => view('announcement.list', compact('announcements'))->render(),
                'pagination' => (string) $announcements->links()
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
                
            $users = User::role($request->role)->pluck('id');
            // dd($users);
    
            if ($users->isNotEmpty()) {
                foreach ($users as $userId) {
                    UserAnnouncement::create([
                        'user_id'         => $userId,
                        'announcement_id' => $announcement->id,
                    ]);
                }
            }
    
            DB::commit();
            return redirect()->route('announcement.list')->with('success', 'Announcement submitted successfully!');
        } catch (\Throwable $e) {  // Throwable used for better error catching
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Failed to submit Announcement: ' . $e->getMessage());
        }
    }    
    
}
