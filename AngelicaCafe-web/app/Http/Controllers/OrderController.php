<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.order',[
            'orders' => $orders
        ]);
    }

    

   

   
}
