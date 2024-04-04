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
    <div class="w-64 h-[20em] flex flex-col items-center justify-center"
        style="background-image: url({{ url('/img/aboutUs.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">About Us</h1>
        <p class="text-white text-xl w-[20em] text-center">Welcome to Angelica Catering, where every bite tells a
            story</p>
    </div>


    {{-- OUR STORY --}}
    <div class="flex my-6 px-[10em]">
        <div class="w-1/2 pr-6">
            <div class="flex gap-2 items-center mb-4">
                <h1 class="font-bold text-lg md:text-xl">Our Story</h1>
                <img class="h-3" src={{ asset('img/garisAboutUs.png') }} alt="">
            </div>
            <img src={{ asset('/img/AngelicaCatering.png') }} alt="" class="mb-4">
            <p class="text-sm md:text-base leading-relaxed mb-4">Angelica Cafe bermula dari impian kami untuk menghadirkan
                cita rasa dan keindahan dalam setiap momen spesial. Kami memulai perjalanan ini dengan tekad kuat untuk
                menjadi penyedia layanan catering terbaik di Indonesia.</p>
            <p class="text-sm md:text-base leading-relaxed mb-4">Kami mengutamakan kualitas tinggi dalam setiap hidangan
                dengan menggunakan bahan-bahan segar dan teknik memasak terbaik. Inovasi dalam menu adalah fokus utama
                kami, yang terus kami kembangkan sesuai dengan tren kuliner dan selera pelanggan.</p>
            <p class="text-sm md:text-base leading-relaxed mb-4">Pelayanan yang prima adalah komitmen kami, yang kami lakukan
                dengan penuh keramahan, responsif, dan profesional dalam setiap interaksi dengan pelanggan. Kami percaya
                pada pembangunan kemitraan yang kuat dengan pelanggan, pemasok, dan mitra lainnya untuk menciptakan
                ekosistem bisnis yang saling menguntungkan.</p>
        </div>
        <div class="w-1/2">
            <div class="grid grid-cols-2 gap-4">
                <img src={{ asset('img/Aboutus7o.png') }} alt="" class="mb-4 w-64 h-48">
                <img src={{ asset('img/Aboutus4.png') }} alt="" class="mb-4 w-64 h-48">
                <img src={{ asset('img/Aboutus3.png') }} alt="" class="mb-4 w-64 h-48">
                <img src={{ asset('img/Aboutus6.png') }} alt="" class="mb-4 w-64 h-48">
                <img src={{ asset('img/Aboutus5.png') }} alt="" class="mb-4 w-64 h-48">
                <img src={{ asset('img/Aboutus2.png') }} alt="" class="mb-4 w-64 h-48">
            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('layout.footer')

</body>

</html>
