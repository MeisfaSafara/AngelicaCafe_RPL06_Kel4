<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>Edit Reservation</title>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Reservation</h1>
        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $reservation->name }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $reservation->email }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="tel_number" id="tel_number" value="{{ $reservation->tel_number }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="res_date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="res_date" id="res_date" value="{{ $reservation->res_date }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="time" name="start_time" id="start_time" value="{{ $reservation->start_time }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="time" name="end_time" id="end_time" value="{{ $reservation->end_time }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="guest_number" class="block text-sm font-medium text-gray-700">Number of Guests</label>
                <input type="number" name="guest_number" id="guest_number" value="{{ $reservation->guest_number }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" value="{{ $reservation->location }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                <input type="text" name="venue" id="venue" value="{{ $reservation->venue }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full">
                    <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Reservation</button>
        </form>
    </div>
</body>
</html>
