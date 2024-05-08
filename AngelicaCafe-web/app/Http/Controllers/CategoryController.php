<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $getAllCategory = Kategori::all();
        return view('admin.kategori',[
            'kategoris' => $getAllCategory
        ]);
    }

    public function create(){
       return view('admin.addcategory');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ]);
        $category = Kategori::create([
            'nama_kategori' => $validatedData['nama_kategori']
        ]);
        return redirect()->route('admin.category');
    }

    public function edit($id){
        $findCategory = Kategori::findOrFail($id);
        return view('admin.updatecategory',[
            'kategori' => $findCategory
        ]);
    }

    public function update($id, Request $request){
        $findCategory = Kategori::findOrFail($id);

        $findCategory->nama_kategori = $request->nama_kategori;
        $findCategory->update();

        return redirect()->route('admin.category');
    }
}