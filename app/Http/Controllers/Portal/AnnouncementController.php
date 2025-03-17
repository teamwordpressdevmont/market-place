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


    public function store(Request $request) {

        $request->validate([
            'name'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'user_id'      => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $validatedData = $request->only(['name', 'description' , 'user_id']);

            Announcement::create($validatedData);

            DB::commit();
            return redirect()->route('announcement.list')->with('success', 'Announcement submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Announcement: ' . $e->getMessage());
        }
    }
}
