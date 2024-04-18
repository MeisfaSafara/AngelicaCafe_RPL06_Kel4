<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details'; 

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

// relasi dengan model Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

// relasi dengan model Product 
    public function product()
    {
        return $this->belongsTo(Produk::class, 'product_id');
    }
}
