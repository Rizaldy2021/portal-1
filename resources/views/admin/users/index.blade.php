@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($result['users'] as $user)
        <x-user-card :user="$user" />
    @endforeach
</div>
@endsection