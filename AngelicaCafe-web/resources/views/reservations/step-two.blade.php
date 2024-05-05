<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- DisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist-64.min.css" rel="stylesheet" type="text/css" />
    {{-- DisyUI --}}

    <!-- Add these links to your HTML file -->

    <title>Document</title>
</head>

<body data-theme="cupcake">
    {{-- NAVBAR --}}
    @include('layout.navbar')
    {{-- NAVBAR --}}
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img class="object-cover w-full h-full"
                            src="{{ asset('img/Restaurant.jpeg') }}" alt="img" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>

                            <div class="w-full bg-gray-200 rounded-full">
                                <div
                                    class="w-100 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                    Step 2</div>
                            </div>

                            <form method="POST" action="{{ route('reservations.store.step-two') }}">
                                <div class="sm:col-span-6">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Lokasi Acara</label>
                                    <select id="location" name="location" class="block w-full mt-1 bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="Cabang Jakarta Pusat">Cabang Jakarta Pusat</option>
                                        <option value="Cabang Jakarta Selatan">Cabang Jakarta Selatan</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="venue" class="block text-sm font-medium text-gray-700">Room</label>
                                    <select id="venue" name="venue" class="block w-full mt-1 bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="Indoor">Indoor</option>
                                        <option value="Outdoor">Outdoor</option>
                                        <option value="Meeting Room">Meeting Room</option>
                                    </select>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="order" class="block text-sm font-medium text-gray-700">Pesanan</label>
                                    <select id="order" name="order" class="block w-full mt-1 bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="Paket 1">Paket 1</option>
                                        <option value="Paket 2">Paket 2</option>
                                        <option value="Paket 3">Paket 3</option>
                                    </select>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="additional_order" class="block text-sm font-medium text-gray-700">Tambahan Pesanan</label>
                                    <textarea id="additional_order" name="additional_order" rows="3"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                                </div>

                                <div class="mt-6 p-4 flex justify-between">
                                    <a href="{{ route('reservations.step-one') }}"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Previous</a>
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Make
                                        Reservation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- FOOTER --}}
    @include('layout.footer')

    @extends('layouts.app')


</body>

</html>


