<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showOrder(){
         // Ambil pengguna yang sedang login
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login'); // Redirect ke halaman login jika tidak ada pengguna yang login
        }
         
        $orders = Order::where('user_id', $user->id)->with('orderDetails')->get();
         
        foreach ($orders as $order) {
            $order->reviewed = Review::where('user_id', $user->id)->where('order_id', $order->id)->exists();
            $order->comment = Review::where('user_id', $user->id)->where('order_id', $order->id)->value('comment');
        }
         
        return view('profile.transaction', [
            'order' => $orders
        ]);
         

         

        
    }
}