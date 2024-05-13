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

    <div class="w-full bg-gray-600 h-[20em]">
        <div class="carousel w-full h-full">
            <div id="slide2" class="carousel-item relative w-full object-cover">
                <img src={{ asset('img/MenuBackground.png') }} class="w-full object-cover" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide1" class="btn btn-circle">❮</a>
                    <a href="#slide3" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <img src={{ asset('/img/aboutUs.png') }} class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle">❮</a>
                    <a href="#slide4" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide4" class="carousel-item relative w-full">
                <img src={{ asset('/img/contactUs.png') }} class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide3" class="btn btn-circle">❮</a>
                    <a href="#slide1" class="btn btn-circle">❯</a>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 pb-6">

        {{-- CUstomer Says --}}
        <div>
            <h1 class="text-[#85581F] text-center py-6 font-bold text-3xl">What Our Customer Says?</h1>
            <div class="px-6 flex gap-4 justify-center">
                <div class="carousel bg-transparent carousel-center w-[80%] p-4 space-x-4 bg-neutral rounded-box">
                    <div class="carousel-item flex justify-center bg-white w-fit gap-4">
                        <div class="w-[70%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                            <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                            <p class="text-semibold text-center">Sangat terkesan dengan layanan Angelica Cafe! Pemesanan catering makanan untuk acara ulang tahun anak saya berjalan begitu lancar. Menu yang disajikan sangat lezat dan presentasinya memukau.
                            </p>
                            <span class="w-7 bg-gray-400 h-1"></span>
                            <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                            <p class="text-lg">Abi</p>
                        </div>
                        <div class="w-[70%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                            <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                            <p class="text-semibold text-center">Pertama kali memesan catering online dan Angelica Cafe membuat pengalaman ini begitu istimewa! Menu sangat beragam, dan saya mendapatkan layanan terbaik dalam memilih paket catering sesuai dengan acara keluaraga kami.
                            </p>
                            <span class="w-7 bg-gray-400 h-1"></span>
                            <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                            <p class="text-lg">Viena</p>
                        </div>
                        <div class="w-[70%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                            <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                            <p class="text-semibold text-center">Pemesanan catering di Angelica Cafe adalah keputusan terbaik yang saya buat untuk acara kantor kami. Menu yang disediakan sangat enak, dan website angelica cafe sangat mudah dijalani. Angelica Cafe membantu kami merancang paket catering yang sesuai dengan anggaran dan kebutuhan acara., Thank you angelica cafe!
                            </p>
                            <span class="w-7 bg-gray-400 h-1"></span>
                            <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                            <p class="text-lg">Kyandra</p>
                        </div>
                    </div>

                    <div class="carousel-item flex justify-center bg-white w-fit gap-4">
                        <div class="w-[70%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                            <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                            <p class="text-semibold text-center">Angelica Cafe memberikan lebih dari yang dijanjikan! Pilihan menu yang luar biasa, makanan yang lezat, dan staf yang ramah. Pemesanan online sangat mudah dan transparan. Harganya sangat sepadan dengan kualitas yang kami terima. Sangat merekomendasikan!
                            </p>
                            <span class="w-7 bg-gray-400 h-1"></span>
                            <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                            <p class="text-lg">Bagus</p>
                        </div>
                        <div class="w-[70%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                            <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                            <p class="text-semibold text-center">Angelica Cafe memberikan pengalaman catering yang tak terlupakan. Pemesanan online yang mudah, menu yang luar biasa, dan pelayanan pelanggan yang ramah. Hidangan mereka menciptakan kesan yang mendalam pada acara kami. Saya sangat merekomendasikan Angelica Cafe kepada semua orang yang mencari pesan catering online!!
                            </p>
                            <span class="w-7 bg-gray-400 h-1"></span>
                            <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                            <p class="text-lg">Meisfa</p>
                        </div>
                        <div class="w-[70%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                            <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                            <p class="text-semibold text-center">Angelica Cafe memberikan pengalaman catering yang istimewa untuk acara keluarga kami. Menu yang lezat dan variasi pilihan yang banyak. Pelayanan yang ramah. Terima kasih, Angelica Cafe, sudah membuat acara kami berjalan lancar!
                            </p>
                            <span class="w-7 bg-gray-400 h-1"></span>
                            <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                            <p class="text-lg">Arkan</p>
                        </div>
                    </div>

                   

                </div>
                {{-- <div
                    class="w-[20%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                    <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                    <p class="text-semibold text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
                        itaque iusto quas maiores atque
                        necessitatibus tempora repellat voluptas nisi ex!
                    </p>
                    <span class="w-7 bg-gray-400 h-1"></span>
                    <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                    <p class="text-lg">Abi</p>
                </div>
                <div
                    class="w-[20%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                    <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                    <p class="text-semibold text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
                        itaque iusto quas maiores atque
                        necessitatibus tempora repellat voluptas nisi ex!
                    </p>
                    <span class="w-7 bg-gray-400 h-1"></span>
                    <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                    <p class="text-lg">Abi</p>
                </div>
                <div
                    class="w-[20%] flex flex-col justify-center gap-3 border-2 rounded-xl border-gray-400 items-center py-4 shadow-xl">
                    <h1 class="font-extrabold text-6xl text-red-600">"</h1>
                    <p class="text-semibold text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
                        itaque iusto quas maiores atque
                        necessitatibus tempora repellat voluptas nisi ex!
                    </p>
                    <span class="w-7 bg-gray-400 h-1"></span>
                    <div class="bg-gray-400 h-10 w-10 rounded-full"></div>
                    <p class="text-lg">Abi</p>
                </div> --}}
            </div>


        </div>





    </div>
    {{-- CUstomer Says --}}

    {{-- OUR MENU --}}

    <div class="flex flex-col justify-center w-full">
        <h1 class="text-[#85581F] text-center py-6 font-bold text-3xl">Our Menu</h1>
        {{-- <ul class="mx-auto flex gap-4 font-bold">
            <li><a href="">Nasi Kotak</a></li>
            <li><a href="">Snack Box</a></li>
            <li><a href="">Coffee Break</a></li>
            <li><a href="">Lainnya</a></li>
        </ul> --}}
        <div class="w-full flex flex-wrap gap-3 mt-3 justify-center mb-8">
            @foreach ($produks as $produk)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <div class="card card-compact w-full bg-base-100 shadow-xl">
                        <figure>
                            <div class="absolute top-[10px] right-[15px]">
                                <h1 class="py-2 text-semibold px-3 bg-white text-gray-400 rounded-xl">Rp.30.000</h1>
                            </div>
                            <img class="object-cover" src="{{ asset('storage/img/produk/'.$produk->gambar) }}" alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title font-bold">{{$produk->nama_Produk}}</h2>
                            <p>{{$produk->deskripsi}}</p>
                            <div class="card-actions justify-start">
                                <a href="{{route('cart.add',$produk->id_produk)}}" class="py-2 px-3 rounded-xl font-bold text-white bg-[#764507]">Add to
                                    cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h1 class="font-extrabold mb-24 text-center text-lg-center"><a href="">See All Menu</a></h1>
    </div>

    {{-- OUR MENU --}}

    {{-- FOOTER --}}


    {{-- FOOTER --}}
    </div>
    @include('layout.footer')
    <!-- WhatsApp Floating Button Script -->
    <script>
        var script = document.createElement('script');
        script.src = 'https://sleekflow.io/whatsapp-button.js';
        script.async = true;
        script.onload = function () {
            whatsappButton({
                buttonName: 'Hubungi Kami',
                buttonIconSize: '22',
                buttonMargin: 'true',
                brandName: 'Angelica Cafe',
                brandSubtitleText: 'All rights reserved',
                buttonSize: 'medium',
                buttonPosition: 'right',
                callToAction: 'Mulai Chat',
                phoneNumber: '6281315666669',
                welcomeMessage: 'Halo 👋\nAda yang bisa kami bantu?',
                prefillMessage: 'Tentu, Saya akan memesanya',
                containerId: 'whatsappButtonContainer', // Specify the container ID here
            });
        };
        document.body.appendChild(script);
    </script>





</body>

</html>