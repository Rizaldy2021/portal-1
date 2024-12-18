@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('File Explorer') }}
    </h2>
@endsection

@section('content')
<div :folders="$folders">
    <div class="bg-white p-4 h-screen w-full flex flex-wrap" id="file-explorer">
        <div class="flex flex-col gap-4 drop-zone" id="drop-element">
            @include('files.index')
            @include('folders.index')
        </div>
    </div>
    
    @include('components.modals.new-folder-modal')
    @include('components.modals.file-upload-modal')
</div>
@endsection