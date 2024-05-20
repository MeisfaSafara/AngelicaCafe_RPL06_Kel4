<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        // Cetak data untuk memastikan data berhasil diambil
        dd($reservations);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel_number' => 'required',
            'res_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'guest_number' => 'required|integer|min:1',
            'location' => 'nullable|string',
            'venue' => 'nullable|string',
            'order' => 'nullable|string',
            'additional_order' => 'nullable|string',
        ]);

        Reservation::create($validated);

        return redirect()->route('admin.reservations.index');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel_number' => 'required',
            'res_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'guest_number' => 'required|integer|min:1',
            'location' => 'nullable|string',
            'venue' => 'nullable|string',
            'order' => 'nullable|string',
            'additional_order' => 'nullable|string',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($validated);

        return redirect()->route('admin.reservations.index');
    }

    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();
        return redirect()->route('admin.reservations.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $reservation->status = $validated['status'];
        $reservation->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
}
