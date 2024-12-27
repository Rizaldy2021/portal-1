@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('File Explorer') }}
    </h2>
@endsection

@section('content')
<div :folders="$folders" class="w-full">
    <div class="bg-white p-4 h-full w-full flex flex-wrap" id="file-explorer">
        <div class="flex flex-col gap-4 drop-zone" id="drop-element">
            @include('files.index')
            @include('folders.index')
        </div>
    </div>
    
    @include('components.modals.new-folder-modal')
    @include('components.modals.file-upload-modal')
    @include('components.modals.edit-user-modal')
</div>
@endsection