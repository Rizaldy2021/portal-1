@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('File Explorer') }}
    </h2>
@endsection

@section('content')
    <div class="bg-white pr-4 p-4 w-full" id="file-explorer">
        <h1 class="text-2xl font-medium mb-4">{{ $folder->name }}</h1>
        <div class="flex flex-col gap-10">
            <div class="parent-folder">
                <h2 class="text-gray-600">Folder</h2>
                <div class="bg-white w-full py-2 gap-4 grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
                    @foreach ($folders as $currentFolder)
                        <x-folderCard :folder="$currentFolder">{{ $currentFolder->name }}</x-folderCard>
                    @endforeach
                </div>
            </div>
            <div>
                <h2 class="text-gray-600">Files</h2>
                <div class="bg-white w-full py-2 gap-4 grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
                    @foreach ($folder->files as $file)
                        <x-fileCard :file="$file">{{ $file->name }}</x-fileCard>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include ('components.modals.new-folder-modal')
    @include ('components.modals.file-upload-modal')
    {{-- @include('components.modals.folder-rename-modal') --}}
@endsection
