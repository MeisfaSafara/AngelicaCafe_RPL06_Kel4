<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.order',[
            'orders' => $orders
        ]);
    }

    // controller detail order
    public function detailOrder($id){
        $detailOrder = OrderDetail::where('order_id',$id)->get();
        $getUser = Order::findOrFail($id);
        

        $user = Address::where('user_id',$getUser->user_id)->first();

        return view('admin.detailOrder',[
            'detailOrder' => $detailOrder,
            'users' => $user,
            'order' => $getUser
        ]);
    }

// controller status order
    public function updateStatusOrder(Request $request,$id){
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return redirect()->back()->with('success', 'status berhasil di ubah');
    }

    public function updateStatusDelivery(Request $request, $id){
        // dd($request->all());
        $order = Order::findOrFail($id);

        $order->delivery_status = $request->delivery_status;

        $order->save();

        return redirect()->back()->with('success', 'status pengiriman berhasil di ubah');
    }

}
