{{-- <x-modal name="delete-folder-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Delete Folder</h2>
        <form method="POST" id="delete-folder-form">
            @csrf
            @method('DELETE')

            <div class="mt-4">
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
</x-modal> --}}

<x-modal name="delete-item-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4" id="delete-modal-title">
            Delete Item
        </h2>

        <form method="POST" id="delete-item-form">
            @csrf
            @method('DELETE')

            <div class="mt-4">
                <p id="delete-modal-message" class="text-sm text-gray-700">
                    Are you sure you want to delete this item?
                </p>
            </div>

            <input type="hidden" id="modal-delete-item-id" name="item_id">

            <div class="mt-4 flex justify-end gap-4">
                <x-primary-button class="bg-red-600 hover:bg-red-700">
                    {{ __('Delete') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
