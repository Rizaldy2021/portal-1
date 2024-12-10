<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
</head>
<body class="flex bg-[#f4f3f3] font-[poppins] pl-[16px]">
    <aside class="flex pr-2">
        <x-sidebar/>
    </aside>
    <main class="bg-white pr-4 rounded-s-[34px] p-4 w-screen" id="file-explorer">
        <h1 class="text-2xl font-medium mb-4">File Explorer</h1>
        <div class="flex flex-col gap-10 drop-zone" id="drop-element">
            @include('files.index')
            @include('folders.index')
        </div>
    </main>

    {{ session('current_folder_id')}}
    @include ('components.modals.new-folder-modal')
    {{-- @include ('components.modals.file-upload-modal') --}}
    {{-- <script src="/js/app.js"></script> --}}
    {{-- @include('components.context-menu') --}}

</body>
</html>