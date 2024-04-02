<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.order',[
            'orders' => $orders
        ]);
    }

    public function updateStatusOrder(Request $request,$id){
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return redirect()->back()->with('success', 'status berhasil di ubah');
    }

   

   
}
