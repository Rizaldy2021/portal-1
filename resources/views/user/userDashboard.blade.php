@extends($layout)

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('File Explorer') }} 
</h2>
@endsection

@section('content')
    <div class="bg-white w-full p-4 h-full" id="file-explorer">
        @include('files.index')
        @include('folders.index')
    </div>

@include('components.modals.file-upload-modal')
@include('components.modals.new-folder-modal')

@endsection