@props(['source'])

<div>
    <a href="#" class="flex flex-row gap-4 items-center bg-[#F2F1FF] hover:bg-blue-200 rounded p-2 w-[200px] shadow">
        <img src="{{ asset('icon/file.svg') }}" alt="" class="w-[20px]">
        {{ $slot }}
    </a>
</div>