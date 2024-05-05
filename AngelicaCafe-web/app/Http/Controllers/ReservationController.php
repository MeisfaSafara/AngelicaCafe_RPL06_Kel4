<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    //

    public function create()
    {
        $reservation = new Reservation();
        return view('reservations.step-one', compact('reservation'));
    }


}
