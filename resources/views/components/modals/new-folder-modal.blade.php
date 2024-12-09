<div
    x-data="{
        isOpen: false,
        openModal() {
            this.isOpen = true
        },
        closeModal() {
            this.isOpen = false
        }
    }"
    x-init="
        document.addEventListener('open-folder-modal', openModal);
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal()
        });
    "

    x-show="isOpen"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
>
    <div
        @click.outside="closeModal()"
        class="bg-white rounded-lg p-6 w-96 max-w-full"
    >
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">New Folder</h2>
            <button
                @click="closeModal()"
                class="text-gray-600 hover:text-gray-900"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>

        <form
            action="{{ route('folders.store') }}
            method="POST"
            @submit.prevent="submitForm($event)">
            
            @csrf
            <label for="name">Folder Name</label>
            <input 
                type="text"
                name="name"
                id="name"
                required
                >
    
            <label for="description">Folder Description</label>
            <textarea 
                name="description"
                id="description"
                rows="3"
            ></textarea>
    
            <button type="submit">Create Folder</button>
        </form>

    </div>

</div>