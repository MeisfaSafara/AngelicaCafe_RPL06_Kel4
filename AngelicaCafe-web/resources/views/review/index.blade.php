<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <!-- Tambahkan link CSS Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Reviews</h1>
        
        <!-- Tombol untuk menampilkan form review -->
        <button id="showReviewForm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
            Tambah Review
        </button>

        <!-- Form untuk menambahkan review (awalnya disembunyikan) -->
        <form id="reviewForm" class="hidden mb-4" action="{{ route('review.store') }}" method="POST">
            @csrf
            <textarea name="review" id="review" class="w-full border rounded py-2 px-3" placeholder="Tulis review Anda di sini..."></textarea>
            <button type="submit" id="submitReview" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Kirim</button>
        </form>
        
        <!-- Daftar review -->
        <div id="reviews" class="mb-4">
            @foreach($review as $r)
            <div class="border border-gray-300 p-4 mb-2">   
                <p>{{ $r->review }}</p>
                @if($r->created_at)
                    <small class="text-gray-500">{{ $r->created_at->diffForHumans() }}</small>
                @endif
            </div>
            @endforeach
            </div>
        </div>

    <!-- Tambahkan script JavaScript untuk menampilkan/menyembunyikan form -->
    <script>
        document.getElementById('showReviewForm').addEventListener('click', function() {
            document.getElementById('reviewForm').classList.toggle('hidden');
        });

        document.getElementById('submitReview').addEventListener('click', function() {
            document.getElementById('showReviewForm').disabled = true;
        });
    </script>
</body>
</html>