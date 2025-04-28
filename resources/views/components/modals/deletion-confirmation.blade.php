<x-modal name="delete-folder-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Delete Folder</h2>
        <form method="POST" id="delete-folder-form">
            @csrf
            @method('DELETE')

            <div class="mt-4">
                {{-- <x-input-label for="modal-folder-name" :value="__('Folder Name')" />
                <x-text-input id="modal-folder-name" class="block mt-1 w-full" type="text" name="name" required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                <p>Are you sure want to delete this folder?</p>
            </div>

            <input type="hidden" id="modal-delete-folder-id" name="folder_id">

            <div class="mt-4 flex justify-end gap-4">
                <x-primary-button>
                    {{ __('delete') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
