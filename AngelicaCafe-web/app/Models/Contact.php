<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact_forms';

    protected $fillable = [
        'first_name',
        'last_name',
        'email', // Sesuaikan dengan nama kolom di tabel database
        'phone',
        'message',
    ];

}
