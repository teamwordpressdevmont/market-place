<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jobListingDataController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');

        $OrderDetails = OrderDetail::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(10);

         // Check if the request is AJAX
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
                'timeline'        => 'nullable|string',
                'location'        => 'nullable|string',
                'photos'          => 'nullable|array',
                'additional_notes'=> 'nullable|string',
                'featured'        => 'nullable|boolean',
            ]);

            $OrderDetail = OrderDetail::findOrFail($id);

            $validatedData = $request->only([
                'title', 'description', 'budget', 'timeline', 'location', 'photos', 'additional_notes', 'featured'
            ]);

            if ($request->has('photos')) {
                $validatedData['photos'] = json_encode($request->photos);
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
