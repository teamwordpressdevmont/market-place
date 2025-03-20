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
use Illuminate\Support\Arr;


class jobListingDataController extends Controller
{
    public function list(Request $request)
{
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'id');
    $sortDirection = $request->input('sort_direction', 'desc');
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
        ->paginate(10);

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
            $OrderDetails = OrderDetail::with('order')->findOrFail($id);
            $OrderStatus = OrderStatus::all(); // Get all order statuses


            $imagesDetails = is_array($OrderDetails->image) ? $OrderDetails->image : json_decode($OrderDetails->image, true) ?? [];

            if (!$OrderDetails) {
                return redirect()->route('joblisting.list')->with('error', 'Order Detail not found.');
            }

            return view('job-listing.add-edit', compact('OrderDetails' , 'OrderStatus'));
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
            'job_start_timeline'        => 'nullable|string',
            'job_end_timeline'        => 'nullable|string',
            'location'        => 'nullable|string',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_notes' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'urgent' => 'nullable|boolean',
            'order_status'       => 'required|exists:order_statuses,id'


            

        ]);

        DB::beginTransaction();
        try {

            $OrderDetail = OrderDetail::findOrFail($id);

            // Find Related Order Record
            $order = $OrderDetail->order;

            if (!$order) {
                return redirect()->back()->with('error', 'Order record not found.');
            }

            // Update Order Status in `orders` Table
            $order->update([
                'order_status' => $request->order_status
            ]);


            $validatedData = $request->only([
                'title',
                'description',
                'budget',
                'job_start_timeline',
                'job_end_timeline',
                'location',
                'additional_notes',
                'featured',
                'urgent'

            ]);


            if ($request->filled('job_start_timeline')) {
                $validatedData['job_start_timeline'] = Carbon::parse($request->job_start_time)->format('d-M-Y');
            }

            if ($request->filled('job_end_timeline')) {
                $validatedData['job_end_timeline'] = Carbon::parse($request->job_end_time)->format('d-M-Y');
            }

            if ($OrderDetail->order) {
                $OrderDetail->order->update([
                    'order_status' => $request->order_status
                ]);
            }

            // Handle image uploads
            $existingImages = is_array($OrderDetail->image) ? $OrderDetail->image : json_decode($OrderDetail->image, true) ?? [];
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
            $OrderDetail = OrderDetail::with('order.review.tradeperson' , 'order.customer' , 'order.customer.user' , 'order.tradeperson.categories')->findOrFail($id);
            return view('job-listing.view', compact('OrderDetail'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('success', 'Something went wrong.');
        }
    }

    public function reviewProfile($id)
    {
        try {
            $OrderDetail = OrderDetail::with('order.review.tradeperson' , 'order.tradeperson.categories' , 'order.tradeperson.user')->findOrFail($id);
            return view('job-listing.review-profile', compact('OrderDetail'));
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


    public function violationClient($id)
    {
        try {

            $clientDetails = Customer::with('user')->findOrFail($id);

            return view('job-listing.violation-client', compact('clientDetails'));

        } 
        catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('success', 'Something went wrong.');
        }
    }
}
