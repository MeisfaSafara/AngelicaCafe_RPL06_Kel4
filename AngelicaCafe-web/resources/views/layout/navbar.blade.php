<div class="flex bg-[#EDDBC7] h-20 w-full justify-between px-3 fixed z-30 items-center">
    <img class="h-[80%] my-auto" src={{ asset('/img/Logo.png') }} alt="">
    <ul class="flex gap-3">
        <li><a href="/" class="font-bold text-[#85581F]">Home</a></li>
        <li><a href="/menu" class="font-bold text-[#85581F]">Menu</a></li>
        <li><a href="/about" class="font-bold text-[#85581F]">About Us</a></li>
        <li><a href="/contact" class="font-bold text-[#85581F]">Contact</a></li>
    </ul>

    <div class="flex items-center gap-3">
        @if (Auth::check())
            <a href="/profile">
                <img src="{{ asset('storage/'.Auth::user()->image) }}" alt="Profile Picture" width="50" height="50" style="border-radius: 50%;">
            </a>
        @else
            <!-- Tampilkan gambar lain jika tidak ada pengguna yang login -->
            <a href="/login" class="font-bold text-[#85581F]">Login</a>
        @endif
        <a href="/cart">
            <span class="material-symbols-outlined">
                shopping_cart
            </span>
        </a>
    </div>
</div>