<x-modal name="new-folder-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">New Folder</h2>

        <form action="{{ route('folders.store') }}" method="POST">
            @csrf
            <div class="mt-4">
                <x-input-label for="name" :value="__('Folder Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <input type="hidden" name="parent_id" value="{{ $folderId ?? null }}">

            <x-primary-button class="mt-4">
                {{ __('Create') }}
            </x-primary-button>
        </form>
    </div>
</x-modal>