<x-admin-layout>
    <div class="bg-white rounded-s-[34px] p-4 h-full flex flex-wrap" id="file-explorer">
        <div class="flex flex-col gap-4 drop-zone" id="drop-element">
            <h1 class="text-2xl font-medium">File Explorer</h1>
            @include('files.index')
            @include('folders.index')
        </div>
    </div>
</x-admin-layout>
