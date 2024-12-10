<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="flex bg-[#f4f3f3] font-[poppins] pl-[16px]">
    <aside class="flex pr-2">
        <x-sidebar/>
    </aside>
    <main class="bg-white pr-4 rounded-s-[34px] p-4 w-screen" id="file-explorer">
        <h1 class="text-2xl font-medium mb-4">{{ $folder->name }}</h1>
        <div class="flex flex-col gap-10">
            <div class="parent-folder">
                <h2 class="text-gray-600">Folder</h2>
                <div class="bg-white w-full py-2 gap-4 flex flex-wrap">
                    @foreach ($folders as $currentFolder)
                        <x-folderCard :folder="$currentFolder">Folder {{ $currentFolder->id }}</x-folderCard>
                    @endforeach
                </div>
            </div>
            <div>
                <h2 class="text-gray-600">Files</h2>
                <div class="bg-white w-full py-2 gap-4 flex flex-wrap">
                    @foreach ($folder->files as $file)
                        <x-fileCard :file="$file">{{ $file->name }}</x-fileCard>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    @include ('components.modals.new-folder-modal')
</body>
</html>