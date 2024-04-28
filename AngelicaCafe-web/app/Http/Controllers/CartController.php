<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Models\Address;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addItemToCart($id)
    {
        $produks = Produk::findOrFail($id);

        // Mendapatkan pengguna yang sudah login
        $user = Auth::user();

        // Mengambil keranjang dari session pengguna yang sudah login
        $cart = session()->get('cart_' . $user->id, []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id_produk' => $produks->id_produk,
                'id_user' => $user->id,
                'name' => $produks->nama_Produk,
                'image' => $produks->gambar,
                'quantity' => 1,
                'price' => $produks->harga
            ];
        }

        // Menyimpan keranjang ke dalam session
        session()->put('cart_' . $user->id, $cart);

        return redirect()->back()->with('success', 'Berhasil menambahkan ke cart');

    }

    public function updateCart(Request $request){
        if($request->itemData){
            $user = Auth::user();
            session()->forget('cart_' . $user->id);
            $data = $request->itemData;
            foreach($data as $d){
                $id = $d['id_produk'];
                $produks = Produk::findOrFail($id);
                // Mendapatkan pengguna yang sudah login
                // Mengambil keranjang dari session pengguna yang sudah login
                $cart = session()->get('cart_' . $user->id, []);
                $cart[$id] = [
                    'id_produk' => $produks->id_produk,
                    'id_user' => $user->id,
                    'name' => $produks->nama_Produk,
                    'quantity' => $d['quantity'],
                    'price' => $produks->harga
                ];
        
                // Menyimpan keranjang ke dalam session
                session()->put('cart_' . $user->id, $cart);
            }
            return true;
        }
        return false;
    }

    // View the cart
    public function showCart(Request $request)
    {
        $user = Auth::user();

        // Mengambil keranjang dari session pengguna yang sudah login
        $cart = session()->get('cart_' . $user->id, []);
    
        $subtotal = 0;
    
        foreach ($cart as $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }
    
        return view('cart', [
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = $request->session()->get('cart_' . $user->id, []);

        
        $addresses = Address::with('user')
        ->where('user_id', $user->id)
        ->get();

        
        $subtotal = 0;
    
        foreach ($cart as $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }
    //     // Lakukan logika checkout atau tampilkan tampilan checkout
    //     // Misalnya, Anda bisa mengirimkan data keranjang ke tampilan checkout:
    //    dd($cart);
        return view('checkout',[
            'total' => $subtotal,
            'address' => $addresses
        ]);
    }

    public function order(Request $request){
        // $user = Auth::user();

        // // Mengambil keranjang dari session pengguna yang sudah login
        // $cart = session()->get('cart_' . $user->id, []);
    
        // $subtotal = 0;
        // foreach ($cart as $item) {
        //     $subtotal += $item['quantity'] * $item['price'];
        // }

        // $order = Order::create([
        //     'user_id' => $user->id,
        //     'total_amount' => $subtotal
        // ]);

         // Mendapatkan pengguna yang sudah login
         $user = Auth::user();

         // Mendapatkan keranjang belanja dari sesi pengguna
         $cart = session()->get('cart_' . $user->id, []);
     
         $subtotal = 0;
 
         // Menghitung subtotal pesanan
         $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }
 
         // Membuat pesanan
         $order = Order::create([
             'user_id' => $user->id,
             'total_amount' => $subtotal
         ]);
 
         // Menyimpan detail produk dalam tabel order_details
         foreach ($cart as $productId => $cartItem) {
             $product = Produk::findOrFail($productId);
 
             // Membuat entri detail pesanan
             OrderDetail::create([
                 'order_id' => $order->id,
                 'product_id' => $product->id_produk,
                 'quantity' => $cartItem['quantity'],
                 'price' => $product->harga,
             ]);
         }
 
         // Membersihkan keranjang belanja
         session()->forget('cart_' . $user->id);
 
         // Redirect pengguna ke halaman terima kasih atau ringkasan pesanan
        //  return redirect()->route('order.success')->with('success', 'Pesanan Anda berhasil ditempatkan.');
        return redirect()->route('profile.transaction')->with('success', 'Terima kasih ! order anda sedang diproses');
     

    }
}
