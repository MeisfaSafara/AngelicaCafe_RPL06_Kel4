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
    {{-- @include('layout.navbar') --}}

    <div class="flex bg-[#EDDBC7] h-20 w-full justify-center px-3 fixed z-30 items-center">
        <img class="h-[80%] my-auto" src={{ asset('/img/Logo.png') }} alt="">
    </div>

    {{-- NAVBAR --}}

    {{-- OUR MENU --}}
    <div class="mb-6 px-32 pt-[8em]">
        <a href="/cart">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined font-bold text-[#764507]">
                    arrow_back
                </span>
                <h1 class="font-bold text-xl text-[#764507]">Checkout</h1>
            </div>
        </a>
        <div class="divider"></div>
        <div class="flex gap-4">
            {{-- Shipping Address --}}
            @foreach ($address as $alamat)
            <div class="flex flex-col w-[50%]">
                <h1 class="text-gray-400">Shipping Address</h1>
                <div class="divider my-2"></div>
                {{-- <h1 class="font-bold">{{$alamat->user->name}}<span class="font-regular text-gray-400">(Rumah)</span></h1> --}}
                <h1 class="font-bold">{{$alamat->user->name}}</h1>
                <p class="text-gray-400">{{$alamat->user->phone_number}}</p>
                <p class="text-gray-400">{{ $alamat->street }}, {{ $alamat->city }}, {{ $alamat->state }} {{ $alamat->postal_code }}</p>
                <div class="divider my-2"></div>
                <a href="{{ route('address.edit', $alamat->id) }}" class="btn btn-sm font-bold text-center">Edit address</a>
            </div>
            @endforeach
            {{-- Shipping Address --}}
            <div class="flex flex-col gap-4 w-[50%]">
                <div class="border-2 rounded-xl flex flex-col p-4">
                    <div class="flex justify-between">
                        <h1 class="font-bold">Payment Method</h1>
                        {{-- <h1 class="text-[#4CBB17]">See All</h1> --}}
                    </div>
                    <div class="divider my-2"></div>
                    <div class="flex flex-col gap-2 mb-4">
                        <div class="flex justify-between">
                            <div class="flex gap-2 items-center">
                                <img src={{ asset('/img/bank/BCA.png') }} alt="">
                                <h1 class="font-semibold text-gray-500">BCA</h1>
                            </div>
                            <input type="radio" name="radio-2" class="radio radio-primary" />
                        </div>
                        <div class="flex justify-between">
                            <div class="flex gap-2 items-center">
                                <img src={{ asset('/img/bank/Mandiri.png') }} alt="">
                                <h1 class="font-semibold text-gray-500">Mandiri</h1>
                                <br>
                                
                            </div>
                            <input type="radio" name="radio-2" class="radio radio-primary" />
                        </div>
                        <div class="flex justify-between">
                            <div class="flex gap-2 items-center">
                                <img src={{ asset('/img/bank/BNI.png') }} alt="">
                                <h1 class="font-semibold text-gray-500">BNI</h1>
                            </div>
                            <input type="radio" name="radio-2" class="radio radio-primary" />
                        </div>
                    </div>
                </div>
                <div class="border-2 rounded-xl flex flex-col p-4">
                    {{-- <div class="flex justify-between">
                        <h1 class="font-bold">Order Summary</h1>
                    </div> --}}
                    {{-- <div class="divider my-1"></div> --}}
                    <div class="flex flex-col gap-2 mb-4">
                        {{-- <div class="flex justify-between text-gray-600">
                            <h1>Subtotal</h1>
                            <h1>Rp60.000</h1>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <h1>Shipping</h1>
                            <h1>Free</h1>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <h1>Transaction Fee</h1>
                            <h1>Rp1000</h1>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <h1>Unique Code</h1>
                            <h1>Rp88</h1>
                        </div> --}}
                        {{-- <div class="divider -my-1"></div> --}}
                        <div class="flex justify-between font-bold">
                            <h1>Total</h1>
                            <h1>{{$total}}</h1>
                        </div>

                    </div>
                    <form method="POST" action="{{ route('checkout.order') }}">
                        @csrf
                        <!-- Isi formulir jika diperlukan -->
                        <button type="submit" class="btn bg-[#764507] text-white font-bold py-3 rounded-xl">Konfirmasi sudah bayar</button>
                        <a href="" class="btn bg-red-500 text-white font-bold py-3 rounded-xl">Kembali</a>

                    </form>
                    {{-- <a href="{{route('checkout.order')}}" class="btn bg-[#764507] text-white font-bold py-3 rounded-xl">Pay</a> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- FOOTER --}}
    <div class="w-full py-6 bg-[#EDDBC7] py-6 px-[10em]">
        <p class="text-center text-gray-400">© 2023 Angelica Cafe | All rights reserved</p>
    </div>
    {{-- FOOTER --}}
</body>

</html>
