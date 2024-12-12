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
        <div class="min-h-screen bg-gray-100 flex flex-row">
            <div>
                <aside class="flex w-auto">
                    @include('layouts.sidebar')
                </aside>
            </div>

            <div>
                @include('layouts.navigation')
                <!-- Page Heading -->
                @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endisset
                <!-- page Sidebar -->

                <!-- Page Content -->
                <main class="flex w-full h-full">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @include ('components.modals.new-folder-modal')
        @include ('components.modals.file-upload-modal')
        @include('components.modals.add-user-modal')

    </body>
</html>
