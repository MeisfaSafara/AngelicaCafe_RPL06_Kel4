<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index($id = null)
    {
        if ($id) {
            $produkByKategori = Produk::where('id_kategori', $id)->get();
        } else {
            $produkByKategori = Produk::all();
        }

        $kategoris = Kategori::all();

        return view('menu', [
            'produk' => $produkByKategori,
            'kategoris' => $kategoris
        ]);
    }



    public function menuUser(){
        $produk = Produk::all();

        return view('dashboard',[
            'produks' => $produk
        ]);
    }

    public function showDetail($id)
        {
        $produk = Produk::findOrFail($id);

        return view('menu.detail', ['produk' => $produk]);
    }

    public function search(Request $request){
        $query = $request->input('search');

        $produkData = Produk::getAllData();
        $produk = Produk::where('nama_Produk', 'LIKE', "%{$query}%")->get();
        return view('MenuOutput', compact('produk'));
    }

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

    return view('MenuOutput', compact('produk'));
}

}