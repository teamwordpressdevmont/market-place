<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Tradeperson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class jobListingDataController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');

        $OrderDetails = OrderDetail::with(['order.customer', 'order.tradeperson'])
        ->when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(10);

         if ($request->ajax()) {
            return response()->json([
                'html' => view('job-listing.list', compact('OrderDetails'))->render(),
                'pagination' => (string) $OrderDetails->appends($request->all())->links()
            ]);
        }

        return view('job-listing.list', compact('OrderDetails', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id) 
    {
        $OrderDetails = OrderDetail::findOrFail($id);

        // Decode JSON images from database
        $imagesDetails = json_decode($OrderDetails->image, true) ?? [];

        return view('job-listing.add-edit', compact('OrderDetails' , 'imagesDetails'));
    }

    public function update(Request $request, $id) 
   {
        DB::beginTransaction();
        try {
            $request->validate([
                'title'           => 'required|string|max:255',
                'description'     => 'nullable|string',
                'budget'          => 'nullable|numeric',
                'job_start_time'        => 'nullable|string',
                'job_end_time'        => 'nullable|string',
                'location'        => 'nullable|string',
                'image' => 'nullable|array',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'additional_notes'=> 'nullable|string',
                'featured'        => 'nullable|boolean',
            ]);
 
            $OrderDetail = OrderDetail::findOrFail($id);

            $validatedData = $request->only([
                'title', 'description', 'budget', 'job_start_time', 'job_end_time', 'location',  'additional_notes', 'featured'
            ]);
           

            if ($request->filled('job_start_time')) {
                $validatedData['job_start_time'] = Carbon::parse($request->job_start_time)->format('Y-m-d');
            }

            if ($request->filled('job_end_time')) {
                $validatedData['job_end_time'] = Carbon::parse($request->job_end_time)->format('Y-m-d');
            }

            // Handle image uploads
            $existingImages = json_decode($OrderDetail->image, true) ?? [];
            $imageData = [];
            $counter = 0;

            // Preserve existing images
            foreach ($existingImages as $key => $image) {
                $imageData["image_{$counter}"] = $image;
                $counter++;
            }

             // Upload new images
            if ($request->hasFile('image')) {
               
                foreach ($request->file('image') as $image) {
                  
                    $timestamp = Carbon::now()->timestamp;
                    $uniqueID = uniqid();
                    // $originalName = $image->getClientOriginalName(); // Get original filename
                    $filename = "order-image-{$timestamp}-{$uniqueID}." . $image->getClientOriginalExtension(); // Unique filename for storage
                    $image->storeAs('order-images', $filename, 'public'); // Save file

                    $imageData["image_{$counter}"] = $filename; // Store only original filename in DB
                    $counter++;
                }
            }

            $validatedData['image'] = json_encode($imageData, JSON_UNESCAPED_SLASHES);

            $OrderDetail->update($validatedData);
            
            DB::commit();
            return redirect()->route('job-listing.list')->with('success', 'Order detail updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Order Detail: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $OrderDetail = OrderDetail::findOrFail($id);

        if (!is_null($OrderDetail)) {
            $OrderDetail->delete();
        }

        return redirect()->back()->with('success', 'Order Detail deleted successfully.');
    }

    public function view($id)
    {
        $OrderDetail = OrderDetail::findOrFail($id);
        return view('job-listing.view', compact('OrderDetail'));
    }
}
