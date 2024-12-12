<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File Explorer') }}
        </h2>
    </x-slot>
    <div class="bg-white w-full p-4 h-full">
        @include('files.index')
    </div>
</x-app-layout>