@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Search') }}
    </h2>
@endsection

@section('content')
    <div class="bg-white pr-4 p-4 w-full" id="file-explorer">
        <div class="flex flex-col gap-10">
            <div class="mb-4">
                <h4 class="text-lg font-medium text-gray-600">Users</h4>
                @if (collect($result['users'])->isEmpty())
                    <p>No users found.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($result['users'] as $user)
                            <x-user-card :user="$user" />
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="mb-4">
                <h4 class="text-lg font-medium text-gray-600">Folders</h4>
                @if ($result['folders']->isEmpty())
                    <p>No folders found.</p>
                @else
                    <div class="bg-white w-full py-2 gap-4 grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
                        @foreach ($result['folders'] as $folder)
                            <x-folder-card :folder="$folder">{{ $folder->name }}</x-folder-card>
                        @endforeach
                    </div>
                @endif
            </div>
            <div>
                <h4 class="text-lg font-medium text-gray-600">Files</h4>
                @if ($result['files']->isEmpty())
                    <p>No files found.</p>
                @else
                    <div class="bg-white w-full py-2 gap-4 grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
                        @foreach ($result['files'] as $file)
                            <x-file-card :file="$file">{{ $file->name }}</x-file-card>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
