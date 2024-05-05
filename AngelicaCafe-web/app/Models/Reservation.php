<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['res_date'];

    // Accessor untuk memformat tanggal
    public function getFormattedResDateAttribute()
    {
        return $this->res_date ? $this->res_date->format('Y-m-d') : '';
    }

}
