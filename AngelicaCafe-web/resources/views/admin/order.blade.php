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

    <title>Document</title>
</head>

<body>

    @include('layout.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Order id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$order->id}}
                        </th>
                        <td class="px-6 py-4">
                            @if ($order->status === 'pending')
                            <span class="inline-block px-2 py-1 leading-5 text-yellow-900 bg-yellow-300 rounded-full">
                                {{$order->status}}
                            </span>
                            @elseif ($order->status === 'success')
                            <span class="inline-block px-2 py-1 leading-5 text-green-900 bg-green-300 rounded-full">
                                {{$order->status}}
                            </span>
                            @elseif ($order->status === 'failed')
                            <span class="inline-block px-2 py-1 leading-5 text-red-900 bg-red-300 rounded-full">
                                {{$order->status}}
                            </span>
                            @else
                            <span class="inline-block px-2 py-1 leading-5 text-gray-900 bg-gray-300 rounded-full">
                                {{$order->status}}
                            </span>
                            @endif
                        </td> 
                        <td class="px-6 py-4">
                            {{$order->total_amount}}
                        </td>
                        <td class="px-6 py-4">
                            {{$order->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('admin.orders.detail',$order->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                            {{-- <a href="{{route('admin.orders.detail',$order->id)}}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Edit</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>