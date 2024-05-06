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

  <div class="container mx-auto px-4 sm:ml-64 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">

      <div>
        <a href="/admin/produks" class="flex items-center">
          <svg fill="#008bf5" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" stroke="#008bf5" width="16" height="16" class="mr-1">
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

      <h1 class="text-2xl font-semibold mb-4">Tambah Produk</h1>

      <form action="{{ route('admin.produks.store') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf

        <div class="mb-4">
          <label for="nama_Produk" class="block text-gray-600">Nama produk</label>
          <input type="text" name="nama_Produk" id="nama_Produk" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
          <label for="deskripsi" class="block text-gray-600">Deskripsi</label>
          <input type="text" name="deskripsi" id="deskripsi" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
          <label for="stok" class="block text-gray-600">Stok</label>
          <input type="number" name="stok" id="stok" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
          <label for="harga" class="block text-gray-600">Harga</label>
          <input type="number" name="harga" id="harga" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
          <label for="gambar" class="block text-gray-600">Gambar</label>
          <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
          <label for="id_kategori" class="block text-gray-600">Kategori</label>
          <select name="id_kategori" id="id_kategori" class="w-full border rounded px-3 py-2">
            @foreach ($kategori as $item)
              <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2 hover:bg-blue-600">Kirim</button>
      </form>
    </div>
  </div>

</body>
