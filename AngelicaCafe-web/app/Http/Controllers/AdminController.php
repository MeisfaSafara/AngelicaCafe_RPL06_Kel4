<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $orders = Order::where('status', 'success')->get();
        $totalSalesToday = Order::where('status', 'success')->whereDate('created_at', now()->toDateString())->sum('total_amount');
        $totalOrdersToday = Order::where('status', 'success')->whereDate('created_at', now()->toDateString())->count();
        $popularProducts = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->take(5)
            ->with('product')
            ->get();

        return view('admin.dashboard', [
            'orders' => $orders,
            'totalSalesToday' => $totalSalesToday,
            'totalOrdersToday' => $totalOrdersToday,
            'popularProducts' => $popularProducts
        ]);
    }
}
