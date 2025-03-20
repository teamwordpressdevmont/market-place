<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    public function addEdit(){

        return view('subscription.add-edit');
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
                $validatedData['features'] = $formattedJson;

            }
            
        
            // Save to Database
            $subscription = Subscription::create($validatedData);
            
            DB::commit();
            return redirect()->route('subscription.list')->with('success', 'Subscription submitted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Subscription: ' . $e->getMessage());
        }
    }


    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');
    
    
        $subscriptions = Subscription::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
    
        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json([
                'html' => view('subscription.list', compact('subscriptions'))->render(),
                'pagination' => (string) $subscriptions->appends($request->all())->links()
            ]);
        }
    
        return view('subscription.list', compact('subscriptions', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id)
    {
        try {
            $subscription = Subscription::findOrFail($id);

            $features = is_array($subscription->features) ? $subscription->features : json_decode($subscription->features, true); 
                     
            if (!$subscription) {
                return redirect()->route('subscription.list')->with('error', 'Subscription not found.');
            }

            return view('subscription.add-edit', compact('subscription', 'features'));
        } catch (\Exception $e) {
            return redirect()->route('subscription.list')->with('e rror', 'Something went wrong.');
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
           

            $subscription = Subscription::findOrFail($id);
            
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
            $subscription->update($validatedData);


            DB::commit();
            return redirect()->route('subscription.list')->with('success', 'Subscription updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to submit Subscription: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $subscription = Subscription::findOrFail($id);

            if (!is_null($subscription)) {
                $subscription->delete();
            }
    
            DB::commit();
            return redirect()->back()->with('success', 'subscription deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete subscription: ' . $e->getMessage());
        }
    }
}
