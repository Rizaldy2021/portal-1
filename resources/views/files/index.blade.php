<div>
    <h2 class="text-gray-600">Folder</h2>
    <div class="bg-white w-full py-2 gap-4 flex flex-wrap">
        @foreach ($files as $file)
            <x-fileCard :file="$file">{{ $file->name }}</x-fileCard>
        @endforeach

        {{-- @forelse ($folders as $folder)
            @if (auth()->id() === $folder->user_id || auth()->user()->role === 'admin')
                <x-folderCard :folder="$folder">{{ $folder->name }}</x-folderCard>
            @endif
        @empty
            <p class="text-gray-600">No folders found.</p>
        @endforelse --}}
    </div>
</div>