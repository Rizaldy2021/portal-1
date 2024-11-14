<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    @include('includes.head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body class="font-[poppins] flex items-center login">
    <div class="container h-screen flex flex-col items-center justify-center gap-4">
        <h1 class="text-xl font-bold mb-4">Login</h1>
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-6">
            @csrf
            <div class="relative w-56">
                <input type="text" name="username" class="w-full h-10 pt-2 pb-1 text-sm outline-none peer border-b-2 focus:border-[#4287f5]" required>
                <label for="username" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-sm text-gray-500 transition-all 
                    peer-focus:top-0 peer-focus:text-xs peer-focus:-translate-y-full peer-focus:text-[#4287f5]
                    peer-valid:top-0 peer-valid:text-xs peer-valid:-translate-y-full">
                    Username
                </label>
            </div>
            <div class="relative w-56">
                <input type="password" name="password" class="w-full h-10 pt-2 pb-1 text-sm outline-none peer border-b-2 focus:border-[#4287f5]" required>
                <label for="password" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-sm text-gray-500 transition-all 
                    peer-focus:top-0 peer-focus:text-xs peer-focus:-translate-y-full peer-focus:text-[#4287f5]
                    peer-valid:top-0 peer-valid:text-xs peer-valid:-translate-y-full">
                    Password
                </label>
            </div>
            <button type="submit" class="bg-[#C0392B] text-white px-6 py-2 mt-2 rounded-md hover:bg-[#912c21]">Login</button>
        </form>
    </div>
</body>
</html>