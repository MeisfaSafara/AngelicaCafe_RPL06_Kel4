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
            <h1 class="font-bold text-2xl text-center mb-4">Forgot Password</h1>
            <div class="py-2 text-center font-bold bg-white rounded-xl">
                <h1>Continue with google</h1>
            </div>
            <div class="divider">OR</div>
            <div class="flex flex-col gap-4">
                <input type="text" placeholder="Email" class="border-2 h-10 p-3 rounded-lg w-full" />
            </div>
            <a href="/dashboard" class="rounded-lg w-[5em] font-semibold py-1 text-center bg-[#764507] text-white">Submit</a>
            <p class="text-center text-gray-400">Don’t have an account? <a href="/signup" class="underline-offset-2 text-[#764507] underline">Sign up here</a></p>
        </div>
    </div>
</body>

</html>
