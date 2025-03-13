<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CategoryDataController extends Controller
{
    public function addEdit()
    {
        $allCategories = Category::whereNull('parent_id')->get(); // Only fetch parent categories
        
        return view('category.add-edit', compact('allCategories'));

    }

    // Store a new category in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|string|max:255',
            'description'       => 'nullable|string',
            'icon'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id'=> 'nullable|exists:categories,id',
        ]);

        // New check for parent category
        if ($validatedData['parent_id'] && !Category::find($validatedData['parent_id'])->parent_id) {
            $validatedData['icon'] = null; // Set icon to null if parent category is selected
        }

        DB::beginTransaction();
        try {
            if ($request->hasFile('icon')) {
                $image = $request->file('icon');
                $formattedDate = Carbon::now()->timestamp;
                $extension = $image->getClientOriginalExtension(); // Get the file extension
                $imageName = 'category-icon-' . $formattedDate . '.' . $extension;
                $iconPath = $image->storeAs('category-images', $imageName, 'public');
                $validatedData['icon'] = $imageName;
            }
                        
            Category::create($validatedData);

            DB::commit();
            return redirect()->route('category.list')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Category: ' . $e->getMessage());
        }    
    }

    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');

        $categories = Category::when($search, function ($query, $search) {
                            return $query->where('name', 'like', "%{$search}%");
                        })
                        ->orderBy($sortBy, $sortDirection)
                        ->paginate(10);
        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json([
                'html' => view('category.list', compact('categories'))->render(),
                'pagination' => (string) $categories->appends($request->query())->links()
            ]);
        }
        

        return view('category.list', compact('categories', 'search', 'sortBy', 'sortDirection'));
    }

    // Display the form for editing a category
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id); 
            $allCategories = Category::all();
        
            
            if (!$category) {
                return redirect()->route('category.list')->with('error', 'Category not found.');
            }

            return view('category.add-edit', compact('category', 'allCategories'));
        } catch (\Exception $e) {
            return redirect()->route('category.list')->with('error', 'Something went wrong.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'              => 'required|string|max:255',
            'description'       => 'nullable|string',
            'icon'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id'=> 'nullable|exists:categories,id',
        ]);

        DB::beginTransaction();
        try {

            $category = Category::findOrFail($id);

            if ($request->hasFile('icon')) {
                // If a new icon is uploaded, store it and update the path
                if ($category->icon) {
                    Storage::disk('public')->delete($category->icon);
                }

                $image = $request->file('icon');
                $formattedDate = Carbon::now()->timestamp; // Standard timestamp format
                $extension = $image->getClientOriginalExtension();
                $imageName = 'category-icon-' . $formattedDate . '.' . $extension;
                $iconPath = $image->storeAs('category-images', $imageName, 'public');
                $validatedData['icon'] = $imageName;
            }


            // New check for parent category
            if ($validatedData['parent_id'] && !Category::find($validatedData['parent_id'])->parent_id) {
                $validatedData['icon'] = null; // Set icon to null if parent category is selected
            }
            

            $category->update($validatedData);

            DB::commit();
            return redirect()->route('category.list')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Category: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
        
            if (!is_null($category)) {
                $category->delete();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete Category: ' . $e->getMessage());
        }
    }
}
