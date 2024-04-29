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
    <div class="w-full h-[20em] flex flex-col justify-center items-center"
        style="background-image: url({{ url('/img/MenuBackground.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">Menu</h1>
        <p class="text-white text-xl w-[20em] text-center">Explore the tastes, catering
            menus for every palate!</p>

        {{-- <img src={{ asset('/img/MenuBackground.png') }} class="w-full h-full" alt=""> --}}
    </div>

    {{-- OUR MENU --}}

    <div class="flex flex-col justify-center w-full mt-[3em]">
        <form action="" class="flex justify-center items-center gap-2 mb-4">
            <input type="text" class="w-[20vw] px-2 py-1 rounded-lg border-2 border-[#85581F] ">
            <button class=""> <span
                    class="material-symbols-outlined font-bold bg-[#EDDBC7] border-2 border-[#85581F] p-2 rounded-full">
                    search
                </span></button>
        </form>
        <ul class="mx-auto flex gap-4 font-bold mb-[2em]">
            <li><a href="">Nasi Kotak</a></li>
            <li><a href="">Snack Box</a></li>
            <li><a href="">Coffee Break</a></li>
            <li><a href="">Lainnya</a></li>
        </ul>
        <div class="w-full flex flex-wrap gap-3 mt-3 justify-center mb-8">
            @for ($i = 0; $i < 8; $i++)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <div class="card card-compact w-full bg-base-100 shadow-xl">
                        <figure><img class="object-cover" src={{ asset('/img/Menu_makanan.png') }} alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">Nasi Kotak </h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <div class="card-actions justify-end">
                                <button class="btn text-white bg-[#764507]">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <ul class="text-black">
            <li>
                <p>1</p>
            </li>
            <li>
                <p>1</p>
            </li>
            <li>
                <p>1</p>
            </li>
            <li>
                <p>1</p>
            </li>
        </ul>
    </div>

    {{-- OUR MENU --}}

    {{-- FOOTER --}}


    {{-- FOOTER --}}
    </div>
    @include('layout.footer')




</body>

</html>