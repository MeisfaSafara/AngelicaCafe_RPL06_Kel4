<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use App\Models\Produk;
use Auth;

class FavouriteController extends Controller
{
    public function toggleFavourite($id)
    {
        $user = Auth::user();
        $favourite = Favourite::where('user_id', $user->id)->where('produk_id', $id)->first();

        if ($favourite) {
            $favourite->delete();
            $status = 'removed';
        } else {
            Favourite::create([
                'user_id' => $user->id,
                'produk_id' => $id,
            ]);
            $status = 'added';
        }

        // Fetch all favourites for the user
        $favourites = Favourite::where('user_id', $user->id)->with('produk')->get()->map(function ($favourite) {
            return [
                'id_produk' => $favourite->produk->id_produk,
                'nama_Produk' => $favourite->produk->nama_Produk,
                'deskripsi' => $favourite->produk->deskripsi,
                'harga' => $favourite->produk->harga,
                'gambar' => $favourite->produk->gambar,
            ];
        });

        return response()->json([
            'status' => $status,
            'favourites' => $favourites,
        ]);
    }
}
