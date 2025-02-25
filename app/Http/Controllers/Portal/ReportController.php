<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;



class ReportController extends Controller
{
    public function dashboard()
    {
        $reports = Report::all(); // Fetch all reports
        return view('dashboard', compact('reports')); // Pass data to the dashboard
    }
}