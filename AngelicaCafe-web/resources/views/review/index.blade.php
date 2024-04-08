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
        <h1 class="text-3xl font-bold mb-8">Reviews</h1>
        
        <button id="showReviewForm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-8 transition duration-300 ease-in-out transform hover:scale-105">
            Tambah Review
        </button>

        <form id="reviewForm" class="hidden mb-8 bg-white rounded shadow-md p-4" action="{{ route('review.store') }}" method="POST">
            @csrf
            <textarea name="review" id="review" class="w-full border border-gray-300 rounded py-2 px-3 mb-4" placeholder="Tulis review Anda di sini..."></textarea>
            <button type="submit" id="submitReview" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Kirim</button>
        </form>
        
        @if($latestReview)
            <div class="border border-gray-300 p-4 mb-8 rounded">
                <p>{{ $latestReview->review }}</p>
                @if($latestReview->created_at)
                    <small class="text-gray-500">{{ $latestReview->created_at->diffForHumans() }}</small>
                @endif
            </div>
        @endif
    </div>

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
