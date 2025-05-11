<x-modal name="edit-user-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white">Edit User</h2>

        <form method="POST" class="mt-4 flex flex-col gap-4" id="edit-user-form">
            @csrf
            @method('PUT')

            <input type="hidden" name="user_id" id="modal-user-id">

            <!-- User Name Input -->
            <div>
                <x-input-label for="modal-user-name" :value="__('Username')" />
                <x-text-input id="modal-user-name" class="block mt-1 w-full" type="text" name="name" required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- User Email Input -->
            <div>
                <x-input-label for="modal-user-email" :value="__('Email')" />
                <x-text-input id="modal-user-email" class="block mt-1 w-full" type="email" name="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="modal-user-password" :value="__('Password')" />
                <x-text-input id="modal-user-password" class="block mt-1 w-full" type="text" name="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-2">
                <x-secondary-button type="button" x-on:click="open = false">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
