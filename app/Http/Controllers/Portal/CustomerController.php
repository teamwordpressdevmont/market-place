<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    public function addEdit(){

        return view('customer.add-edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'nullable|numeric',
            'options' => 'nullable|string',
            'option_data' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $validatedData = $request->only([
                'title', 'description', 'features' , 'price' , 'options', 'option_data', 
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
                $validatedData['features'] = $formattedJson;

            }
            
        
            // Save to Database
            $customer = CustomerService::create($validatedData);
            
            DB::commit();
            return redirect()->route('customer.list')->with('success', 'Customer submitted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Customer: ' . $e->getMessage());
        }
    }


    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');
    
    
        $customers = CustomerService::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
    
        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json([
                'html' => view('customer.list', compact('customers'))->render(),
                'pagination' => (string) $customers->appends($request->all())->links()
            ]);
        }
    
        return view('customer.list', compact('customers', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id)
    {
        try {
            $customer = CustomerService::findOrFail($id);

            $features = is_array($customer->features) ? $customer->features : json_decode($customer->features, true); 

            // dd($customer);
                     
            if (!$customer) {
                return redirect()->route('customer.list')->with('error', 'Customer not found.');
            }

            return view('customer.add-edit', compact('customer', 'features'));
        } catch (\Exception $e) {
            return redirect()->route('customer.list')->with('error', 'Something went wrong.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'nullable|numeric',
            'options' => 'nullable|string',
            'option_data' => 'nullable|string',
        ]);

        //   dd($validatedData);
        
        DB::beginTransaction();
        try {
           

            $customer = CustomerService::findOrFail($id);
            
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
                 $validatedData['features'] = $formattedJson;

            }

            // Update record
            $customer->update($validatedData);


            DB::commit();
            return redirect()->route('customer.list')->with('success', 'Customer updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Customer: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $customer = CustomerService::findOrFail($id);

            if (!is_null($customer)) {
                $customer->delete();
            }
    
            DB::commit();
            return redirect()->back()->with('success', 'Customer deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete Customer: ' . $e->getMessage());
        }
    }
}