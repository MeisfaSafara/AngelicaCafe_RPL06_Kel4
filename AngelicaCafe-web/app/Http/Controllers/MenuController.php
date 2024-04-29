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

}