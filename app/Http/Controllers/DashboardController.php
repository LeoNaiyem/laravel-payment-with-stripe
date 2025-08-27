<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.summary', [
            'totalRevenue' => Payment::where('status', 'succeeded')->sum('amount'),
            'totalPayments' => Payment::count(),
            'successfulPayments' => Payment::where('status', 'succeeded')->count(),
            'failedPayments' => Payment::where('status', 'failed')->count(),

            // Monthly revenue (last 6 months)
            'monthlyRevenue' => Payment::where('status', 'succeeded')
                ->selectRaw('DATE_FORMAT(created_at, "%b %Y") as month, SUM(amount) as total')
                ->groupBy('month')
                ->orderByRaw('MIN(created_at)')
                ->pluck('total', 'month'),

            // Status distribution
            'paymentStatusCounts' => Payment::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->pluck('count', 'status'),
        ]);
    }

}
