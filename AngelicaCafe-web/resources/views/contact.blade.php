<!DOCTYPE html>
<html lang="en">

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> --}}

    {{-- DisyUI --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- DisyUI --}}

    {{-- <title>Document</title> --}}

{{-- </head>

<style>
    .gambar {
        background-size: cover;
    }
</style> --}}

{{-- <body data-theme="cupcake"> --}}
    {{-- NAVBAR --}}
    {{-- @include('layout.navbar') --}}
    {{-- NAVBAR --}}
    {{-- <div class="w-full h-[20em] relative z-20 flex flex-col items-center justify-center"
        style="background-image: url({{ url('/img/contactUs.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">Contact Us</h1>
        <p class="text-white text-xl w-[20em] text-center">Please give us a call, or email us
            and we’ll get back to you.</p>
    </div> --}}

    {{-- OUR MENU --}}
    {{-- <div class="flex flex-col my-6 justify-between px-[10em]">
        <div class="flex gap-6 mx-auto relative z-20 -top-[50px]">
            <div class="w-[18em] bg-white py-3 shadow-xl rounded-lg">
                <div class="flex gap-3 mx-auto w-fit">
                    <span class="material-symbols-outlined font-semibold text-[3em]">
                        phone_in_talk
                    </span>
                    <div class="flex flex-col">
                        <h1 class="font-bold">Call Us</h1>
                        <p class="text-gray-400">+6281315666669</p>
                    </div>
                </div>
            </div>
            <div class="w-[18em] bg-white py-3 shadow-xl rounded-lg">
                <div class="flex gap-3 mx-auto w-fit">
                    <span class="material-symbols-outlined font-semibold text-[3em]">
                        mail
                    </span>
                    <div class="flex flex-col">
                        <h1 class="font-bold">Email Us</h1>
                        <p class="text-gray-400">angeli.cafe@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="w-[18em] bg-white py-3 shadow-xl rounded-lg">
                <div class="flex gap-3 mx-auto w-fit">
                    <span class="material-symbols-outlined font-semibold text-[3em]">
                        location_on
                    </span>
                    <div class="flex flex-col">
                        <h1 class="font-bold">Visit Us</h1>
                        <p class="text-gray-400">Jalan Angkasa 1 No. 2</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-4 mb-6">
            <div class="w-1/2 h-full">
                <iframe class="w-full border-2"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.4053664088794!2d106.83961836614783!3d-6.1560981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5bff9974157%3A0x460361ce48b502d1!2sAngelica%20Cafe!5e0!3m2!1sen!2sid!4v1702377410615!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div>
                <form id="contactForm" action="{{ route('submit-form') }}" method="POST" class="flex flex-col gap-4 border-2 rounded-xl p-4 h-full">
                    @csrf
                    <div class="flex gap-4 w-full mb-3">
                        <input type="text" name="first_name" placeholder="First Name" class="border-2 h-10 p-3 rounded-lg w-full" required />
                        <input type="text" name="last_name" placeholder="Last Name" class="border-2 h-10 p-3 rounded-lg w-full" required />
                    </div>
                    <div class="flex gap-4 mb-3">
                        <input type="email" name="email" placeholder="Email" class="border-2 h-10 p-3 rounded-lg w-full" required />
                        <input type="text" name="phone" placeholder="Phone" class="border-2 h-10 p-3 rounded-lg w-full" required />
                    </div>
                    <textarea name="message" class="border-2 rounded-lg h-32 p-3" placeholder="Message" required></textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="rounded-lg w-[5em] font-semibold py-1 text-center bg-[#764507] text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- OUR MENU --}}
    {{-- FOOTER --}}
    {{-- @include('layout.footer') --}}
    {{-- FOOTER --}}

    <!-- Display success message -->
    {{-- @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

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
            });
        };
        document.body.appendChild(script);
    </script>

</body>

</html> --}}

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
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    {{-- DisyUI --}}

    <title>Document</title>

</head>

<style>
    .gambar {
        background-size: cover;
    }
</style>

