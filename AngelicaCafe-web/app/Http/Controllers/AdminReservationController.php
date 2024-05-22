<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel_number' => 'required',
            'res_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'guest_number' => 'required|integer',
            'location' => 'required',
            'venue' => 'required',
            'order' => 'required',
        ]);

        Reservation::create($request->all());

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel_number' => 'required',
            'res_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'guest_number' => 'required|integer',
            'location' => 'required',
            'venue' => 'required',
            'order' => 'required',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted successfully.');
    }


    public function updateStatus(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->update(['status' => $request->status]);

    return redirect()->back()->with('success', 'Reservation status updated successfully.');
}

}
