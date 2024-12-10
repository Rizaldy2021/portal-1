<div class="hidden flex fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50" id="new-folder-modal">
    <div class="bg-white rounded-lg p-6 w-96 max-w-full">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">New Folder</h2>
            <button class="text-gray-600 hover:text-gray-900" id="close-modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>

        <form action="{{ route('folders.store') }}" method="POST">
            
            @csrf
            <div class="flex flex-col">
                <label for="name">Folder Name</label>
                <input 
                    type="text"
                    name="name"
                    id="name"
                    required
                    >
            </div>

            <div class="flex flex-col">
                <label for="description">Folder Description</label>
                <textarea 
                    name="description"
                    id="description"
                    rows="3"
                ></textarea>
            </div>

            <input type="hidden" name="parent_id" value="{{ $currentFolderId ?? null }}">

            <div class="flex justify-end mt-3">
                <button type="button" class="bg-gray-300 text-gray-700 px-2 py-1 rounded-md mr-2" id="cancel-modal">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-2 py-1 rounded-md">Create Folder</button>
            </div>
        </form>

    </div>

</div>