<body data-theme="cupcake">
    {{-- NAVBAR --}}
    @include('layout.navbar')
    {{-- NAVBAR --}}
    <div class="w-full h-[20em] relative z-20 flex flex-col items-center justify-center"
        style="background-image: url({{ url('/img/contactUs.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">Contact Us</h1>
        <p class="text-white text-xl w-[20em] text-center">Please give us a call, or email us
            and we’ll get back to you.</p>
    </div>

    {{-- OUR MENU --}}
    <div class="flex flex-col my-6 justify-between px-[10em]">
        <div class="flex gap-6 mx-auto relative z-20 -top-[50px]">
            <div class="w-[18em] bg-white py-3 shadow-xl rounded-lg">
                <div class="flex gap-3 mx-auto w-fit">
                    <span class="material-symbols-outlined font-semibold text-[3em]">
                        phone_in_talk
                    </span>
                    <div class="flex flex-col">
                        <h1 class="font-bold">Call Us</h1>
                        <p class="text-gray-400">+6281315666669</p>
                    </div>
                </div>
            </div>
            <div class="w-[18em] bg-white py-3 shadow-xl rounded-lg">
                <div class="flex gap-3 mx-auto w-fit">
                    <span class="material-symbols-outlined font-semibold text-[3em]">
                        mail
                    </span>
                    <div class="flex flex-col">
                        <h1 class="font-bold">Email Us</h1>
                        <p class="text-gray-400">angeli.cafe@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="w-[18em] bg-white py-3 shadow-xl rounded-lg">
                <div class="flex gap-3 mx-auto w-fit">
                    <span class="material-symbols-outlined font-semibold text-[3em]">
                        location_on
                    </span>
                    <div class="flex flex-col">
                        <h1 class="font-bold">Visit Us</h1>
                        <p class="text-gray-400">Jalan Angkasa 1 No. 2</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-4 mb-6">
            <div class="w-1/2 h-full">
                <iframe class="w-full border-2"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.4053664088794!2d106.83961836614783!3d-6.1560981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5bff9974157%3A0x460361ce48b502d1!2sAngelica%20Cafe!5e0!3m2!1sen!2sid!4v1702377410615!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div>
                {{-- before --}}
                {{-- <form id="contactForm" action="{{ route('submit-form') }}" method="POST" class="flex flex-col gap-4 border-2 rounded-xl p-4 h-full">
                    @csrf
                    <div class="flex gap-4 w-full mb-3">
                        <div class="w-full">
                            <input type="text" name="first_name" placeholder="First Name" class="border-2 h-10 p-3 rounded-lg w-full" required />
                            @if ($errors->has('first_name'))
                                <p class="text-red-500 text-xs">{{ $errors->first('first_name') }}</p>
                            @endif
                        </div>
                        <div class="w-full">
                            <input type="text" name="last_name" placeholder="Last Name" class="border-2 h-10 p-3 rounded-lg w-full" required />
                            @if ($errors->has('last_name'))
                                <p class="text-red-500 text-xs">{{ $errors->first('last_name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex gap-4 mb-3">
                        <div class="w-full">
                            <input type="email" name="email" placeholder="Email" class="border-2 h-10 p-3 rounded-lg w-full" required />
                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="w-full">
                            <input type="text" name="phone" placeholder="Phone" class="border-2 h-10 p-3 rounded-lg w-full" required />
                            @if ($errors->has('phone'))
                                <p class="text-red-500 text-xs">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="w-full mb-3">
                        <textarea name="message" class="border-2 rounded-lg h-32 p-3 w-full" placeholder="Message" required></textarea>
                        @if ($errors->has('message'))
                            <p class="text-red-500 text-xs">{{ $errors->first('message') }}</p>
                        @endif
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="rounded-lg w-[5em] font-semibold py-1 text-center bg-[#764507] text-white">Submit</button>
                    </div>
                </form> --}}
                {{-- end before --}}
                {{-- new --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST" class="flex flex-col gap-4 border-2 rounded-xl p-4 h-full">
                    @csrf
                    <div class="flex gap-4 w-full mb-3">
                        <input type="text" name="first_name" placeholder="First Name" class="border-2 h-10 p-3 rounded-lg w-full" required />
                        <input type="text" name="last_name" placeholder="Last Name" class="border-2 h-10 p-3 rounded-lg w-full" required />
                    </div>
                    <div class="flex gap-4 mb-3">
                        <input type="email" name="email" placeholder="Email" class="border-2 h-10 p-3 rounded-lg w-full" required />
                        <input type="text" name="phone" placeholder="Phone" class="border-2 h-10 p-3 rounded-lg w-full" required />
                    </div>
                    <textarea name="message" class="border-2 rounded-lg h-32 p-3 w-full" placeholder="Message" required></textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="rounded-lg w-[5em] font-semibold py-1 text-center bg-[#764507] text-white">Submit</button>
                    </div>
                </form>
                {{-- end new --}}
            </div>
        </div>
    </div>

    {{-- OUR MENU --}}
    {{-- FOOTER --}}
    @include('layout.footer')
    {{-- FOOTER --}}

    <!-- Display success message -->
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

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
            });
        };
        document.body.appendChild(script);
    </script>

</body>

</html>
