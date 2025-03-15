@props(['file'])

<div id="file-card">
    <a href="{{ route('files.view', $file->id) }}" target="_blank"
        class="flex flex-row gap-4 items-center bg-[#F2F1FF] hover:bg-blue-200 rounded p-2 w-full shadow flex-grow">
        <img src="{{ asset('icon/file.svg') }}" alt="" class="w-[20px]">
        <span class="truncate" title="{{ $file->name }}">{{ $slot }}</span>
    </a>
</div>
