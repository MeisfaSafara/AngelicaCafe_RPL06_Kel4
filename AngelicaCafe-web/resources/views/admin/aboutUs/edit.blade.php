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
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />

    <title>Edit About Us Content</title>
    <style>
        body {
            background-color: #F5F5F5;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .sidebar {
            background-color: #2D2D2D;
            color: #FFFFFF;
        }

        .sidebar a {
            color: #FFFFFF;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #4A4A4A;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #1E88E5;
            color: #FFFFFF;
            border-radius: 0;
            padding: 15px 20px;
        }

        .card-body {
            padding: 20px;
        }

        .btn-back {
            margin-bottom: 20px;
            color: #1E88E5;
        }

        .btn-primary {
            background-color: #1E88E5;
            border-color: #1E88E5;
        }

        .btn-primary:hover {
            background-color: #1565C0;
            border-color: #1565C0;
        }

        .alert-success {
            margin-top: 20px;
            background-color: #DFF0D8;
            border-color: #D6E9C6;
            color: #3C763D;
        }
    </style>
</head>

<body>
    @include('layout.sidebar')
    <div class="p-4 sm:ml-64 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-2xl">
            <div class="mb-4">
                <a href="/admin" class="flex items-center btn-back hover:text-[#1565C0]">
                    <svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" width="16" height="16" class="mr-1">
                        <path d="M222.927 580.115l301.354 328.512c24.354 28.708 20.825 71.724-7.883 96.078s-71.724 20.825-96.078-7.883L19.576 559.963a67.846 67.846 0 01-13.784-20.022 68.03 68.03 0 01-5.977-29.488l.001-.063a68.343 68.343 0 017.265-29.134 68.28 68.28 0 011.384-2.6 67.59 67.59 0 0110.102-13.687L429.966 21.113c25.592-27.611 68.721-29.247 96.331-3.656s29.247 68.721 3.656 96.331L224.088 443.784h730.46c37.647 0 68.166 30.519 68.166 68.166s-30.519 68.166-68.166 68.166H222.927z"></path>
                    </svg>
                    Back to Admin Home
                </a>
            </div>
            @if(session('success'))
            <div class="alert alert-success shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4m1 9a9 9 0 110-18 9 9 0 010 18z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif
            <h1 class="text-2xl font-semibold mb-4">Edit About Us Content</h1>
            <form method="POST" action="{{ route('admin.aboutUs.update') }}">
                @csrf
                <div class="mb-4">
                    <label for="content" class="block text-gray-600">Content</label>
                    <textarea id="content" name="content" rows="5" class="w-full border rounded px-3 py-2">{{ $aboutUs->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary text-white rounded px-4 py-2 hover:bg-[#1565C0]">Update Content</button>
            </form>
        </div>
    </div>
</body>

</html>
