<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
    <title>Edit Reservation</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .bg-primary {
            background-color: #2d3748;
        }
        .bg-secondary {
            background-color: #f7fafc;
        }
        .text-primary {
            color: #edf2f7;
        }
        .text-secondary {
            color: #1a202c;
        }
        .shadow-lg-custom {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .btn-back {
            background-color: #63b3ed;
            color: #ffffff;
        }
        .btn-back:hover {
            background-color: #4299e1;
        }
        .btn-save {
            background-color: #4299e1;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }
        .btn-save:hover {
            background-color: #2c5282;
        }
        .form-select:focus {
            outline: none;
            border-color: #4a5568;
        }
    </style>
</head>

<body class="bg-secondary text-gray-800">

    <div class="min-h-screen flex">
        @include('layout.sidebar')
        <div class="flex-1 p-20">
            <div class="max-w-7xl mx-auto bg-white shadow-lg-custom rounded-lg overflow-hidden">
                <div class="px-6 py-4 sm:px-8 flex justify-between items-center bg-primary text-primary">
                    <div>
                        <h3 class="text-xl font-semibold">Edit Reservation</h3>
                        <p class="mt-1 text-sm">Update the details of the reservation below.</p>
                    </div>
                    <a href="{{ route('admin.reservations.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md btn-back focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                        Back
                    </a>
                </div>
                <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="px-6 py-4 sm:px-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="form-group">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ $reservation->name }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $reservation->email }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="tel_number" id="tel_number" value="{{ $reservation->tel_number }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                            <input type="date" name="res_date" id="res_date" value="{{ $reservation->res_date }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="time" name="start_time" id="start_time" value="{{ $reservation->start_time }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="time" name="end_time" id="end_time" value="{{ $reservation->end_time }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Number of Guests</label>
                            <input type="number" name="guest_number" id="guest_number" value="{{ $reservation->guest_number }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" id="location" value="{{ $reservation->location }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                            <input type="text" name="venue" id="venue" value="{{ $reservation->venue }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                            <input type="text" name="order" id="order" value="{{ $reservation->order }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>

                        <div class="form-group">
                            <label for="additional_order" class="block text-sm font-medium text-gray-700">Additional Order</label>
                            <input type="text" name="additional_order" id="additional_order" value="{{ $reservation->additional_order }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <button type="submit" class="btn-save inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>