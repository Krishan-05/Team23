<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderReturn; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
    
        $recentOrders = Order::with('orderItems.product', 'user', 'shipping')->latest()->take(5)->get();

        $returnRequests = OrderReturn::with('order.user')->latest()->get(); 

        return view('admin.analytics', compact('recentOrders', 'returnRequests')); 
    }

    public function fetchData(Request $request)
    {
        $period = $request->query('period', 'day');
        $now = Carbon::now();

        if ($period === 'day') {
            $start = $now->startOfDay();
            $label = $now->format('d F') . " Orders";
        } elseif ($period === 'week') {
            $start = $now->startOfWeek();
            $label = "Week of " . $now->startOfWeek()->format('d F');
        } else {
            $start = $now->startOfMonth();
            $label = "Month of " . $now->format('F');
        }

        $totalOrders = Order::where('created_at', '>=', $start)->count();
        $totalSales = Order::where('created_at', '>=', $start)
                            ->whereNotNull('total_price')
                            ->sum('total_price');

        \Log::info("Total Sales: " . $totalSales);

        return response()->json([
            'label' => $label,
            'total_orders' => $totalOrders,
            'total_sales' => $totalSales,
        ]);
    }
}