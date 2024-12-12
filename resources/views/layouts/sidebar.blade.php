<div x-data="{ open: false }" class="bg-[#f4f3f3] text-black h-full min-h-screen px-2 py-4 flex flex-col gap-2">
    <div class="flex w-full mb-4 items-start flex-col">
        <img src="{{ asset('img/logo.svg') }}" alt="logo" class="w-[35px]">
        <h3 class="font-bold text-xl mr-3">Dashboard</h3>
    </div>
    <div class="flex w-full">
        <div class="w-full flex flex-col gap-1">
            <h4 class="text-lg font-medium text-gray-600">General</h4>
            <x-sidebar-link :href="route('admin')" :active="request()->routeIs('admin')">
                <img src="{{ asset('icon/home.svg')}}" alt="nav-icon">
                {{__('Home')}}
            </x-sidebar-link>

            <x-sidebar-link :href="route('view')" :active="request()->routeIs('view')">
                <img src="{{ asset('icon/home.svg')}}" alt="nav-icon">
                {{__('viewewewewe')}}
            </x-sidebar-link>
        </div>
    </div>
    <button 
    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
    x-on:click="$dispatch('open-modal', 'add-user-modal')"
    >
        Add User
    </button>
</div>