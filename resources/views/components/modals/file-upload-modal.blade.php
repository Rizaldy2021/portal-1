<div class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50" id="new-file-modal">
    <div class="bg-white p-4 rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Upload</h2>
            <button class="text-gray-600 hover:text-gray-900" id="close-file-modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input 
                type="file" 
                name="file[]" 
                id="filepond" 
                required 
                multiple
            >
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mt-4">Upload</button>
        </form>
    </div>
</div>
