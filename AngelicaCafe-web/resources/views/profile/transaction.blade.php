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

    {{-- OUR MENU --}}
    <div class="h-full pt-[7em]">
        <div class="flex flex-col border-2 rounded-xl px-6 mx-32 py-4 mb-6">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.293 5.293a1 1 0 011.414 0l.293.293V7a1 1 0 01-2 0V5.586l.293-.293a1 1 0 111.414 1.414L13 7.414l1.293-1.293a1 1 0 111.414 1.414L14.414 9l1.293 1.293a1 1 0 11-1.414 1.414L13 10.414l-1.293 1.293a1 1 0 11-1.414-1.414L11.586 9l-1.293-1.293a1 1 0 010-1.414 1 1 0 011.414 0L13 7.586l1.293-1.293z"/></svg>
                </span>
            </div>
            @endif
            <div class="flex gap-4">
                <a href="/profile">
                    <h1 class="font-semibold text-xl">Personal Profile</h1>
                </a>
                <a href="/profile/address">
                    <h1 class="font-semibold text-xl">Address List</h1>
                </a>
                <a href="/profile/transaction">
                    <h1 class="font-semibold text-xl underline underline-offset-8">Transaction List</h1>
                </a>
            </div>
            <div class="divider"></div>

            {{-- CONTENT --}}
            <div class="flex flex-col gap-3 pr-[4em]">
                @foreach ($order as $orders)
                <div class="w-[100%] h-full flex flex-col border-2 rounded-xl p-3 flex items-center gap-4">
                    <div class="flex w-full justify-between">
                        <div class="flex gap-4">
                            <h1 class="text-gray-400">Order Number : <span class="font-bold text-gray-600">{{$orders->id}}</span></h1>
                            <h1 class="font-bold px-3 rounded-lg
                                @if ($orders->status === 'pending')
                                bg-yellow-400 text-yellow-800
                                @elseif ($orders->status === 'success')
                                bg-green-400 text-green-800
                                @endif">
                                {{ $orders->status }}
                            </h1>
                        </div>
                        <p class="text-gray-400">{{$orders->created_at}}</p>
                    </div>
                    <div class="divider -my-[10px]"></div>
                    <div class="flex w-full justify-between">
                        <div class="flex gap-6 items-center pr-[5em]">
                            <div class="divider divider-horizontal my-auto h-[60%]"></div>
                            <div>
                                <p class="text-gray-400">Total Amount</p>
                                <h1 class="font-bold text-xl">Rp . {{$orders->total_amount}}</h1>
                            </div>
                            {{-- <div style="margin-left: auto;">
                                <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded-lg show-dropdown">Detail</a>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div id="detailDropdown" class="hidden bg-white shadow-md rounded-lg absolute mt-2 w-32">
                        <ul class="py-2">
                            <!-- Isi dropdown -->
                            @foreach ($order as $orders)
                                @foreach ($orders->orderDetails as $orderDetail)
                                    @if ($orderDetail->order_id == $orderDetail->order_id )
                                        <li class="hover:bg-blue-100 transition duration-300 ease-in-out">
                                            <a href="#" class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-gray-700">{{$orderDetail->product->nama_Produk}}</p>
                                                    <p class="text-gray-500">Quantity: {{$orderDetail->quantity}}</p>
                                                </div>
                                                <div class="text-blue-600">
                                                    <span class="mr-2">Rp.</span>{{$orderDetail->quantity * $orderDetail->product->harga}}
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
                @endforeach
            </div>
            
            
            
            {{-- CONTENT --}}
        </div>
    </div>
    {{-- FOOTER --}}
    @include('layout.footer');
    {{-- FOOTER --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Ketika tautan "Detail" diklik
        $('.show-dropdown').on('click', function (e) {
            e.preventDefault();
            var dropdown = $('#detailDropdown');

            // Tampilkan atau sembunyikan dropdown berdasarkan statusnya
            if (dropdown.is(':visible')) {
                dropdown.hide();
            } else {
                dropdown.show();
            }
        });

        // Sembunyikan dropdown saat dokumen diklik di tempat lain
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#detailDropdown, .show-dropdown').length) {
                $('#detailDropdown').hide();
            }
        });
    });
</script> --}}

</body>

</html>
