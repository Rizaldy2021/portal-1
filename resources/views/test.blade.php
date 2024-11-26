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
        <h1 class="text-2xl font-medium mb-4">File Explorer</h1>
        <div class="flex flex-col gap-10">
            <div>
                <h2 class="text-gray-600">Folder</h2>
                <div class="bg-white w-full py-2 grid grid-cols-5 gap-y-4">
                    @for ($i = 0; $i < 7; $i++)
                    <a href="#" class="flex flex-row gap-4 items-center bg-[#F2F1FF] hover:bg-blue-200 rounded p-2 w-[200px] shadow">
                        <img src="{{ asset('icon/folder2.svg') }}" alt="" class="w-[20px]">
                        <p>Folder {{ $i + 1 }}</p>
                    </a>
                    @endfor
                </div>
            </div>
            <div>
                <h2 class="text-gray-600">Recent</h2>
                <div class="bg-white w-full py-2 grid grid-cols-5 gap-y-4">
                    @for ($i = 0; $i < 12; $i++)
                    <a href="#" class="flex flex-row gap-4 items-center bg-[#F2F1FF] hover:bg-blue-200 rounded p-2 w-[200px] shadow">
                        <img src="{{ asset('icon/file.svg') }}" alt="" class="w-[20px]">
                        <p>File {{ $i + 1 }}</p>
                    </a>
                    @endfor
                </div>
            </div>
        </div>
    </main>
</body>
</html>