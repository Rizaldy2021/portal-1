<x-app-layout>
    <main class="bg-white pr-4 rounded-s-[34px] p-4 w-screen" id="file-explorer">
        <h1 class="text-2xl font-medium mb-4">File Explorer</h1>
        <div class="flex flex-col gap-10 drop-zone" id="drop-element">
            @include('files.index')
            @include('folders.index')
        </div>
    </main>
    
    @include ('components.modals.new-folder-modal')
    @include ('components.modals.file-upload-modal')
    {{-- <script src="/js/app.js"></script> --}}
    {{-- @include('components.context-menu') --}}
    
</x-app-layout>
