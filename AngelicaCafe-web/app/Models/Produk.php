<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $tabel = 'produks';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_Produk',
        'deskripsi',
        'stok',
        'harga',
        'gambar',
        'id_kategori',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
