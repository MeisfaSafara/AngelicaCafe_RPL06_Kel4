<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request) {
        $selectedMonth = $request->query('month', now()->month);

        $orders = Order::where('status', 'success')->get();
        $totalSalesToday = Order::where('status', 'success')->whereDate('created_at', now()->toDateString())->sum('total_amount');
        $totalOrdersToday = Order::where('status', 'success')->whereDate('created_at', now()->toDateString())->count();

        $popularProducts = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->whereMonth('created_at', $selectedMonth)
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->take(5)
            ->with('product')
            ->get();

        $salesData = Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_amount) as total_sales'))
            ->where('status', 'success')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $months = collect(range(1, 12));

        $formattedSalesData = $months->mapWithKeys(function($month) use ($salesData) {
            $sales = $salesData->firstWhere('month', $month);
            return [$month => $sales ? $sales->total_sales : 0];
        });

        $chartData = [
            'labels' => $months->map(function($month) {
                return date('F', mktime(0, 0, 0, $month, 10));
            })->toArray(),
            'datasets' => [
                [
                    'label' => 'Total Sales',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => $formattedSalesData->values()->toArray(),
                ]
            ],
        ];

        return view('admin.dashboard', [
            'orders' => $orders,
            'totalSalesToday' => $totalSalesToday,
            'totalOrdersToday' => $totalOrdersToday,
            'popularProducts' => $popularProducts,
            'chartData' => json_encode($chartData),
            'months' => $months,
            'selectedMonth' => $selectedMonth
        ]);
    }
}
