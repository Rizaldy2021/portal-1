<!DOCTYPE html>
<html lang="en" class="bg-white">

<head>
    @include('includes.head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body class="font-[poppins] flex items-center login">
    <div class="h-screen flex flex-col items-center justify-center gap-4 w-full">
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-6">
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
        </form> --}}

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center">
                <h1 class="text-xl font-bold mb-4">Login</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
