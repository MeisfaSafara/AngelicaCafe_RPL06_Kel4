<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_amount',
    ];

    // menfinisikan relasi antara model Order dan model User jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
