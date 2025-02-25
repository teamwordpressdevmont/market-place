<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function addEdit(){

        return view('package.add-edit');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        DB::beginTransaction();
        
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|numeric',
                'features' => 'nullable|array',
            ]);

            
            $validatedData = $request->only([
                'name', 'description', 'price', 'features', 
            ]);
            

            
            // Handle features data if available and format it as required
            if ($request->has('features')) {
                $features = $request->features;
                $formattedFeatures = [];
            
                foreach ($features['title'] as $index => $title) {
                    $formattedFeatures["features_{$index}"] = [
                        'heading' => $title,
                    ];
                }
                
                $formattedJson = json_encode($formattedFeatures, JSON_UNESCAPED_UNICODE);
            
                // Serialize the formatted features array before saving
                $validatedData['features'] = "\"" . str_replace('"', '\\"', $formattedJson) . "\"";

            }
            
            
        
            // Save to Database
            $package = Package::create($validatedData);

        
            
            DB::commit();
            

            return redirect()->route('package.list')->with('success', 'Package submitted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Package: ' . $e->getMessage());
        }
    }


    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');
    
    
        $packages = Package::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
    
        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json([
                'html' => view('package.list', compact('packages'))->render(),
                'pagination' => (string) $packages->appends($request->all())->links()
            ]);
        }
    
        return view('package.list', compact('packages', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);

        // Decode JSON data for features
        $features = json_decode(json_decode($package->features, true), true);
        

        return view('package.add-edit', compact('package', 'features'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|numeric',
                'features' => 'nullable|array',
            ]);

            $package = Package::findOrFail($id);
          
            
            
            // Handle features Formatting
            if ($request->has('features')) {
                $features = $request->features;
                $formattedFeatures = [];
    
                foreach ($features['title'] as $index => $title) {
                    $formattedFeatures["features_{$index}"] = [
                        'heading' => $title,
                    ];
                }
                
                 $formattedJson = json_encode($formattedFeatures, JSON_UNESCAPED_UNICODE);
    
                // Serialize the formatted features array before saving
                $validatedData['features'] = "\"" . str_replace('"', '\\"', $formattedJson) . "\"";
            }
            
            
            // dd($validatedData);

            // Update record
            $package->update($validatedData);


            DB::commit();
            return redirect()->route('package.list')->with('success', 'Package updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Package: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);

        if (!is_null($package)) {
            $package->delete();
        }

            return redirect()->back()->with('success', 'Package deleted successfully.');

    }
}
