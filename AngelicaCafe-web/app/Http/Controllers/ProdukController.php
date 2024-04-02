<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::all();

        return view('admin.produks',[
            'produks' => $produk
        ]);
    }

    

    public function store(Request $request){
        // Validasi data yang dikirimkan oleh form
        $validatedData = $request->validate([
            'nama_Produk' => 'required|string',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Mengharuskan tipe gambar dan ukuran maksimum 2MB
            'id_kategori' => 'required|integer',
        ]);
    
        // Menghandle upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file
            $gambarPath = $file->storeAs('public/img/produk', $validatedData['nama_Produk'] . '.' . $extension); // Menyimpan gambar dengan nama yang sesuai dengan nama produk
    
            // Menyimpan nama gambar ke dalam database
            $gambarName = $validatedData['nama_Produk'] . '.' . $extension;
        } else {
            // Jika tidak ada gambar yang diunggah, Anda bisa memberikan nilai default atau menangani sesuai kebutuhan Anda.
            $gambarName = 'default.jpg'; // Ganti dengan nama default gambar yang sesuai
        }
    
        // Membuat produk baru dengan data yang sudah divalidasi dan nama gambar
        $produk = Produk::create([
            'nama_Produk' => $validatedData['nama_Produk'],
            'deskripsi' => $validatedData['deskripsi'],
            'stok' => $validatedData['stok'],
            'harga' => $validatedData['harga'],
            'gambar' => $gambarName,
            'id_kategori' => $validatedData['id_kategori'],
        ]);
    
        return redirect()->route('admin.home')->with('success', 'Produk berhasil ditambahkan!');
    }
    

    public function edit($id){
        $produk = Produk::findOrFail($id);
        $getKategori =  Kategori::all();
        return view('admin.updateproduk',[
            'produk' => $produk,
            'kategori' => $getKategori
        ]);

        
    }

    public function update(Request $request,$id){
       // Validasi data
        $request->validate([
            'nama_Produk' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Tambahkan validasi untuk gambar
        ]);

        // Temukan produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Update data produk
        $produk->id_kategori = $request->input('id_kategori');
        $produk->nama_Produk = $request->input('nama_Produk');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->stok = $request->input('stok');
        $produk->harga = $request->input('harga');
    

        // Menghandle unggah gambar jika ada
        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
            if ($produk->gambar) {
                Storage::delete('public/img/produk/' . $produk->gambar);
            }

            // Upload gambar baru
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file
            $gambarPath = $file->storeAs('public/img/produk', $produk->id_produk . '.' . $extension); // Menyimpan gambar dengan nama yang unik (biasanya ID produk)

            // Menyimpan nama gambar ke dalam database
            $produk->gambar = $produk->id_produk . '.' . $extension;
        }

        // Simpan perubahan produk
        $produk->save();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    public function delete($id){
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
