@extends($layout)

@section('content')
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('File Explorer') }}
            </h2>
        </x-slot>
        <div class="bg-white w-full p-4 h-full" id="file-explorer">
            @include('files.index')
            @include('folders.index')
        </div>
        {{-- @dd(route('folders.update', $folders)); --}}
        {{-- @dd($folders); --}}

    </div>

    @include('components.modals.file-upload-modal')
    @include('components.modals.new-folder-modal')
    @include('components.modals.folder-rename-modal')

@endsection