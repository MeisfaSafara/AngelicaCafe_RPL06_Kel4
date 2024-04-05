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
    {{-- NAVBAR --}}
    @include('layout.navbar')
    {{-- NAVBAR --}}

    {{-- OUR MENU --}}
    <div class="h-full pt-[7em]">
        <div class="flex flex-col border-2 rounded-xl px-6 mx-32 py-4 mb-6">
            <div class="flex gap-4">
                <a href="/profile">
                    <h1 class="font-semibold text-xl">Personal Profile</h1>
                </a>
                <a href="/profile/address">
                    <h1 class="font-semibold text-xl">Address List</h1>
                </a>
                <a href="/profile/transaction">
                    <h1 class="font-semibold text-xl">Transaction List</h1>
                </a>
            </div>
            <div class="divider"></div>
    
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
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Terjadi kesalahan validasi!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
            <div class="flex gap-3">
                <div class="w-[70%]">
                    <h1 class="text-3xl font-bold">Change User Information Here</h1>
                    <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col gap-4  rounded-xl p-4 h-full">
                        @method('PUT')
                        @csrf
                        <div class="flex gap-4 w-full mb-3">
                            <input type="text" placeholder="First Name" class="border-2 h-10 p-3 rounded-lg w-full" value="{{$user->first_name}}" name="first_name" />
                            <input type="text" placeholder="Last Name" class="border-2 h-10 p-3 rounded-lg w-full" value="{{$user->last_name}}" name="last_name" />
                        </div>
                        <div class="flex gap-4 mb-3">
                            <input type="text" placeholder="Email" class="border-2 h-10 p-3 rounded-lg w-full" value="{{$user->email}}" name="email" />
                            <input type="text" placeholder="Phone" class="border-2 h-10 p-3 rounded-lg w-full" value="{{$user->phone_number}}" name="phone" />
                        </div>
                        <input type="password" placeholder="Password" class="border-2 h-10 p-3 rounded-lg w-full" name="password" />
                        <input type="password" placeholder="Confirm Password" class="border-2 h-10 p-3 rounded-lg w-full" name="confirm_password" />
                        <button class="w-full border-2 text-lg text-gray-400 font-bold">Update Information</button>
                    </form>
                </div>
                <div class="w-[20%] h-full flex">
                    <div class="border-2 w-full h-full py-4 rounded-xl flex flex-col gap-3 justify-center items-center">
                        <img class="h-32 rounded-full" src="{{ asset('storage/'.$user->image) }}" alt="Profile Picture">
                        <form action="{{ route('profile.update-profile-picture') }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="file" id="profilePicture" name="profilePicture" accept=".jpeg, .jpg, .png"
                                class="hidden">
                            <p class="text-xs text-gray-400 mx-6">Picture size: max. 1 MB Picture format: .JPEG, .PNG</p>
                            <div class="flex justify-center items-center">
                                <label for="profilePicture" class="cursor-pointer border-2 px-6 py-2 rounded-xl font-bold text-xl text-gray-400 bg-transparent">
                                    Choose File
                                </label>
                                <button type="submit" id="saveProfilePicture"
                                    class="border-2 px-6 py-2 rounded-xl font-bold text-xl text-white bg-blue-500 ml-4">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                              
                
                {{-- <div class="w-[20%] h-full flex">
                    <div class="border-2 w-full h-full py-4 rounded-xl flex flex-col gap-3 justify-center items-center">
                        <img class="h-32" src="{{ asset('/img/profilepicture.png') }}" alt="">
                        <button class="border-2 px-6 py-2 rounded-xl font-bold text-xl text-gray-400 bg-transparent">Change</button>
                        <p class="text-xs text-gray-400 mx-6">Picture size: max. 1 MB Picture format: .JPEG, .PNG</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- FOOTER --}}
    @include('layout.footer');
    {{-- FOOTER --}}

    
</body>

</html>