<?php

namespace App\Http\Controllers;

use App\Enums\TableStatus;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{
    public function stepOne()
    {
        // Logika untuk menampilkan langkah pertama dalam proses reservasi
        return view('reservations.step-one');
    }
    
    public function create()
    {
        $reservation = new Reservation();
        return view('reservations.step-one', compact('reservation'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel_number' => 'required',
            'res_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'guest_number' => 'required|integer|min:1',
        ]);

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        return redirect()->route('reservations.step-two');
    }
    public function stepTwo()
    {
        // Logika untuk menampilkan langkah pertama dalam proses reservasi
        return view('reservations.step-two');
    }


}
