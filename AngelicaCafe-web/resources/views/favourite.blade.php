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

<body data-theme="cupcake">
    {{-- NAVBAR --}}
    @include('layout.navbar')
    {{-- NAVBAR --}}
    <div class="w-full h-[20em] flex flex-col justify-center items-center"
        style="background-image: url({{ url('/img/MenuBackground.png') }}); background-size: cover">
        <h1 class="text-4xl font-bold text-white mb-4">Favourite</h1>
        <p class="text-white text-xl w-[20em] text-center">Find all of your liked menu here!</p>

        {{-- <img src={{ asset('/img/MenuBackground.png') }} class="w-full h-full" alt=""> --}}
    </div>

    {{-- OUR MENU --}}
    <div class="flex flex-col justify-center w-full mt-[3em]">
        <div class="w-full flex flex-wrap gap-4 mt-4 justify-center mb-10">
            @foreach ($produk as $item)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <div class="card card-compact w-full bg-base-100 shadow-xl">
                        <figure class="relative w-full h-48">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/img/produk/'.$item->gambar) }}" alt="Product Image" />
                            <div class="absolute top-[10px] right-[15px]">
                                <h1 class="py-2 text-semibold px-3 bg-white text-gray-400 rounded-xl">{{ $item->harga }}</h1>
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
    {{-- OUR MENU --}}

    {{-- FOOTER --}}
    @include('layout.footer')
    {{-- FOOTER --}}
</body>
</html>
