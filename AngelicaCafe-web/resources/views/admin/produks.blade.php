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

<<body>

@include('layout.sidebar')

<div class="container mx-auto px-4 sm:ml-64">
  <div class="flex justify-between mb-4">
    <a href="{{ route('admin.produks.create') }}" class="btn btn-primary">Tambah Produk</a>
  </div>
  <div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead>
        <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <th scope="col" class="table-header">Image</th>
          <th scope="col" class="table-header">Nama Produk</th>
          <th scope="col" class="table-header">Stok</th>
          <th scope="col" class="table-header">Harga</th>
          <th scope="col" class="table-header">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produks as $produk)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="table-data">
              <img class="w-20 h-20" src="{{ asset('storage/img/produk/'.$produk->gambar) }}" alt="Jese image">
            </td>
            <td class="table-data">
              {{$produk->nama_Produk}}
            </td>
            <td class="table-data">
              {{$produk->stok}}
            </td>
            <td class="table-data">
              {{$produk->harga}}
            </td>
            <td class="table-data flex items-center">
              <a href="{{ route('admin.produks.update', $produk->id_produk) }}" class="text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
              <form action="{{ route('admin.produks.delete', $produk->id_produk) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

</body>
