<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $orders = Order::where('status', 'success')->get();
        $totalSalesToday = Order::where('status', 'success')->whereDate('created_at', now()->toDateString())->sum('total_amount');
        $totalOrdersToday = Order::where('status', 'success')->whereDate('created_at', now()->toDateString())->count();

        return view('admin.dashboard', [
            'orders' => $orders,
            'totalSalesToday' => $totalSalesToday,
            'totalOrdersToday' => $totalOrdersToday
        ]);
    }
}
