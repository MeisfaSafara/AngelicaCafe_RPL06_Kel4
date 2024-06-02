<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $favouriteProducts = $user->favourites()->with('produk')->get();
        
        $favouriteProductIds = $favouriteProducts->pluck('produk_id');
        
        $produkByFavourites = Produk::whereIn('id_produk', $favouriteProductIds)->get();

        return view('favourite', [
            'produk' => $produkByFavourites, 
            'kategoris' => Kategori::all(),
            'favouriteProductIds' => $favouriteProductIds->toArray(),
        ]);
    }

    public function addFavourite(Request $request)
    {
        $user = Auth::user();
        $produkId = $request->input('produk_id');

        if (!$user) {
            return redirect()->route('login');
        }

        Favourite::create([
            'user_id' => $user->id,
            'produk_id' => $produkId,
        ]);

        return back();
    }

    public function removeFavourite(Request $request)
    {
        $user = Auth::user();
        $produkId = $request->input('produk_id');

        if (!$user) {
            return redirect()->route('login');
        }

        Favourite::where('user_id', $user->id)->where('produk_id', $produkId)->delete();

        return back();
    }


}