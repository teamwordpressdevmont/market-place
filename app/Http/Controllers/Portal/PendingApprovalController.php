<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Order;


class PendingApprovalController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');

        $pendingOrders = OrderDetail::with(['order.orderStatus', 'order.tradeperson', 'order.tradeperson.categories', 'order.tradeperson.user'])
            ->whereHas('order', function ($query) {
                $query->whereHas('orderStatus', function ($statusQuery) {
                    $statusQuery->where('status', 'Pending');
                });
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%$search%")
                    ->orWhereHas('order.tradeperson.user', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
                });
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('pending-approval', compact('pendingOrders'))->render(),
                'pagination' => (string) $pendingOrders->appends($request->all())->links()
            ]);
        }

        return view('pending-approval', compact('pendingOrders'));
    }
}