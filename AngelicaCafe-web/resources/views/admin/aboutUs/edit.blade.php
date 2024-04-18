<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About Us Content</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #EDDBC7; /* Menggunakan warna EDDBC7 sebagai background */
            font-family: Arial, sans-serif; /* Memilih jenis font yang umum */
            color: #333; /* Warna teks utama */
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none; /* Menghapus border card untuk tampilan yang lebih bersih */
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan untuk card */
        }

        .card-header {
            background-color: #8B4513; /* Menggunakan warna coklat untuk header card */
            color: #fff; /* Warna teks pada header card */
            border-radius: 0; /* Menghilangkan border-radius agar header card lebih tegas */
            padding: 15px 20px; /* Padding untuk header card */
        }

        .card-body {
            padding: 20px; /* Padding untuk body card */
        }

        .btn-back {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #8B4513; /* Menggunakan warna coklat untuk tombol primary */
            border-color: #8B4513; /* Warna border tombol primary */
        }

        .btn-primary:hover {
            background-color: #654321; /* Warna saat tombol primary dihover */
            border-color: #654321; /* Warna border saat tombol primary dihover */
        }

        .alert-success {
            margin-top: 20px;
            background-color: #d4edda; /* Warna latar belakang alert success */
            border-color: #c3e6cb; /* Warna border alert success */
            color: #155724; /* Warna teks alert success */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/admin" class="btn btn-primary btn-back">&#8592; Back to Admin Home</a>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit About Us Content</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('admin.aboutUs.update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea class="form-control" id="content" name="content" rows="5">{{ $aboutUs->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Content</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
