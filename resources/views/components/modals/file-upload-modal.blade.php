<x-modal name="file-upload-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Add File</h2>

        <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file[]" id="filepond" required multiple>
            <input type="hidden" value="{{ $folderId ?? null }}" name="folder_id">

            <x-primary-button class="ms-4">
                {{ __('Upload') }}
            </x-primary-button>
        </form>
    </div>
    @vite('resources/js/fileUpload.js')
</x-modal>
