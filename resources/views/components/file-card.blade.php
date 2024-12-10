@props(['file'])

<div id="file-card">
    <a href="{{ Storage::url($file->path) }}" target="_blank" class="flex flex-row gap-4 items-center bg-[#F2F1FF] hover:bg-blue-200 rounded p-2 w-[200px] shadow">
        <img src="{{ asset('icon/file.svg') }}" alt="" class="w-[20px]">
        <span class="truncate">{{ $slot }}</span>
    </a>
</div>