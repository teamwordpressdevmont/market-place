<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PackageController extends Controller
{
    public function addEdit(){

        return view('package.add-edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'features' => 'nullable|array',
        ]);

        DB::beginTransaction();
        try {
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

        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
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
        try {
            $package = Package::findOrFail($id);

            $features = json_decode(json_decode($package->features, true), true);
            
            if (!$package) {
                return redirect()->route('package.list')->with('error', 'Package not found.');
            }

            return view('package.add-edit', compact('package', 'features'));
        } catch (\Exception $e) {
            return redirect()->route('package.list')->with('error', 'Something went wrong.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'features' => 'nullable|array',
        ]);
        
        DB::beginTransaction();
        try {
           

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
    
                $validatedData['features'] = "\"" . str_replace('"', '\\"', $formattedJson) . "\"";
            }

            // Update record
            $package->update($validatedData);


            DB::commit();
            return redirect()->route('package.list')->with('success', 'Package updated successfully!');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Package: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $package = Package::findOrFail($id);

            if (!is_null($package)) {
                $package->delete();
            }
    
            DB::commit();
            return redirect()->back()->with('success', 'Package deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete Package: ' . $e->getMessage());
        }
    }
}
