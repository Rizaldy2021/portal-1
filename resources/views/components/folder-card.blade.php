<div class="folder-card" data-folder-id="{{ $folder->id }}" data-folder-name="{{ $folder->name }}"
    data-update-url="{{ route('folders.update', ':folder_id') }}">
    <a href="{{ route('folders.show', $folder->id) }}"
        class="flex flex-row gap-4 items-center bg-[#F2F1FF] hover:bg-blue-200 rounded p-2 w-full shadow flex-grow">
        <img src="{{ asset('icon/folder2.svg') }}" alt="" class="w-[20px]">
        <span class="truncate" title="{{ $folder->name }}">{{ $slot }}</span>
    </a>
</div>
