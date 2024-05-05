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

<body>

    @include('layout.sidebar')
    <div class="p-4 sm:ml-64 flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <div>
                <a href="/admin/category" class="flex items-center">
                    <svg fill="#008bf5" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" stroke="#008bf5" width="16" height="16" class="mr-1">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M222.927 580.115l301.354 328.512c24.354 28.708 20.825 71.724-7.883 96.078s-71.724 20.825-96.078-7.883L19.576 559.963a67.846 67.846 0 01-13.784-20.022 68.03 68.03 0 01-5.977-29.488l.001-.063a68.343 68.343 0 017.265-29.134 68.28 68.28 0 011.384-2.6 67.59 67.59 0 0110.102-13.687L429.966 21.113c25.592-27.611 68.721-29.247 96.331-3.656s29.247 68.721 3.656 96.331L224.088 443.784h730.46c37.647 0 68.166 30.519 68.166 68.166s-30.519 68.166-68.166 68.166H222.927z"></path>
                        </g>
                    </svg>
                    Back
                </a>    
            </div>            
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Terjadi kesalahan validasi!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h1 class="text-2xl font-semibold mb-4">Tambah Kategori</h1>
            <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="mb-4">
                    <label for="nama_kategori" class="block text-gray-600">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori"  class="w-full border rounded px-3 py-2">
                </div>

                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2 hover:bg-blue-600">Kirim</button>
            </form>
        </div>
    </div>

</body>

</html>