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
        <ul class="flex flex-wrap items-start justify-center p-5 font-bold pb-4">
        <li><a href="/menu" class="relative px-3 py-1 m-2 rounded-md shadow-sm sm:py-2 sm:text-base ring ring-transparent group md:px-4 hover:ring hover:ring-opacity-50 focus:ring-opacity-50 hover:ring-blue-600 text-white bg-gray-900 dark:bg-gray-800 dark:text-gray-200">All Menu</a></li>
            @foreach($kategoris as $kategori)
            <li>
                <a class="relative px-3 py-1 m-2 rounded-md shadow-sm sm:py-2 sm:text-base ring ring-transparent group md:px-4 hover:ring hover:ring-opacity-50 focus:ring-opacity-50 hover:ring-blue-600 text-white bg-gray-900 dark:bg-gray-800 dark:text-gray-200" href="{{ route('menu.index', $kategori->id_kategori) }}">
                    {{ $kategori->nama_kategori }}
                </a>
            </li>
            @endforeach
        </ul>

        <div class="w-full flex flex-wrap gap-3 mt-3 justify-center mb-8">
            @foreach ($produk as $item)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <div class="card card-compact w-full bg-base-100 shadow-xl">
                        <figure><img class="object-cover" src="{{ asset('storage/img/produk/'.$item->gambar) }}"  alt="Shoes" />
                            <div class="absolute top-[10px] right-[15px]">
                                <h1 class="py-2 text-semibold px-3 bg-white text-gray-400 rounded-xl">{{$item->harga}}</h1>
                            </div>
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{$item->nama_Produk}}</h2>
                            <p>{{$item->deskripsi}}</p>
                            <div class="card-actions justify-end">
                                <a class="btn text-white bg-[#764507]" href="">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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