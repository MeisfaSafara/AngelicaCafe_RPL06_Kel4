<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Accessor untuk memformat tanggal
    protected $fillable = [
        'first_name', 
        'email', 
        'tel_number', 
        'res_date', 
        'start_time', 
        'end_time', 
        'guest_number'
    ];

}
