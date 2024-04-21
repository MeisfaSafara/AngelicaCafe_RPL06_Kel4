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
    <div class="p-4 sm:ml-64">
        <div>
            <a href="/admin/orders" class="flex items-center">
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
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h1 class="text-xl text-red font-semibold mb-4">ORDER ID : #{{$order->id}} </h1>
            <h2 class="text-xl font-semibold mb-4">Detail Pembeli</h2>
            <div class="mb-4">
                <div class="text-gray-600 dark:text-gray-400">Nama</div>
                <div class="text-gray-900 dark:text-white">{{$users->user->name}}</div>
            </div>
            <div class="mb-4">
                <div class="text-gray-600 dark:text-gray-400">Email</div>
                <div class="text-gray-900 dark:text-white">{{$users->user->email}}</div>
            </div>
            <div class="mb-4">
                <div class="text-gray-600 dark:text-gray-400">Phone Number</div>
                <div class="text-gray-900 dark:text-white">{{$users->user->phone_number}}</div>
            </div>
            <div class="mb-4">
                <div class="text-gray-600 dark:text-gray-400">Address</div>
                <div class="text-gray-900 dark:text-white">{{$users->street}}, {{$users->city}}, {{$users->state}} {{$users->postal_code}}</div>
            </div>
            <div class="mb-4">
                <div class="text-gray-600 dark:text-gray-400">Status</div>
                @if ($order->status === 'pending')
                <div class="text-yellow-500 dark:text-yellow-300">{{$order->status}}</div>
                @elseif ($order->status === 'success')
                <div class="text-green-500 dark:text-green-300">{{$order->status}}</div>
                @elseif ($order->status === 'failed')
                <div class="text-red-500 dark:text-red-300">{{$order->status}}</div>
                @else
                <div class="text-gray-900 dark:text-white">{{$order->status}}</div>
                @endif
            </div>        
        </div>    
        <div class="p-4">
            <form action="{{route('admin.orders.update.status',$order->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="flex items-center space-x-4">
                    <select name="status" id="status" class="border border-gray-300 rounded-lg px-3 py-2">
                        <option value="success">success</option>
                        <option value="pending">pending</option>
                        <option value="failed">failed</option>
                    </select>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-4 py-2">Ubah Status</button>
                </div>
            </form>
        </div>    
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailOrder as $item)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-20 h-20" src="{{ asset('storage/img/produk/'.$item->product->gambar) }}" alt="Jese image">
                        </th>
                        <td class="px-6 py-4">
                            {{$item->product->nama_Produk}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->product->harga}}
                        </td>
                        <td class="px-6 py-4">
                            x {{$item->quantity}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>