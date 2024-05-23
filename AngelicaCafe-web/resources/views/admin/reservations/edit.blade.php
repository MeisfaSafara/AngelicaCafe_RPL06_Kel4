<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #2d3748;
            color: #fff;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }
        .sidebar a:hover {
            color: #4299e1;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .bg-primary {
            background-color: #2d3748; /* Darker Gray */
            color: #edf2f7; /* Very light gray */
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-back {
            background-color: #63b3ed; /* Light Blue */
            color: #ffffff; /* White */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #4299e1; /* Darker Blue */
        }
        .btn-save {
            background-color: #4299e1; /* Blue */
            color: #ffffff; /* White */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-save:hover {
            background-color: #2c5282; /* Darker Blue */
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-input {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }
        .form-select {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }
        .form-select:focus {
            outline: none;
            border-color: #4a5568;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('layout.sidebar')
        <div class="main-content">
            <div class="bg-primary">
                <h3 class="text-xl font-semibold">Edit Reservation</h3>
                <p class="mt-1 text-sm">Update the details of the reservation.</p>
            </div>
            <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="bg-white shadow-lg-custom rounded-lg overflow-hidden p-4">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $reservation->name }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $reservation->email }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="tel_number">Phone Number</label>
                    <input type="text" name="tel_number" id="tel_number" value="{{ $reservation->tel_number }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="res_date">Reservation Date</label>
                    <input type="date" name="res_date" id="res_date" value="{{ $reservation->res_date }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="time" name="start_time" id="start_time" value="{{ $reservation->start_time }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="time" name="end_time" id="end_time" value="{{ $reservation->end_time }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="guest_number">Guest Number</label>
                    <input type="number" name="guest_number" id="guest_number" value="{{ $reservation->guest_number }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" value="{{ $reservation->location }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="venue">Venue</label>
                    <input type="text" name="venue" id="venue" value="{{ $reservation->venue }}" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="flex justify-between mt-4">
                    <button type="submit" class="btn-save">Save</button>
                    <a href="{{ route('admin.reservations.index') }}" class="btn-back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
