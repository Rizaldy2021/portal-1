<div class="parent-folder">
    <h2 class="text-gray-600">Recent</h2>
    <div class="bg-white w-full py-2 gap-4 flex flex-wrap">
        @foreach ($result['folders'] as $folder)
            <x-folderCard :folder="$folder">{{ $folder->name }}</x-folderCard>
        @endforeach
    </div>
</div>

@include('components.modals.folder-rename-modal')