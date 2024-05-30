<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function stepOne()
    {
        return view('reservations.step-one');
    }

    public function storeStepOne(Request $request)
    {
        // Validate data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tel_number' => 'required|string',
            'res_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'guest_number' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::create($validatedData);

        return redirect()->route('reservations.step-two');
    }

    public function stepTwo()
    {
        return view('reservations.step-two');
    }

    public function storeStepTwo(Request $request)
    {
        // Validate data
        $validatedData = $request->validate([
            'location' => 'required|string',
            'venue' => 'required|string',
            'order' => 'required|string',
            'additional_order' => 'nullable|string',
        ]);

        $reservation = Reservation::latest()->first();

        if ($reservation) {
            $reservation->update($validatedData);
            $request->session()->forget('reservation');
            return redirect()->route('reservations.finish-step')->with('success', 'Reservation made successfully!');
        } else {
            return redirect()->route('reservations.step-one')->with('error', 'No reservation found to update.');
        }
    }

    public function finishStep()
    {
        return view('reservations.step-one');
    }
}
