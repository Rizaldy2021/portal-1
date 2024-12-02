<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="flex bg-[#f4f3f3] font-[poppins] pl-[16px]">
    <aside class="flex pr-2">
        <x-sidebar/>
    </aside>
    <main class="bg-white pr-4 rounded-s-[34px] p-4 w-screen">
        <h1 class="text-2xl font-medium mb-4">Folder: {{ $folder->name }}</h1>
        <div class="flex flex-col gap-10">
            <div>
                <h2 class="text-gray-600">Files</h2>
                <div class="bg-white w-full py-2 gap-4 flex flex-wrap">
                    @foreach ($folder->files as $file)
                        <x-fileCard>{{ $file->name }}</x-fileCard>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>
</html>
