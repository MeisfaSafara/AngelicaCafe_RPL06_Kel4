<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
    <title>Reservation Details</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .bg-primary {
            background-color: #2d3748; /* Darker Gray */
        }
        .bg-secondary {
            background-color: #f7fafc; /* Very light gray */
        }
        .bg-accent {
            background-color: #e2e8f0; /* Light gray */
        }
        .text-primary {
            color: #edf2f7; /* Very light gray */
        }
        .text-secondary {
            color: #1a202c; /* Darker gray */
        }
        .shadow-lg-custom {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .form-select {
            border: 1px solid #ccc;
            padding: 0.5rem;
            border-radius: 0.25rem;
            background-color: #fff;
        }
        .form-select:focus {
            outline: none;
            border-color: #4a5568;
        }
        .form-select-status-pending {
            background-color: #facc15; /* Yellow */
            color: #1a202c; /* Darker gray */
        }
        .form-select-status-confirmed {
            background-color: #34d399; /* Green */
            color: #1a202c; /* Darker gray */
        }
        .form-select-status-cancelled {
            background-color: #f87171; /* Red */
            color: #1a202c; /* Darker gray */
        }
        .btn-back {
            background-color: #63b3ed; /* Light Blue */
            color: #ffffff; /* White */
        }
        .btn-back:hover {
            background-color: #4299e1; /* Darker Blue */
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
                        <h3 class="text-xl font-semibold">Reservation Details</h3>
                        <p class="mt-1 text-sm">Details and status of the reservation.</p>
                    </div>
                    <a href="{{ route('admin.reservations.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md btn-back focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                        Back
                    </a>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        @php
                            $fields = [
                                'Name' => $reservation->name,
                                'Email' => $reservation->email,
                                'Phone Number' => $reservation->tel_number,
                                'Reservation Date' => $reservation->res_date,
                                'Start Time' => $reservation->start_time,
                                'End Time' => $reservation->end_time,
                                'Guest Number' => $reservation->guest_number,
                                'Location' => $reservation->location,
                                'Venue' => $reservation->venue,
                                'Order' => $reservation->order,
                                'Additional Order' => $reservation->additional_order
                            ];
                            $isDark = false;
                        @endphp

                        @foreach($fields as $field => $value)
                            <div class="{{ $isDark ? 'bg-accent text-secondary' : 'bg-white text-gray-900' }} px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                                <dt class="text-sm font-medium">{{ $field }}</dt>
                                <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">{{ $value }}</dd>
                            </div>
                            @php $isDark = !$isDark; @endphp
                        @endforeach

                        <div class="bg-accent text-secondary px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                            <dt class="text-sm font-medium">Status</dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="block w-full mt-1 form-select {{ $reservation->status == 'pending' ? 'form-select-status-pending' : ($reservation->status == 'confirmed' ? 'form-select-status-confirmed' : 'form-select-status-cancelled') }}" onchange="this.form.submit()">
                                        <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
