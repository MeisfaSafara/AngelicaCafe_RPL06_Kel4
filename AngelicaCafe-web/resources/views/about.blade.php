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

    <!-- Add these links to your HTML file -->

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
    <div class="w-full h-[20em] flex flex-col items-center justify-center"
        style="background-image: url({{ url('/img/aboutUs.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">About Us</h1>
        <p class="text-white text-xl w-[20em] text-center">Welcome to angelica catering, where
            every bite tells a story</p>
    </div>


    {{-- OUR MENU --}}

    <div class="flex my-6 justify-between px-[10em]">
        <div class="w-1/2">
            <div class="flex gap-2 items-center my-4">
                <h1 class="font-bold">Our Story</h1>
                <img class="h-3" src={{ asset('img/garisAboutUs.png') }} alt="">
            </div>
            <img src={{ asset('/img/AngelicaCatering.png') }} alt="" class="my-4">
                <p class="w-[100%] text-sm md:text-base">Angelica Cafe bermula dari impian kami untuk menghadirkan cita rasa dan keindahan dalam setiap momen spesial. Kami memulai perjalanan ini dengan tekad kuat untuk menjadi penyedia layanan catering terbaik di Indonesia.</p>
                <p class="w-[100%] text-sm md:text-base">Kami mengutamakan kualitas tinggi dalam setiap hidangan dengan menggunakan bahan-bahan segar dan teknik memasak terbaik. Inovasi dalam menu adalah fokus utama kami, yang terus kami kembangkan sesuai dengan tren kuliner dan selera pelanggan.</p>
                <p class="w-[100%] text-sm md:text-base">Pelayanan yang prima adalah komitmen kami, yang kami lakukan dengan penuh keramahan, responsif, dan profesional dalam setiap interaksi dengan pelanggan. Kami percaya pada pembangunan kemitraan yang kuat dengan pelanggan, pemasok, dan mitra lainnya untuk menciptakan ekosistem bisnis yang saling menguntungkan.</p>
        </div>
        <div class="flex gap-2">
            <img src={{ asset('img/koki.png') }} alt="">
        </div>
    </div>

    {{-- OUR MENU --}}

    {{-- FOOTER --}}


    {{-- FOOTER --}}
    </div>
    @include('layout.footer')




</body>

</html>