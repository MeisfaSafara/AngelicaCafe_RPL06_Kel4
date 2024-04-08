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

<style>
    .gambar {
        /* background-image: url({{ url('/img/MenuBackground.png') }}); */
        background-size: cover;
    }
</style>

<body data-theme="cupcake">
    <div class="bg-[#EDDBC7] h-screen w-screen flex justify-center items-center">
        <div class="flex flex-col gap-4 w-[30%]">
            <img class="h-32 object-none" src={{ asset('/img/Logo.png') }} alt="">
            <h1 class="font-bold text-2xl text-center">Login to your account</h1>
            {{-- <div class="py-2 text-center font-bold bg-white rounded-xl">
                <h1>Continue with google</h1>
            </div> --}}
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.293 5.293a1 1 0 011.414 0l.293.293V7a1 1 0 01-2 0V5.586l.293-.293a1 1 0 111.414 1.414L13 7.414l1.293-1.293a1 1 0 111.414 1.414L14.414 9l1.293 1.293a1 1 0 11-1.414 1.414L13 10.414l-1.293 1.293a1 1 0 11-1.414-1.414L11.586 9l-1.293-1.293a1 1 0 010-1.414 1 1 0 011.414 0L13 7.586l1.293-1.293z"/></svg>
                </span>
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('failed'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Failed!</strong>
                    <span class="block sm:inline">{{ session('failed') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.293 5.293a1 1 0 011.414 0l.293.293V7a1 1 0 01-2 0V5.586l.293-.293a1 1 0 111.414 1.414L13 7.414l1.293-1.293a1 1 0 111.414 1.414L14.414 9l1.293 1.293a1 1 0 11-1.414 1.414L13 10.414l-1.293 1.293a1 1 0 11-1.414-1.414L11.586 9l-1.293-1.293a1 1 0 010-1.414 1 1 0 011.414 0L13 7.586l1.293-1.293z"/></svg>
                    </span>
                </div>
            @endif
            <div class="divider">OR</div>
            <form action="{{route('login')}}" method="POST">
                @method('POST')
                @csrf
                <div class="flex flex-col gap-4">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Email" class="border-2 h-10 p-3 rounded-lg w-full" />
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" class="border-2 h-10 p-3 rounded-lg w-full" />
                </div>
                <div class="flex justify-between items-center">
                    <div class="form-control">
                        <label class="label cursor-pointer flex gap-2 items-center justify-center">
                        <p class="label-text">Remember me</p>
                        <input type="checkbox" class="" />
                        </label>
                    </div>
                    <a href="/forgot" class="text-blue-700">Forgot Password?</a>
                </div>
                <button class="rounded-lg w-[5em] font-semibold py-1 text-center bg-[#764507] text-white">Login</button>
            </form>
           
            <p class="text-center text-gray-400">Don’t have an account? <a href="/signup" class="underline-offset-2 text-[#764507] underline">Sign up here</a></p>
        </div>
    </div>
</body>

</html>
