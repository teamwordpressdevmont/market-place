<?php

namespace App\Http\Controllers\Portal;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogDataController extends Controller
{
    public function addEdit() {
        return view('blog.add-edit');
    }

    public function store(Request $request) {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $request->validate([
                'title'         => 'required|string|max:255',
                'banner'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'description'   => 'nullable|string',
                'featured'      => 'nullable|string',
                'publish_by'    => 'nullable|string|max:255',
                'publish_date'  => 'nullable|date',
            ]);

            $validatedData = $request->only(['title', 'description', 'featured', 'publish_by', 'publish_date']);

            if ($request->filled('publish_date')) {
                $validatedData['publish_date'] = Carbon::parse($request->publish_date)->format('Y-m-d');
            }

            if ($request->hasFile('banner')) {
                $image = $request->file('banner');
                $imageName = 'blog_banner_' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
                $image->storeAs('blog-banner', $imageName, 'public');
                $validatedData['banner'] = $imageName;
            }
            
            Blog::create($validatedData);
            DB::commit();
            return redirect()->route('blog.list')->with('success', 'Blog submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Blog: ' . $e->getMessage());
        }
    }

    public function list(Request $request) {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');

        $blog = Blog::when($search, function ($query) use ($search) {
                        $query->where('title', 'like', "%{$search}%");
                    })
                    ->orderBy($sortBy, $sortDirection)
                    ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('blog.list', compact('blog'))->render(),
                'pagination' => (string) $blog->appends($request->all())->links()
            ]);
        }
        
        return view('blog.list', compact('blog', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id) {
        $blog = Blog::findOrFail($id);
        return view('blog.add-edit', compact('blog'));
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            $request->validate([
                'title'        => 'required|string|max:255',
                'banner'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'description'      => 'nullable|string',
                'featured'      => 'nullable|string',
                'publish_by'   => 'nullable|string|max:255',
                'publish_date' => 'nullable|date',
            ]);
            
            $blog = Blog::findOrFail($id);
            $validatedData = $request->only(['title', 'description', 'featured', 'publish_by', 'publish_date']);

            if ($request->filled('publish_date')) {
                $validatedData['publish_date'] = Carbon::parse($request->publish_date)->format('Y-m-d');
            }

            if ($request->hasFile('banner')) {
                if ($blog->banner) {
                    Storage::disk('public')->delete('blog-banner/' . $blog->banner);
                }
                $image = $request->file('banner');
                $imageName = 'blog_banner_' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
                $image->storeAs('blog-banner', $imageName, 'public');
                $validatedData['banner'] = $imageName;
            }

            $blog->update($validatedData);
            DB::commit();
            return redirect()->route('blog.list')->with('success', 'Blog updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Blog: ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        $blog = Blog::findOrFail($id);
        if ($blog->banner) {
            Storage::disk('public')->delete('blog-banner/' . $blog->banner);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }

    public function view($id) {
        $blog = Blog::findOrFail($id);
        return view('blog.view', compact('blog'));
    }
}
