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

        // Create reservation
        $reservation = Reservation::create($validatedData);

        // Store reservation ID in session
        $request->session()->put('reservation_id', $reservation->id);

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

        // Retrieve reservation ID from session
        $reservationId = $request->session()->pull('reservation_id');

        if (!$reservationId) {
            return redirect()->route('reservations.step-one')->with('error', 'No reservation found to update.');
        }

        // Update reservation
        $reservation = Reservation::find($reservationId);

        if (!$reservation) {
            return redirect()->route('reservations.step-one')->with('error', 'No reservation found to update.');
        }

        $reservation->update($validatedData);

        return redirect()->route('reservations.step-one')->with('success', 'Reservation made successfully!');
    }
}
