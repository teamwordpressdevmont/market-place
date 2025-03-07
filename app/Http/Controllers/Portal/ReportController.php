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
        $totalBudget = OrderDetail::sum('budget'); // Calculate total budget

        $completedJobs = TradepersonReview::count('order_id'); // Count total order_id (completed jobs)
        
        // Latest 3 Orders with Tradeperson and Order Details
        $orders = Order::with('orderDetail', 'tradeperson.user')->limit(3)->get();
    
        // Orders with Pending Proposals
        $pendingOrders = OrderDetail::whereHas('order', function ($query) {
            $query->whereHas('orderStatus', function ($statusQuery) {
                $statusQuery->where('status', 'Pending');
            });
        })->get();
    
        return view('dashboard', compact('totalBudget', 'completedJobs', 'orders', 'pendingOrders'));
    }
    
}