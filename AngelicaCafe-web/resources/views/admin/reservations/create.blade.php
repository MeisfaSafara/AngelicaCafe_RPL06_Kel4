<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
    <title>{{ isset($reservation) ? 'Edit Reservation' : 'Create Reservation' }}</title>
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

        .bg-accent {
            background-color: #e2e8f0;
        }

        .text-primary {
            color: #edf2f7;
        }

        .text-secondary {
            color: #1a202c;
        }

        .shadow-lg-custom {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .form-select,
        .form-input,
        .form-textarea {
            border: 2px solid #e2e8f0;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-select:focus,
        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #4299e1;
        }

        .btn-primary {
            background-color: #4299e1;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2b6cb0;
        }

        .btn-back {
            background-color: #63b3ed;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #4299e1;
        }
    </style>
</head>

<body class="bg-secondary text-gray-800">

    @include('layout.sidebar')

    <div class="p-6 sm:ml-64">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white shadow-lg-custom rounded-lg overflow-hidden">
                <div class="px-6 py-4 sm:px-8 flex justify-between items-center bg-primary text-primary">
                    <div>
                        <h3 class="text-xl font-semibold">{{ isset($reservation) ? 'Edit Reservation' : 'Create Reservation' }}</h3>
                        <p class="mt-1 text-sm">{{ isset($reservation) ? 'Update the details of the reservation.' : 'Fill in the details to create a new reservation.' }}</p>
                    </div>
                    <a href="{{ route('admin.reservations.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md btn-back focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                        Back
                    </a>
                </div>
                <div class="border-t border-gray-200 p-6 sm:p-8">
                    <form action="{{ isset($reservation) ? route('admin.reservations.update', $reservation->id) : route('admin.reservations.store') }}" method="POST">
                        @csrf
                        @if(isset($reservation))
                        @method('PUT')
                        @endif
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" name="name" id="name" value="{{ isset($reservation) ? $reservation->name : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ isset($reservation) ? $reservation->email : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="text" name="tel_number" id="tel_number" value="{{ isset($reservation) ? $reservation->tel_number : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="res_date" class="block text-sm font-medium text-gray-700 mb-2">Reservation Date</label>
                            <input type="date" name="res_date" id="res_date" value="{{ isset($reservation) ? $reservation->res_date : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                            <input type="time" name="start_time" id="start_time" value="{{ isset($reservation) ? $reservation->start_time : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                            <input type="time" name="end_time" id="end_time" value="{{ isset($reservation) ? $reservation->end_time : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700 mb-2">Guest Number</label>
                            <input type="number" name="guest_number" id="guest_number" value="{{ isset($reservation) ? $reservation->guest_number : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                            <input type="text" name="location" id="location" value="{{ isset($reservation) ? $reservation->location : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="venue" class="block text-sm font-medium text-gray-700 mb-2">Venue</label>
                            <input type="text" name="venue" id="venue" value="{{ isset($reservation) ? $reservation->venue : '' }}" required class="form-input w-full">
                        </div>
                        <div class="mb-6">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                            <textarea name="order" id="order" required class="form-textarea w-full">{{ isset($reservation) ? $reservation->order : '' }}</textarea>
                        </div>
                        <div class="mb-6">
                            <label for="additional_order" class="block text-sm font-medium text-gray-700 mb-2">Additional Order</label>
                            <textarea name="additional_order" id="additional_order" class="form-textarea w-full">{{ isset($reservation) ? $reservation->additional_order : '' }}</textarea>
                        </div>
                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status" class="form-select w-full">
                                <option value="pending" {{ isset($reservation) && $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ isset($reservation) && $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ isset($reservation) && $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="flex justify-end mt-8">
                            <a href="{{ route('admin.reservations.index') }}"
                                class="btn-back mr-4">Back</a>
                            <button type="submit" class="btn-primary">{{ isset($reservation) ? 'Update' : 'Save' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
