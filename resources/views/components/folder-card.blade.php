<a href="{{ route('folder.show', $folder->id) }}" class="flex flex-row gap-4 items-center bg-[#F2F1FF] hover:bg-blue-200 rounded p-2 w-[200px] shadow">
    <img src="{{ asset('icon/folder2.svg') }}" alt="" class="w-[20px]">
    {{ $slot }}
</a>