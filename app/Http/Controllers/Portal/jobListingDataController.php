<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Tradeperson;
use App\Models\TradepersonReview;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;


class jobListingDataController extends Controller
{
    public function list(Request $request)
{
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'id');
    $sortDirection = $request->input('sort_direction', 'asc');
    $selectedStatus = $request->input('status'); // Selected Order Status ID

    $OrderStatus = OrderStatus::all();

    $OrderDetails = OrderDetail::with(['order.customer', 'order.tradeperson', 'order.tradeperson.user', 'order.OrderStatus'])
        ->when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
        ->when($selectedStatus, function ($query) use ($selectedStatus) {
            return $query->whereHas('order.OrderStatus', function ($q) use ($selectedStatus) {
                $q->where('id', $selectedStatus);
            });
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(1);

    if ($request->ajax()) {
        return response()->json([
            'html' => view('job-listing.list', compact('OrderDetails', 'OrderStatus'))->render(),
            'pagination' => (string) $OrderDetails->appends($request->all())->links()
        ]);
    }

    return view('job-listing.list', compact('OrderDetails', 'search', 'sortBy', 'sortDirection', 'OrderStatus'));
}


    public function edit($id)
    {
        try {
            $OrderDetails = OrderDetail::find($id);

            $imagesDetails = json_decode($OrderDetails->image, true) ?? [];

            if (!$OrderDetails) {
                return redirect()->route('joblisting.list')->with('error', 'Order Detail not found.');
            }

            return view('job-listing.add-edit', compact('OrderDetails'));
        } catch (\Exception $e) {
            return redirect()->route('joblisting.list')->with('error', 'Something went wrong.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'nullable|string',
            'budget'          => 'nullable|numeric',
            'job_start_time'        => 'nullable|string',
            'job_end_time'        => 'nullable|string',
            'location'        => 'nullable|string',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_notes' => 'nullable|string',
            'featured'        => 'nullable|boolean',
        ]);

        DB::beginTransaction();
        try {

            $OrderDetail = OrderDetail::findOrFail($id);

            $validatedData = $request->only([
                'title',
                'description',
                'budget',
                'job_start_time',
                'job_end_time',
                'location',
                'additional_notes',
                'featured'
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
            return redirect()->route('joblisting.list')->with('success', 'Order detail updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Order Detail: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $OrderDetail = OrderDetail::findOrFail($id);

            if (!is_null($OrderDetail)) {
                $OrderDetail->delete();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Order Detail deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete Order Detail: ' . $e->getMessage());
        }
    }


    public function view($id)
    {
        try {
            $OrderDetail = OrderDetail::with('order.review.tradeperson')->findOrFail($id);
            return view('job-listing.view', compact('OrderDetail'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('success', 'Something went wrong.');
        }
    }

    public function acceptReview($id)
    {
        try {
            $tradePersonReview =  TradepersonReview::find($id);
            if (!$tradePersonReview) {
                return back()->with('error', 'review not found');
            }

            $tradePersonReview->update([
                'approved' => 1
            ]);

            return back()->with('success', 'Review Approved Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update  review');
        }
    }
}
