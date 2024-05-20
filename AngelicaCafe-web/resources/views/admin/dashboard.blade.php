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

    {{-- DaisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    {{-- DaisyUI --}}

    <title>Document</title>
</head>

<body>

    @include('layout.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="flex-grow p-2">
            <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <li class="bg-gray-100 rounded-lg shadow-md p-4">
                    <span class="block text-lg font-semibold text-gray-800 mb-2">Total Sales Today</span>
                    <span class="text-2xl font-bold text-blue-600">Rp{{ number_format($totalSalesToday, 2) }}</span>
                </li>
                <li class="bg-gray-100 rounded-lg shadow-md p-4">
                    <span class="block text-lg font-semibold text-gray-800 mb-2">Total Orders Today</span>
                    <span class="text-2xl font-bold text-blue-600">{{ $totalOrdersToday }}</span>
                </li>
            </ul>
        </div>
    </div>
    
</body>

</html>
