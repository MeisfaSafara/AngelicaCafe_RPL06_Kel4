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
        <div id="reviews" class="mb-4">
            @php
                $sortedReviews = $review->sortByDesc('created_at');
            @endphp

            @foreach($sortedReviews as $r)
            <div class="border border-gray-300 rounded-lg p-4 mb-4 shadow-md">
                <p class="text-lg font-semibold">{{ $r->review }}</p>
                @if($r->created_at)
                    <small class="text-gray-500 block mt-2">{{ $r->created_at->diffForHumans() }}</small>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    
</body>

</html>