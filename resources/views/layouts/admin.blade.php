<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased h-full">
    <div class="h-screen bg-gray-100 flex flex-row overflow-hidden">

        @include('components.sidebar')

        <div class="flex flex-col w-full">
            <!-- Page Heading -->
            @hasSection('header')
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex h-[calc(100dvh-5rem)] bg-white  overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

    @vite('resources/js/contextMenu.js')

    @include('components.modals.add-user-modal')
    @include('components.modals.folder-rename-modal')
    @include('components.modals.edit-user-modal')
</body>

</html>
