@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('coba DOM') }}
    </h2>
@endsection

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="w-full" x-data x-init="console.log('hehe')">
        <button class="h-2 w-3" x-on:click="$dispatch('open-modal', 'edit-user-modal')">
            hehe
        </button>
    </div>
@endsection
