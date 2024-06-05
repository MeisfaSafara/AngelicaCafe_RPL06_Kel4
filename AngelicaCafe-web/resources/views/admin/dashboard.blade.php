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

    <title>Admin Dashboard</title>
</head>

<body>

    @include('layout.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="flex flex-col gap-6">
            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <li class="bg-gray-100 rounded-lg shadow-md p-6">
                    <span class="block text-lg font-semibold text-gray-800 mb-2">Total Sales Today</span>
                    <span class="text-2xl font-bold text-blue-600">Rp{{ number_format($totalSalesToday, 2) }}</span>
                </li>
                <li class="bg-gray-100 rounded-lg shadow-md p-6">
                    <span class="block text-lg font-semibold text-gray-800 mb-2">Total Orders Today</span>
                    <span class="text-2xl font-bold text-blue-600">{{ $totalOrdersToday }}</span>
                </li>
            </ul>

            <div class="bg-gray-100 rounded-lg shadow-md p-6">
                <canvas id="salesChart"></canvas>
            </div>
            <div id="chart-data" data-chart="{{ $chartData }}" class="hidden"></div>

            <div class="bg-gray-100 rounded-lg shadow-md p-6">
                <form id="filterForm" method="GET" action="{{ route('admin.dashboard') }}">
                    <label for="month" class="block text-lg font-semibold text-gray-800 mb-2">Popular Products</label>
                    <div class="relative">
                        <select id="month" name="month" class="form-select block w-full mt-1 p-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500" onchange="document.getElementById('filterForm').submit();">
                            @foreach ($months as $month)
                                <option value="{{ $month }}" {{ $month == $selectedMonth ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $month, 10)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($popularProducts as $product)
                <div class="bg-gray-100 rounded-lg shadow-md p-6 relative">
                    <div class="absolute top-0 left-0 bg-red-500 text-gray-100 text-lg font-bold px-2 py-1 rounded-br-lg">
                        #{{ $loop->iteration }}
                    </div>
                    <img src="{{ Storage::url('public/img/produk/'.$product->product->gambar) }}" alt="{{ $product->product->nama_Produk }}" class="w-full h-48 object-cover mb-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->product->nama_Produk }}</h3>
                    <p class="text-gray-600">Ordered: {{ $product->total_quantity }} times</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('salesChart').getContext('2d');
            const chartDataElement = document.getElementById('chart-data');
            const chartData = JSON.parse(chartDataElement.getAttribute('data-chart'));

            const salesChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>
