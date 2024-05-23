<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .status-pending {
            background-color: #f6e05e; /* Yellow */
            color: #1a202c; /* Darker gray */
        }

        .status-confirmed {
            background-color: #48bb78; /* Green */
            color: #1a202c; /* Darker gray */
        }

        .status-cancelled {
            background-color: #f56565; /* Red */
            color: #1a202c; /* Darker gray */
        }

        .btn-create {
            background-color: #4299e1; /* Blue */
            color: #ffffff; /* White */
            transition: background-color 0.3s ease;
            padding: 10px 20px; /* Adjust padding */
            font-size: 16px; /* Adjust font size */
            border-radius: 8px; /* Adjust border radius */
        }

        .btn-create:hover {
            background-color: #2b6cb0; /* Darker blue */
        }

        .btn-create:focus {
            box-shadow: 0 0 0 2px #4299e1; /* Blue */
        }

        .status-select {
            border: 1px solid #e2e8f0; /* Light gray */
            padding: 0.5rem;
            border-radius: 0.25rem;
            background-color: #ffffff; /* White */
        }

        .status-select:focus {
            outline: none;
            border-color: #4a5568; /* Gray */
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .table-row:hover {
            background-color: #f0f4f8; /* Lighter gray */
        }

        .action-buttons a,
        .action-buttons button {
            margin-right: 0.5rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .action-buttons a.view {
            background-color: #63b3ed; /* Light Blue */
            color: #ffffff; /* White */
        }

        .action-buttons a.edit {
            background-color: #6b7280; /* Gray */
            color: #ffffff; /* White */
        }

        .action-buttons button {
            background-color: #f87171; /* Red */
            color: #ffffff; /* White */
        }

        .action-buttons a:hover,
        .action-buttons button:hover {
            background-color: #4c51bf; /* Darker Blue */
        }

        /* Add style for the content */
        .content {
            margin-left: 20px; /* Adjust this value based on your preference */
            margin-right: 20px; /* Adjust this value based on your preference */
        }

        @media (min-width: 768px) {
            .content {
                margin-left: 280px; /* Adjust this value based on your sidebar width */
            }
        }

        /* Center align text in table headers */
        th {
            text-align: center;
            border: 1px solid #e2e8f0; /* Add border */
            padding: 10px; /* Add padding */
        }

        /* Add border and padding to table cells */
        td {
            border: 1px solid #e2e8f0; /* Add border */
            padding: 10px; /* Add padding */
        }
    </style>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const confirmed = confirm("Are you sure you want to delete this reservation?");
            if (confirmed) {
                event.target.submit();
            }
        }
    </script>
</head>

<body class="bg-gray-100">
    @include('layout.sidebar')

    <div class="content mt-6">
        <div class="flex justify-end">
            <a href="{{ route('admin.reservations.create') }}" class="btn btn-create mb-4 shadow-lg rounded-md py-2 px-6 text-lg font-semibold">Create Reservation</a>
        </div>
        <div class="rounded-lg overflow-hidden shadow-lg">
            <table class="w-full bg-white divide-y divide-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Phone</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                    <tr class="table-row hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->tel_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->res_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge {{ $reservation->status === 'pending' ? 'status-pending' : ($reservation->status === 'confirmed' ? 'status-confirmed' : 'status-cancelled') }}">
                                {{ $reservation->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap action-buttons">
                            <div class="flex flex-col items-center">
                                <div class="mb-2">
                                    <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="view">View</a>
                                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="edit">Edit</a>
                                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="inline" onsubmit="confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                                <div>
                                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" class="inline mt-2">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="status-select" onchange="this.form.submit()">
                                            <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
