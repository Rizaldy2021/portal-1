@extends('layouts.admin')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Users') }}
</h2>
@endsection

@section('content')
<div class="h-fit p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($result['users'] as $user)
        <x-user-card :user="$user" />
        @endforeach
    </div>
</div>
@endsection

{{-- @include('components.modals.edit-user-modal') --}}