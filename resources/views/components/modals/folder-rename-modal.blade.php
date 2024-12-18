{{-- <x-modal name="rename-folder-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Rename</h2>

        <form action="{{ route('folders.update') }}" method="POST">
            @csrf
            @method("PUT")
            <div class="mt-4">
                <x-input-label for="name" :value="__('Folder Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <input type="hidden" name="parent_id" value="{{ $folderId ?? null }}">

            <x-primary-button class="mt-4">
                {{ __('Rename') }}
            </x-primary-button>
        </form>
    </div>
</x-modal> --}}

<x-modal name="rename-folder-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Rename Folder</h2>
        <form action="{{ route('folders.update', $folder) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-input-label for="folder-name" :value="__('Folder Name')" />
                <x-text-input id="folder-name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <input type="hidden" name="parent_id" value="{{ $folderId ?? null }}">
            
            <div class="mt-4 flex justify-end gap-4">
                <x-primary-button>
                    {{ __('Rename') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>