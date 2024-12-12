<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File Explorer') }}
        </h2>
    </x-slot>
    <div class="bg-white p-4 h-full w-full flex flex-wrap" id="file-explorer">
        <div class="flex flex-col gap-4 drop-zone" id="drop-element">
            @include('files.index')
            @include('folders.index')
        </div>
    </div>
</x-admin-layout>
