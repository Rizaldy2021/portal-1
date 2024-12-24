{{-- <x-modal name="add-user-modal" :show="false" maxWidth="lg" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Add New User</h2>
    
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
                    
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
                        
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                            
                <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                            
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
                            
            <x-primary-button class="mt-4">
                {{ __('Save Changes') }}
            </x-primary-button>
        </form>
    </div>
</x-modal> --}}

<x-modal name="edit-user-modal" :show="false" maxWidth="lg" focusable
    x-data="{ userName: '', userEmail: '', userId: null }"
    >
    <div class="p-6">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white">Edit User</h2>
        <form x-on:submit.prevent="submitForm" class="mt-4 flex flex-col gap-4">
            <!-- User Name Input -->
            <div>
                <label for="userName" class="block text-sm font-medium text-neutral-600 dark:text-neutral-300">Name</label>
                <input type="text" id="userName" x-model="userName" class="mt-1 block w-full rounded-md border border-neutral-300 bg-neutral-50 p-2 text-neutral-900 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 focus:ring-primary focus:border-primary">
            </div>

            <!-- User Email Input -->
            <div>
                <label for="userEmail" class="block text-sm font-medium text-neutral-600 dark:text-neutral-300">Email</label>
                <input type="email" id="userEmail" x-model="userEmail" class="mt-1 block w-full rounded-md border border-neutral-300 bg-neutral-50 p-2 text-neutral-900 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 focus:ring-primary focus:border-primary">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-2">
                <x-secondary-button type="button" x-on:click="open = false">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-modal>