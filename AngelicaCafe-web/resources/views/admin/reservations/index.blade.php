<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reservations</title>
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #f3f4f6;
        }

        .table-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-x: auto;
        }

        .table-header {
            background-color: #e5e7eb;
        }

        .table-row {
            transition: background-color 0.3s ease;
        }

        .table-row:hover {
            background-color: #f1f5f9;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .action-buttons a,
        .action-buttons form,
        .action-buttons button {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }

        .action-buttons a.view {
            background-color: #3b82f6;
            color: #ffffff;
        }

        .action-buttons a.edit {
            background-color: #10b981;
            color: #ffffff;
        }

        .action-buttons button {
            background-color: #ef4444;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        .action-buttons button:hover {
            background-color: #dc2626;
        }

        .status-select {
            padding: 5px 8px;
            border-radius: 4px;
            background-color: #e5e7eb;
            border: 1px solid #d1d5db;
            margin-top: 0.5rem;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-align: center;
        }

        .status-pending {
            background-color: #fbbf24;
            color: #b45309;
        }

        .status-confirmed {
            background-color: #34d399;
            color: #065f46;
        }

        .status-cancelled {
            background-color: #d1d5db;
            color: #374151;
        }
    </style>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm("Are you sure you want to delete this reservation?")) {
                event.target.submit();
            }
        }
    </script>
</head>

<body>
@include('layout.sidebar')
    <div class="content">
        <div class="table-container">
            <a href="{{ route('admin.reservations.create') }}" class="btn btn-primary mb-4">Create Reservation</a>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 table-header">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Phone</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr class="table-row border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $reservation->name }}</th>
                        <td class="px-6 py-4">{{ $reservation->tel_number }}</td>
                        <td class="px-6 py-4">{{ $reservation->res_date }}</td>
                        <td class="px-6 py-4">
                            <span class="status-badge {{ $reservation->status === 'pending' ? 'status-pending' : ($reservation->status === 'confirmed' ? 'status-confirmed' : 'status-cancelled') }}">
                                {{ $reservation->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 action-buttons">
                            <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="view">View</a>
                            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="edit">Edit</a>
                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="inline" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" class="inline mt-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="status-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
