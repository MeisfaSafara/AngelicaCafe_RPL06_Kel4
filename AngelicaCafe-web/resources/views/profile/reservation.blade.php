<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- DaisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    {{-- DaisyUI --}}

    <title>Document</title>
</head>

<style>
    .gambar {
        /* background-image: url({{ url('/img/MenuBackground.png') }}); */
        background-size: cover;
    }
</style>

<body data-theme="cupcake">
    {{-- NAVBAR --}}
    @include('layout.navbar')
    {{-- NAVBAR --}}

    {{-- OUR MENU --}}
    <div class="h-full pt-[7em]">
        <div class="flex flex-col border-2 rounded-xl px-6 mx-32 py-4 mb-6">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.293 5.293a1 1 0 011.414 0l.293.293V7a1 1 0 01-2 0V5.586l.293-.293a1 1 0 111.414 1.414L13 7.414l1.293-1.293a1 1 0 111.414 1.414L14.414 9l1.293 1.293a1 1 0 11-1.414 1.414L13 10.414l-1.293 1.293a1 1 0 11-1.414-1.414L11.586 9l-1.293-1.293a1 1 0 010-1.414 1 1 0 011.414 0L13 7.586l1.293-1.293z"/></svg>
                </span>
            </div>
            @endif
            <div class="flex gap-4">
                <a href="/profile">
                    <h1 class="font-semibold text-xl text-gray-800">Personal Profile</h1>
                </a>
                <a href="/profile/address">
                    <h1 class="font-semibold text-xl text-gray-800">Address List</h1>
                </a>
                <a href="/profile/transaction">
                    <h1 class="font-semibold text-xl text-gray-800">Transaction List</h1>
                </a>
                <a href="/profile/reservation">
                    <h1 class="font-semibold text-xl underline underline-offset-8">Reservation List</h1>
                </a>
            </div>
            <hr class="my-4 border-t border-gray-300">
            {{-- CONTENT --}}
            <div class="flex flex-col gap-6">
                @foreach ($reservations as $reservation)
                <div class="flex flex-col bg-white rounded-xl p-6">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center gap-2">
                            <h1 class="text-lg font-semibold text-gray-800">Reservation Name:</h1>
                            <span class="text-xl font-bold text-gray-700">{{ $reservation->name }}</span>
                            <span class="px-2 py-1 rounded-lg
                                @if ($reservation->status === 'pending')
                                bg-yellow-400 text-yellow-800
                                @elseif ($reservation->status === 'confirmed')
                                bg-green-400 text-green-800
                                @endif">
                                {{ $reservation->status }}
                            </span>
                        </div>
                        <p class="text-gray-600">{{ $reservation->res_date }}</p>
                    </div>
                    <hr class="my-2 border-t border-gray-300">
                    <div class="flex justify-between items-center">
                        <div class="flex gap-6">
                            <div class="flex flex-col">
                                <p class="text-gray-600">Location:</p>
                                <h1 class="font-bold text-lg text-gray-800">{{ $reservation->location }}</h1>
                                <p class="text-gray-600">Order:</p>
                                <h1 class="font-bold text-lg text-gray-800">{{ $reservation->order }}</h1>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-600">Phone Number:</p>
                                <h1 class="font-bold text-lg text-gray-800">{{ $reservation->tel_number }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- CONTENT --}}
        </div>
    </div>
    {{-- FOOTER --}}
    @include('layout.footer');
    {{-- FOOTER --}}
</body>

</html>
