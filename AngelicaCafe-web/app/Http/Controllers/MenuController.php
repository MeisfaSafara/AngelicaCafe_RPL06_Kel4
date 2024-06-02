<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Display all products or products by category
    public function index($id = null)
    {
        $produkByKategori = $id ? Produk::where('id_kategori', $id)->get() : Produk::all();
        $kategoris = Kategori::all();

        
        $favouriteProductIds = $this->getFavouriteProductIds();

        return view('menu', [
            'produk' => $produkByKategori,
            'kategoris' => $kategoris,
            'favouriteProductIds' => $favouriteProductIds
        ]);
    }

    // Display all products for user dashboard
    public function menuUser()
    {
        $produk = Produk::all();

        return view('dashboard', [
            'produks' => $produk
        ]);
    }

    // Display product details
    public function showDetail($id)
    {
        $produk = Produk::findOrFail($id);

        return view('menu.detail', ['produk' => $produk]);
    }

    // Search for products by name
    public function search(Request $request)
    {
        $query = $request->input('search');
        $produk = Produk::where('nama_Produk', 'LIKE', "%{$query}%")->get();

        
        $favouriteProductIds = $this->getFavouriteProductIds();

        return view('MenuOutput', compact('produk', 'favouriteProductIds'));
    }

    // Filter products based on price range
    public function filter(Request $request)
    {
        $filters = $request->input('filters');
        $produkQuery = Produk::query();

        if (in_array('cheap', $filters)) {
            $produkQuery->orWhere('harga', '<', 6000);
        }

        if (in_array('medium', $filters)) {
            $produkQuery->orWhereBetween('harga', [6000, 10000]);
        }

        if (in_array('expensive', $filters)) {
            $produkQuery->orWhere('harga', '>', 10000);
        }

        $produk = $produkQuery->get();

       
        $favouriteProductIds = $this->getFavouriteProductIds();

        return view('MenuOutput', compact('produk', 'favouriteProductIds'));
    }

   
    private function getFavouriteProductIds()
    {
        
        return [];
    }
}
