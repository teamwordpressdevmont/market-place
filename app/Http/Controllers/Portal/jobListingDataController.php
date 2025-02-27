<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Tradeperson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('job-listing.add-edit', compact('OrderDetails'));
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
                'image'          => 'nullable|array',
                'additional_notes'=> 'nullable|string',
                'featured'        => 'nullable|boolean',
            ]);

            $OrderDetail = OrderDetail::findOrFail($id);

            $validatedData = $request->only([
                'title', 'description', 'budget', 'job_start_time', 'job_end_time', 'location', 'image', 'additional_notes', 'featured'
            ]);

            if ($request->has('image')) {
                $validatedData['image'] = json_encode($request->image);
            }

            if ($request->filled('job_start_time')) {
                $validatedData['job_start_time'] = Carbon::parse($request->job_start_time)->format('Y-m-d');
            }

            if ($request->filled('job_end_time')) {
                $validatedData['job_end_time'] = Carbon::parse($request->job_end_time)->format('Y-m-d');
            }

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
