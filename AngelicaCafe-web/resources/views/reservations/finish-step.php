<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- DisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist-64.min.css" rel="stylesheet" type="text/css" />
    {{-- DisyUI --}}

    <!-- Add these links to your HTML file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        /* Customize styling here */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .card {
            background-color: #efdbb2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #ad6b26;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #825a2c;
        }
    </style>
</head>

<body data-theme="cupcake">
    {{-- NAVBAR --}}
    @include('layout.navbar')
    {{-- NAVBAR --}}
    <div class="container">
        <h2 class="text-3xl font-bold mb-6">Reservation Confirmation</h2>

        <div class="card">
            <h3 class="text-xl font-semibold mb-4">Thank You for Your Reservation!</h3>
            <p class="mb-2">Name: {{ $reservation->name }}</p>
            <p class="mb-2">Email: {{ $reservation->email }}</p>
            <p class="mb-2">Reservation Date: {{ $reservation->res_date }}</p>
            <p class="mb-2">Start Time: {{ $reservation->start_time }}</p>
            <p class="mb-2">End Time: {{ $reservation->end_time }}</p>
            <p class="mb-2">Guest Number: {{ $reservation->guest_number }}</p>
            <p class="mb-2">Location: {{ $reservation->location }}</p>
            <p class="mb-2">Venue: {{ $reservation->venue }}</p>
            <p class="mb-2">Order: {{ $reservation->order }}</p>
            <p class="mb-2">Additional Order: {{ $reservation->additional_order ?? '-' }}</p>
        </div>

        <p class="text-lg mb-4">You will receive a confirmation email shortly.</p>
        <a href="/menu" class="btn btn-primary btn-back">&#8592; Back to Home</a>
    </div>

    {{-- FOOTER --}}
    @include('layout.footer')

    <!-- WhatsApp Floating Button Script -->
    <script>
        var script = document.createElement('script');
        script.src = 'https://sleekflow.io/whatsapp-button.js';
        script.async = true;
        script.onload = function () {
            whatsappButton({
                buttonName: 'Hubungi Kami',
                buttonIconSize: '22',
                buttonMargin: 'true',
                brandName: 'Angelica Cafe',
                brandSubtitleText: 'All rights reserved',
                buttonSize: 'medium',
                buttonPosition: 'right',
                callToAction: 'Mulai Chat',
                phoneNumber: '6281315666669',
                welcomeMessage: 'Halo 👋\nAda yang bisa kami bantu?',
                prefillMessage: 'Tentu, Saya akan memesanya',
                containerId: 'whatsappButtonContainer', // Specify the container ID here
            });
        };
        document.body.appendChild(script);
    </script>
</body>

</html>
