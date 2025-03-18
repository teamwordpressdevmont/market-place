<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\TradepersonReview;
use App\Models\Order;
use App\Models\Tradeperson;
use App\Models\User;
use App\Models\OrderProposal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class ReportController extends Controller
{
    public function dashboard()
    {
        $totalBudget = OrderDetail::sum('budget'); 

        $completedJobs = TradepersonReview::count('order_id'); 
        
        $orders = Order::with('orderDetail', 'tradeperson.user')
            ->orderBy('created_at', 'asc')
            ->limit(3)
            ->get();

        $pendingOrders = OrderDetail::whereHas('order', function ($query) {
            $query->whereHas('orderStatus', function ($statusQuery) {
                $statusQuery->where('status', 'Pending');
            });
        })
        ->orderBy('created_at', 'asc')
        ->get();

        return view('dashboard', compact('totalBudget', 'completedJobs', 'orders', 'pendingOrders'));
    }

    
}