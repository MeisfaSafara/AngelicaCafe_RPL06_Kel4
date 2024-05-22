<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>{{ isset($reservation) ? 'Edit Reservation' : 'Create Reservation' }}</title>
</head>

<body>
    @include('layout.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{ isset($reservation) ? route('admin.reservations.update', $reservation->id) : route('admin.reservations.store') }}" method="POST">
                @csrf
                @if(isset($reservation))
                    @method('PUT')
                @endif
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ isset($reservation) ? $reservation->name : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ isset($reservation) ? $reservation->email : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="tel_number" id="tel_number" value="{{ isset($reservation) ? $reservation->tel_number : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                    <input type="date" name="res_date" id="res_date" value="{{ isset($reservation) ? $reservation->res_date : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                    <input type="time" name="start_time" id="start_time" value="{{ isset($reservation) ? $reservation->start_time : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                    <input type="time" name="end_time" id="end_time" value="{{ isset($reservation) ? $reservation->end_time : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                    <input type="number" name="guest_number" id="guest_number" value="{{ isset($reservation) ? $reservation->guest_number : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ isset($reservation) ? $reservation->location : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                    <input type="text" name="venue" id="venue" value="{{ isset($reservation) ? $reservation->venue : '' }}" required class="mt-1 block w-full">
                </div>
                <div class="mb-4">
                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                    <textarea name="order" id="order" required class="mt-1 block w-full">{{ isset($reservation) ? $reservation->order : '' }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="additional_order" class="block text-sm font-medium text-gray-700">Additional Order</label>
                    <textarea name="additional_order" id="additional_order" class="mt-1 block w-full">{{ isset($reservation) ? $reservation->additional_order : '' }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 block w-full">
                        <option value="pending" {{ isset($reservation) && $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ isset($reservation) && $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ isset($reservation) && $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($reservation) ? 'Update' : 'Create' }}</button>
            </form>
        </div>
    </div>
</body>

</html>
