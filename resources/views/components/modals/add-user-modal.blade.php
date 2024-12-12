<x-modal name="add-user-modal" :show="false" maxWidth="lg" focusable>
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
                {{ __('Add User') }}
            </x-primary-button>
        </form>
    </div>
</x-modal>