@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>
@endsection

@section('content')
    <div class="w-full h-full p-4">
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3 xl:grid-cols-4 h-full">
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
            @foreach ($result['users'] as $user)
                <x-user-card :user="$user" />
            @endforeach
        </div>
    </div>
@endsection
