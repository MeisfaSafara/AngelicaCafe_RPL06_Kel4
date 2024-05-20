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

    {{-- DaisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    {{-- DaisyUI --}}

    <title>Favourite Menu</title>
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
    <div class="w-full h-[20em] flex flex-col justify-center items-center"
        style="background-image: url({{ url('/img/MenuBackground.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">Favourite Menu</h1>
        <p class="text-white text-xl w-[20em] text-center">Explore and save your favourite dishes!</p>
    </div>

    {{-- FAVOURITE MENU --}}
    <div class="flex flex-col justify-center w-full mt-[3em]">
        <div class="flex">
            <div class="flex flex-col justify-center items-center w-full">
                <form action="/search-favourites" method="GET" class="flex justify-center items-center gap-2 mb-4">
                    <input type="text" name="search" id="search-input"
                        class="w-[20vw] px-2 py-1 rounded-lg border-2 border-[#85581F] ">
                    <button class="">
                        <span
                            class="material-symbols-outlined font-bold bg-[#EDDBC7] border-2 border-[#85581F] p-2 rounded-full">
                            search
                        </span>
                    </button>
                </form>
                <ul class="flex flex-wrap items-start justify-center p-5 font-bold pb-4">
                    <li><a href="/menu" class="relative px-3 py-1 m-2 rounded-md shadow-sm sm:py-2 sm:text-base ring ring-transparent group md:px-4 hover:ring hover:ring-opacity-50 focus:ring-opacity-50 hover:ring-blue-600 text-white bg-gray-900 dark:bg-gray-800 dark:text-gray-200">All Menu</a></li>
                    @foreach ($kategoris as $kategori)
                        <li>
                            <a class="relative px-3 py-1 m-2 rounded-md shadow-sm sm:py-2 sm:text-base ring ring-transparent group md:px-4 hover:ring hover:ring-opacity-50 focus:ring-opacity-50 hover:ring-blue-600 text-white bg-gray-900 dark:bg-gray-800 dark:text-gray-200"
                                href="{{ route('menu.index', $kategori->id_kategori) }}">
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
                        <figure>
                            <img class="object-cover" src="{{ asset('storage/img/produk/'.$item->gambar) }}"  alt="Shoes" />
                            <div class="absolute top-[10px] right-[15px] flex gap-2">
                                <h1 class="py-2 text-semibold px-3 bg-white text-gray-400 rounded-xl">
                                    {{ $item->harga }}</h1>
                                <button class="favourite-btn" data-id="{{ $item->id_produk }}">
                                    <span class="material-symbols-outlined text-gray-400">favorite_border</span>
                                </button>
                            </div>
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->nama_Produk }}</h2>
                            <p>{{ $item->deskripsi }}</p>
                            <div class="card-actions justify-end">
                                <a class="btn text-white bg-[#764507]" href="{{route('cart.add',$item->id_produk)}}">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- FAVOURITE ITEMS --}}
        <h2 class="text-3xl font-bold text-center my-6">Your Favourites</h2>
        <div class="w-full flex flex-wrap gap-4 mt-4 justify-center mb-10" id="favourite-items">
            <!-- Dynamically populated favourite items will appear here -->
        </div>
    </div>

    {{-- FOOTER --}}
    @include('layout.footer')
    {{-- FOOTER --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const favouriteButtons = document.querySelectorAll('.favourite-btn');

            favouriteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');
                    // Make an AJAX request to add/remove favourite
                    fetch(`/favourite/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => response.json()).then(data => {
                        if (data.status === 'added') {
                            this.querySelector('span').textContent = 'favorite';
                        } else {
                            this.querySelector('span').textContent = 'favorite_border';
                        }
                        updateFavouriteItems(data.favourites);
                    });
                });
            });

            function updateFavouriteItems(favourites) {
                const favouriteContainer = document.getElementById('favourite-items');
                favouriteContainer.innerHTML = '';
                favourites.forEach(item => {
                    favouriteContainer.innerHTML += `
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                            <div class="card card-compact w-full bg-base-100 shadow-xl">
                                <figure>
                                    <img class="object-cover" src="/storage/img/produk/${item.gambar}" alt="Shoes" />
                                    <div class="absolute top-[10px] right-[15px] flex gap-2">
                                        <h1 class="py-2 text-semibold px-3 bg-white text-gray-400 rounded-xl">${item.harga}</h1>
                                    </div>
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title">${item.nama_Produk}</h2>
                                    <p>${item.deskripsi}</p>
                                    <div class="card-actions justify-end">
                                        <a class="btn text-white bg-[#764507]" href="/cart/add/${item.id_produk}">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                });
            }
        });
    </script>
</body>

</html>