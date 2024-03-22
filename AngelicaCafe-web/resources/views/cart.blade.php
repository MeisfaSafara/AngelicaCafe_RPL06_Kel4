<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.3/axios.min.js" integrity="sha512-JWQFV6OCC2o2x8x46YrEeFEQtzoNV++r9im8O8stv91YwHNykzIS2TbvAlFdeH0GVlpnyd79W0ZGmffcRi++Bw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- DisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    {{-- DisyUI --}}

    <!-- Add these links to your HTML file -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Document</title>
</head>

<style>
    .gambar {
        /* background-image: url({{ url('/img/MenuBackground.png') }}); */
        background-size: cover;
    }
</style>

<body data-theme="cupcake" x-data="cart()" x-init="initCart()">
    {{-- NAVBAR --}}
    {{-- @include('layout.navbar') --}}

    <div class="flex bg-[#EDDBC7] h-20 w-full justify-center px-3 fixed z-30 items-center">
        <img class="h-[80%] my-auto" src="" alt="">
    </div>

    {{-- NAVBAR --}}

    {{-- OUR MENU --}}
    <div class="h-screen px-32 pt-[8em]">
        <a href="/menu" class="flex items-center gap-2 ">
            <span class="material-symbols-outlined font-bold text-[#764507]">
                arrow_back
            </span>
            <h1 class="font-bold text-xl text-[#764507]">Your Cart</h1>
        </a>
        <div class="divider"></div>
        <div class="flex">
            <div class="flex flex-col w-[70%] justify-between gap-4">
                <template x-for="data,index in dataCart" :key="index">
                    <div class="flex w-full gap-6 justify-between items-center">
                        <div class="flex gap-3 items-center">
                            <img class="h-32 w-32" :src="" alt="">
                            <h1 class="font-bold text-xl" x-text="data.name"></h1>
                        </div>
                        <div class="flex items-center gap-2">
                            <button
                                class="w-5 h-5 flex items-center justify-center border-2 rounded-sm font-bold" x-on:click="decrementCart(data.id_produk)">-</button>
                            <h1 x-text="data.quantity"></h1>
                            <button
                                class="w-5 h-5 flex items-center justify-center border-black border-2 rounded-sm font-bold" x-on:click="incrementCart(data.id_produk)">+
                            </button>
                        </div>
                        <p class="text-gray-400" x-text="data.price"></p>
                        <button class="material-symbols-outlined mr-8" x-on:click="deleteCart(data.id_produk)">
                            close
                        </button>
                    </div>
                </template>
            </div>
            <div class="border-2 rounded-xl flex flex-col p-4 w-[30%]">
                <h1 class="font-bold">Order Sumary</h1>
                <div class="divider -my-[0.5px]"></div>
                <div class="text-gray-400 flex justify-between">
                    <h1>Subtotal</h1>
                    <h1 x-text="` Rp.`+subTotal.toLocaleString()"></h1>
                </div>
                <div class="divider -my-[0.5px]"></div>
                <div class="font-semibold flex justify-between mb-3">
                    <h1>Total</h1>
                    <h1 x-text="` Rp.`+subTotal.toLocaleString()"></h1>
                </div>
                <button x-on:click="updateChart" class="btn bg-[#764507] text-white font-bold py-3 rounded-xl">Checkout</button>
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
