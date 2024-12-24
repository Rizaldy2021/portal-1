<x-modal name="rename-folder-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Rename Folder</h2>
        <form method="POST" id="rename-folder-form">
            @csrf
            @method('PUT')
            
            <div class="mt-4">
                <x-input-label for="modal-folder-name" :value="__('Folder Name')" />
                <x-text-input id="modal-folder-name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                
                <input type="hidden" id="modal-folder-id" name="folder_id">
                
                <div class="mt-4 flex justify-end gap-4">
                    <x-primary-button>
                        {{ __('Rename') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>