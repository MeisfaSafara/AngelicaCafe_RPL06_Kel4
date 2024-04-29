<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head Section -->
    <title>WhatsApp</title>
    <!-- Masukkan tag meta, link ke stylesheet, dan skrip lainnya yang dibutuhkan -->
</head>
<body>

    <!-- WhatsApp Floating Button -->
    @if(Request::is('about'))
    <div style="position: fixed; bottom: 20px; left: 20px; z-index: 999;">
        <a href="https://api.whatsapp.com/send?phone=6282121716511&text=Halo%20👋%0AAda%20yang%20bisa%20kami%20bantu?" target="_blank">
            <!-- Menggunakan Blade directive untuk URL gambar -->
            <img src="{{ asset('/img/AngelicaCatering.png') }}" alt="WhatsApp" width="50">
        </a>
    </div>
    @endif

    <!-- Content Section -->
    @yield('content')

    <!-- Footer Section -->
    @yield('footer')

</body>
</html>
