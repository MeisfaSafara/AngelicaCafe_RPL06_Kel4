<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- DaisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist-64.min.css" rel="stylesheet" type="text/css" />
    {{-- DaisyUI --}}

    <title>Make Reservation - Step 2</title>
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
                            src="{{ asset('img/Restaurant.jpeg') }}" alt="Restaurant" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation - Step 2</h3>

                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="w-full p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                    Step 2
                                </div>
                            </div>

                            <form id="reservationForm" method="POST" action="{{ route('reservations.store.step-two') }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                    <select id="location" name="location" class="block w-full mt-1 bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="Cabang Jakarta Pusat">Cabang Jakarta Pusat</option>
                                        <option value="Cabang Jakarta Selatan">Cabang Jakarta Selatan</option>
                                    </select>
                                    @error('location')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                                    <select id="venue" name="venue" class="block w-full mt-1 bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="Indoor">Indoor</option>
                                        <option value="Outdoor">Outdoor</option>
                                        <option value="Meeting Room">Meeting Room</option>
                                    </select>
                                    @error('venue')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                                    <select id="order" name="order" class="block w-full mt-1 bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="Paket 1">Paket 1</option>
                                        <option value="Paket 2">Paket 2</option>
                                        <option value="Paket 3">Paket 3</option>
                                    </select>
                                    @error('order')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="additional_order" class="block text-sm font-medium text-gray-700">Additional Order</label>
                                    <textarea id="additional_order" name="additional_order" rows="3"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                                    @error('additional_order')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
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

    {{-- Modal for Success Message --}}
    <div id="successModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Success!</h2>
            <p>Your reservation has been made successfully. Please wait for our reservation team to contact you.</p>
            <button id="closeModalBtn" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Close</button>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('layout.footer')

    @extends('layouts.app')

    <script>
        document.getElementById('reservationForm').addEventListener('submit', function(event) {
            // event.preventDefault(); // Remove this line to allow form submission

            // Display the success modal
            event.preventDefault();
            // Show the modal
            document.getElementById('successModal').classList.remove('hidden');
        });

        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('successModal').classList.add('hidden');
            // Redirect to another page if needed
            window.location.href = "{{ route('reservations.step-one') }}";
        });
    </script>

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
                containerId: 'whatsappButtonContainer',
            });
        };
        document.body.appendChild(script);
    </script>

</body>

</html>
