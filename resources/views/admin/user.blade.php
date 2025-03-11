@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>
@endsection

@section('content')
<div class="w-full">
    @foreach ($result['users'] as $user)
        <x-user-card :user="$user"/>
    @endforeach
</div>
@endsection