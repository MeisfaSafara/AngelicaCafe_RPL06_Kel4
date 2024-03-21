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
        style="background-image: url('/img/aboutUs.png'); background-size: cover;">
        <h1 class="text-4xl font-bold text-white mb-4">About Us</h1>
        <p class="text-white text-xl w-[20em] text-center">Welcome to angelica catering, where
            every bite tells a story</p>
    </div>


    {{-- OUR MENU --}}

    <div class="flex my-6 justify-between px-[10em]">
        <div class="w-1/2">
            <div class="flex gap-2 items-center my-4">
                <h1 class="font-bold">Our Story</h1>
            </div>
            <p class="w-[60%]">Story Angelica Cafe</p>
        </div>
        <div class="flex gap-2">
            <div class="flex flex-col justify-between   ">

            </div>
        </div>
    </div>

    {{-- OUR MENU --}}

    {{-- FOOTER --}}


    {{-- FOOTER --}}
    </div>
    @include('layout.footer')




</body>

</html>