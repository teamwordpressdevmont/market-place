<?php

namespace App\Http\Controllers\Portal;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class testimonialDataController extends Controller
{
    public function addEdit() {
        $users = User::select('id', 'name')->get();
        return view('testimonial.add-edit', compact('users'));
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $request->validate([
                'user_id'        => 'nullable|exists:users,id',
                'name'        => 'required|string|max:255',
                'heading'        => 'required|string|max:255',
                'description'      => 'nullable|string',
                'rating'         => 'nullable|integer|between:1,5',
                'verified'       => 'nullable|boolean',
            ]);

            $validatedData = $request->only(['user_id', 'name', 'heading', 'description', 'rating', 'verified']);
            
            Testimonial::create($validatedData);
            DB::commit();
            return redirect()->route('testimonial.list')->with('success', 'Testimonial submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Blog: ' . $e->getMessage());
        }
    }

    public function list(Request $request) {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');

        $testimonials = Testimonial::when($search, function ($query) use ($search) {
                            $query->where('name', 'like', "%{$search}%");
                        })
                        ->orderBy($sortBy, $sortDirection)
                        ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('testimonial.list', compact('testimonials'))->render(),
                'pagination' => (string) $testimonials->appends($request->all())->links()
            ]);
        }
        
        return view('testimonial.list', compact('testimonials', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id) {
        $testimonials = Testimonial::findOrFail($id);
        $users = User::select('id', 'name')->get();
        return view('testimonial.add-edit', compact('testimonials', 'users'));
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            $request->validate([
                'user_id'        => 'nullable|exists:users,id',
                'name'        => 'required|string|max:255',
                'heading'        => 'required|string|max:255',
                'description'      => 'nullable|string',
                'rating'         => 'nullable|integer|between:1,5',
                'verified'       => 'nullable|boolean',
            ]);
            
            $testimonial = Testimonial::findOrFail($id);
            $validatedData = $request->only(['user_id', 'name', 'heading', 'description', 'rating', 'verified']);

            $testimonial->update($validatedData);
            DB::commit();
            return redirect()->route('testimonial.list')->with('success', 'Testimonial updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Testimonial: ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully!');
    }

    public function view($id) {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonial.view', compact('testimonial'));
    }

    public function toggleApproval($id)
    {
        DB::beginTransaction();
        try {
            $testimonial = Testimonial::findOrFail($id);

            if ($testimonial->approvedTestimonial) {
                // Remove from approved_testimonials
                $testimonial->approvedTestimonial->delete();
                $message = 'Testimonial removed from website!';
            } else {

                // Add to approved_testimonials
                $testimonial->approvedTestimonial()->create([
                    'user_id' => $testimonial->user_id,
                ]);
                $message = 'Testimonial added to website!';
            }

            DB::commit();
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update approval: ' . $e->getMessage());
        }
    }

}
