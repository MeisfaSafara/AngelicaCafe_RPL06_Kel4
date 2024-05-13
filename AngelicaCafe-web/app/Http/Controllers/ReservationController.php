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
        return view('reservations.step-one');
    }
    public function storeStepOne(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tel_number' => 'required|string',
            'res_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'guest_number' => 'required|integer|min:1',
        ]);

        Reservation::create($validatedData);

        return redirect()->route('reservations.step-two');
    }
    public function stepTwo()
    {
        return view('reservations.step-two');
    }
    public function storeStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'required|string',
            'venue' => 'required|string',
            'order' => 'required|string',
            'additional_order' => 'nullable|string',
        ]);

        $reservation = Reservation::latest()->first();

        $reservation->update($validatedData);
        $reservation = $request->session()->get('reservation');
        $request->session()->forget('reservation');

        return redirect()->route('reservations.finish-step');
    }

    
    public function finishstep()
    {
        $reservation = Reservation::latest()->first();
        return view('reservations.finish-step', compact('reservation'));
    }

}
