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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    {{-- Swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- Swipper --}}

    <title>Document</title>

</head>


<style>
    .swiper {
        width: 600px;
        height: 300px;
    }
</style>

<body data-theme="cupcake">
    {{-- NAVBAR --}}
    @include('layout.navbar')
    {{-- NAVBAR --}}

    <div class="min-h-screen pt-[20vh] px-[7em]">
        <div class="bg-white shadow-xl rounded-xl flex flex-col gap-3 p-4">
            <h1 class="text-xl font-semibold mb-4">ORDER ID : #1</h1>
            <h2 class="text-lg font-semibold mb-2">Detail Pembelian</h2>
            <div class="flex flex-col">
                <h3 class="text-sm font-bold">Nama</h3>
                <p class="text-gray-700">Rama</p>
            </div>
            <div class="flex flex-col">
                <h3 class="text-sm font-bold">Email</h3>
                <p class="text-gray-700">rama@gmail.com</p>
            </div>
            <div class="flex flex-col">
                <h3 class="text-sm font-bold">Phone Number</h3>
                <p class="text-gray-700">1234567890</p>
            </div>
            <div class="flex flex-col">
                <h3 class="text-sm font-bold">Address</h3>
                <p class="text-gray-700">123 Main St, Springfield, IL 62701</p>
            </div>
            <div class="flex flex-col">
                <h3 class="text-sm font-bold">Status</h3>
                <p class="text-green-500 font-semibold">Sudah Sampai</p>
            </div>
        </div>


        <div class="bg-white my-4 flex justify-between rounded-xl shadow-xl gap-4 p-4 mx-8">
            <div class="h-28 w-[25%] ">
                <h1 class="text-center font-bold">Image</h1>
                <div class="h-full flex justify-center">
                    <img src={{ asset('/img/masakan1.png') }} class="object-cover size-16" alt="enak">
                </div>
            </div>
            <div class="h-28 w-[25%]">
                <h1 class="text-center font-bold">Nama Produk</h1>
                <div class="h-full flex justify-center">
                    <p class="text-center mt-6">Nasi Kotak</p>
                </div>
            </div>
            <div class="h-28 w-[25%]">
                <h1 class="text-center font-bold">Price</h1>
                <div class="h-full flex justify-center">
                    <p class="text-center mt-6">15.000</p>
                </div>
            </div>
            <div class="h-28 w-[25%]">
                <h1 class="text-center font-bold">Quantity</h1>
                <div class="h-full flex justify-center">
                    <p class="text-center mt-6">1</p>
                </div>
            </div>

        </div>
    </div>
    @include('layout.footer')




</body>

</html>
