<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>
<style>
    .gambar {
        background-size: cover;
    }
</style>
<body data-theme="cupcake">
    @include('layout.navbar')
    <div class="w-full h-[20em] flex flex-col justify-center items-center" style="background-image: url({{ url('/img/MenuBackground.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">Menu</h1>
        <p class="text-white text-xl w-[20em] text-center">Explore the tastes, catering menus for every palate!</p>
    </div>

    <div class="flex flex-col justify-center w-full mt-[3em]">
        <div class="flex">
            <div class="bg-[#D1BAA4] text-[#3E2E27] w-[14%] top-[56%] px-4 pt-2 rounded-xl right-[73%] absolute">
                <h1 class="font-semibold text-center text-xl">Filter</h1>
                <form action="/filter" class="my-1" method="GET">
                    <div class="flex flex-col justify-between">
                        <div class="flex gap-2">
                            <input type="checkbox" name="filters[]" class="checkbox border-[#3E2E27] border-2" value="cheap">
                            <p> < 6000 </p>
                        </div>
                        <div class="flex gap-2">
                            <input type="checkbox" name="filters[]" class="checkbox border-[#3E2E27] border-2" value="medium">
                            <p>6000 > 10000</p>
                        </div>
                        <div class="flex gap-2">
                            <input type="checkbox" name="filters[]" class="checkbox border-[#3E2E27] border-2" value="expensive">
                            <p>> 10000</p>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="py-2 px-2 rounded font-bold text-white mt-3 cursor-pointer bg-[#B08968]">Terapkan</button>
                    </div>
                </form>
            </div>

            <div class="flex flex-col justify-center items-center w-full">
                <form action="/search-input" method="GET" class="flex justify-center items-center gap-2 mb-4">
                    <input type="text" name="search" id="search-input" class="w-[20vw] px-2 py-1 rounded-lg border-2 border-[#85581F] ">
                    <button class="">
                        <span class="material-symbols-outlined font-bold bg-[#EDDBC7] border-2 border-[#85581F] p-2 rounded-full">search</span>
                    </button>
                </form>
                <ul class="flex flex-wrap items-start justify-center p-5 font-bold pb-4">
                    <li><a href="/menu" class="relative px-3 py-1 m-2 rounded-md shadow-sm sm:py-2 sm:text-base ring ring-transparent group md:px-4 hover:ring hover:ring-opacity-50 focus:ring-opacity-50 hover:ring-blue-600 text-white bg-gray-900 dark:bg-gray-800 dark:text-gray-200">All Menu</a></li>
                    @foreach ($kategoris as $kategori)
                        <li>
                            <a class="relative px-3 py-1 m-2 rounded-md shadow-sm sm:py-2 sm:text-base ring ring-transparent group md:px-4 hover:ring hover:ring-opacity-50 focus:ring-opacity-50 hover:ring-blue-600 text-white bg-gray-900 dark:bg-gray-800 dark:text-gray-200" href="{{ route('menu.index', $kategori->id_kategori) }}">
                                {{ $kategori->nama_kategori }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="w-full flex flex-wrap gap-4 mt-4 justify-center mb-10">
            @foreach ($produk as $item)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <div class="card card-compact w-full bg-base-100 shadow-xl">
                        <figure class="h-48 w-full">
                            <img class="object-cover h-full w-full" src="{{ asset('storage/img/produk/'.$item->gambar) }}" alt="Shoes" />
                            <div class="absolute top-[10px] right-[15px]">
                                <h1 class="py-2 text-semibold px-3 bg-white text-gray-400 rounded-xl">
                                    {{ $item->harga }}
                                </h1>
                            </div>
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->nama_Produk }}</h2>
                            <p>{{ $item->deskripsi }}</p>
                            <div class="card-actions justify-between">
                                <form action="{{ in_array($item->id_produk, $favouriteProductIds) ? route('favourites.remove') : route('favourites.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $item->id_produk }}">
                                    <button type="submit" class="btn-love">
                                        <svg class="w-6 h-6 {{ in_array($item->id_produk, $favouriteProductIds) ? 'text-red-500' : 'text-gray-500' }}" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    </button>
                                </form>
                                <a class="btn text-white bg-[#764507]" href="{{ route('cart.add', $item->id_produk) }}">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('layout.footer')
</body>
</html>
