<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'tel_number',
        'res_date',
        'start_time',
        'end_time',
        'guest_number',
        'location',
        'venue',
        'order',
        'additional_order',
    ];
}
