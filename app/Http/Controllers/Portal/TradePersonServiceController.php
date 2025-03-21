<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\TradepersonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class TradePersonServiceController extends Controller
{
    public function addEdit(){

        return view('tradeperson-service.add-edit');
    }

    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'required|numeric',
            'binding_period' => 'nullable|string|max:255',
            'search_visibility' => 'nullable|in:Medium,High,Premium',
            'recommended_tradeperson' => 'nullable|boolean',
            'appear_homepage' => 'nullable|boolean',
            'access_premium_tender' => 'nullable|boolean',
            'extra_clip' => 'nullable|integer',
            'google_visibility' => 'nullable|boolean',
            'contract_creation' => 'nullable|integer',
            'free_contract' => 'nullable|integer',
        ]);

        DB::beginTransaction();
        try {
            $validatedData = $request->only([
                'title', 'description', 'features' , 'price' , 'binding_period', 'search_visibility',
                'recommended_tradeperson' ,  'appear_homepage' , 'access_premium_tender' , 'extra_clip' , 'google_visibility' , 'contract_creation' , 'free_contract'
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
           $service = TradepersonService::create($validatedData);
            
           DB::commit();
           return redirect()->route('tradeperson-service.list')->with('success', 'Service submitted successfully!');

       } catch (\Exception $e) {
           DB::rollBack();
           return redirect()->back()->with('error', 'Failed to submit Service: ' . $e->getMessage());
       }
    }


    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');
    
    
        $services = TradepersonService::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
    
        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json([
                'html' => view('tradeperson-service.list', compact('services'))->render(),
                'pagination' => (string) $services->appends($request->all())->links()
            ]);
        }
    
        return view('tradeperson-service.list', compact('services', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id)
    {
        $tradepersonService = TradepersonService::findOrFail($id);

        $features = is_array($tradepersonService->features) ? $tradepersonService->features : json_decode($tradepersonService->features, true); 


        return view('tradeperson-service.add-edit', compact('tradepersonService' , 'features'));
    }

    public function update(Request $request, $id)
    {
        // Validate form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'required|numeric',
            'binding_period' => 'nullable|string|max:255',
            'search_visibility' => 'nullable|in:Medium,High,Premium',
            'recommended_tradeperson' => 'nullable|boolean',
            'appear_homepage' => 'nullable|boolean',
            'access_premium_tender' => 'nullable|boolean',
            'extra_clip' => 'nullable|integer',
            'google_visibility' => 'nullable|boolean',
            'contract_creation' => 'nullable|integer',
            'free_contract' => 'nullable|integer',
        ]);

        DB::beginTransaction();
        try {


            $tradepersonService = TradepersonService::findOrFail($id);

            // dd($tradepersonService);


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

            // Update service
            $tradepersonService->update($validatedData);

            DB::commit();
            return redirect()->route('tradeperson-service.list')->with('success', 'Service updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Service: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $service = TradepersonService::findOrFail($id);

            if (!is_null($service)) {
                $service->delete();
            }
    
            DB::commit();
            return redirect()->back()->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete Service: ' . $e->getMessage());
        }
    }

   

}
