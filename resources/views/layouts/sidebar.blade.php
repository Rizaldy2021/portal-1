{{-- <div x-data="{ open: false }" class="bg-[#f4f3f3] text-black h-full min-h-screen px-2 py-4 flex flex-col gap-2">
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

    <div>
        <h4 class="text-lg font-medium text-gray-600">Users</h4>

        @foreach ($folders as $folder)
            <x-sidebar-link :href="route('folders.show', $folder->id)" :active="request()->routeIs('folders.show', $folder->id)">
                <img src="{{ asset('icon/folder.svg') }}" alt="folder-icon">
                {{ $folder->name }}
            </x-sidebar-link>
        @endforeach

    </div>
    <button 
    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
    x-on:click="$dispatch('open-modal', 'add-user-modal')"
    >
        Add User
    </button>
</div> --}}

<div x-data="{ showSidebar: false }" class="relative flex w-auto flex-col md:flex-row">
    <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
    <a class="sr-only" href="#main-content">skip to the main content</a>

    <!-- dark overlay for when the sidebar is open on smaller screens  -->
    <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-neutral-950/10 backdrop-blur-sm md:hidden"
        aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>

    <nav x-cloak
        class="fixed left-0 z-20 flex h-svh w-60 shrink-0 flex-col border-r border-neutral-300 bg-neutral-50 p-4 transition-transform duration-300 md:w-64 md:translate-x-0 md:relative dark:border-neutral-700 dark:bg-neutral-900"
        x-bind:class="showSidebar ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
        <!-- logo  -->
        <a href="#" class="ml-2 w-fit text-2xl font-bold text-neutral-900 dark:text-white">
            <span class="sr-only">homepage</span>
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo.svg') }}" alt="logo" class="w-[24px]">
                <p><span class="font-bold">Dashboard</span></p>
            </div>
        </a>

        <!-- search  -->
        {{-- <form action="">
            <div class="relative my-4 flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                    stroke-width="2"
                    class="absolute left-2 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="search"
                    class="w-full border border-neutral-300 rounded-md bg-white px-2 py-1.5 pl-9 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-950/50 dark:focus-visible:outline-white"
                    name="search" aria-label="Search" placeholder="Search" />
            </div>
        </form> --}}

        <!-- sidebar links  -->
        <div class="flex flex-col gap-2 overflow-y-auto pb-6 mt-4">

            <h2 class="text-neutral-600 dark:text-neutral-300">General</h2>

            <x-sidebar-link :href="route('admin')" :active="request()->routeIs('admin')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z"
                        clip-rule="evenodd" />
                </svg>
                {{ __('Home') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('admin.user')" :active="request()->routeIs('view')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path
                        d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                </svg>
                {{ __('Users') }}
            </x-sidebar-link>

            <h2 class="text-neutral-600 dark:text-neutral-300">User</h2>

            {{-- @foreach ($result['topLevelFolders'] as $folder)
                <x-sidebar-link :href="route('folders.show', $folder->id)" :active="request()->routeIs('folders.show', $folder->id)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="M3.75 3A1.75 1.75 0 0 0 2 4.75v3.26a3.235 3.235 0 0 1 1.75-.51h12.5c.644 0 1.245.188 1.75.51V6.75A1.75 1.75 0 0 0 16.25 5h-4.836a.25.25 0 0 1-.177-.073L9.823 3.513A1.75 1.75 0 0 0 8.586 3H3.75ZM3.75 9A1.75 1.75 0 0 0 2 10.75v4.5c0 .966.784 1.75 1.75 1.75h12.5A1.75 1.75 0 0 0 18 15.25v-4.5A1.75 1.75 0 0 0 16.25 9H3.75Z" />
                    </svg>
                    {{ $folder->name }}
                </x-sidebar-link>
            @endforeach --}}

            @foreach ($result['topLevelFolders'] as $folder)
                <x-sidebar-link :href="route('folders.show', $folder->id)" :active="request()->routeIs('folders.show', $folder->id)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path
                            d="M3.75 3A1.75 1.75 0 0 0 2 4.75v3.26a3.235 3.235 0 0 1 1.75-.51h12.5c.644 0 1.245.188 1.75.51V6.75A1.75 1.75 0 0 0 16.25 5h-4.836a.25.25 0 0 1-.177-.073L9.823 3.513A1.75 1.75 0 0 0 8.586 3H3.75ZM3.75 9A1.75 1.75 0 0 0 2 10.75v4.5c0 .966.784 1.75 1.75 1.75h12.5A1.75 1.75 0 0 0 18 15.25v-4.5A1.75 1.75 0 0 0 16.25 9H3.75Z" />
                    </svg>
                    {{ $folder->name }}
                </x-sidebar-link>
            @endforeach
            <h2 class="text-neutral-600 dark:text-neutral-300">Usernya</h2>
            @foreach ($users as $user)
                <x-sidebar-link :href="route("#")" :active="request()->routeIs('#')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path
                            d="M3.75 3A1.75 1.75 0 0 0 2 4.75v3.26a3.235 3.235 0 0 1 1.75-.51h12.5c.644 0 1.245.188 1.75.51V6.75A1.75 1.75 0 0 0 16.25 5h-4.836a.25.25 0 0 1-.177-.073L9.823 3.513A1.75 1.75 0 0 0 8.586 3H3.75ZM3.75 9A1.75 1.75 0 0 0 2 10.75v4.5c0 .966.784 1.75 1.75 1.75h12.5A1.75 1.75 0 0 0 18 15.25v-4.5A1.75 1.75 0 0 0 16.25 9H3.75Z" />
                    </svg>
                    {{ $user->name }}
                </x-sidebar-link>
            @endforeach

            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                x-on:click="$dispatch('open-modal', 'add-user-modal')">
                Add User
            </button>

            <a href="#"
                class="flex items-center rounded-md gap-2 bg-black/10 px-2 py-1.5 text-sm font-medium text-neutral-900 underline-offset-2 focus-visible:underline focus:outline-none dark:bg-white/10 dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
                    aria-hidden="true">
                    <path
                        d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                </svg>
                <span>Profile</span>
                <span class="sr-only">active</span>
            </a>

            <a href="#"
                class="flex items-center rounded-md gap-2 px-2 py-1.5 text-sm font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902 1.168.188 2.352.327 3.55.414.28.02.521.18.642.413l1.713 3.293a.75.75 0 0 0 1.33 0l1.713-3.293a.783.783 0 0 1 .642-.413 41.102 41.102 0 0 0 3.55-.414c1.437-.231 2.43-1.49 2.43-2.902V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0 0 10 2ZM6.75 6a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 2.5a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z"
                        clip-rule="evenodd" />
                </svg>
                <span>Inbox</span>
            </a>

            <a href="#"
                class="flex items-center rounded-md gap-2 px-2 py-1.5 text-sm font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 2a6 6 0 0 0-6 6c0 1.887-.454 3.665-1.257 5.234a.75.75 0 0 0 .515 1.076 32.91 32.91 0 0 0 3.256.508 3.5 3.5 0 0 0 6.972 0 32.903 32.903 0 0 0 3.256-.508.75.75 0 0 0 .515-1.076A11.448 11.448 0 0 1 16 8a6 6 0 0 0-6-6ZM8.05 14.943a33.54 33.54 0 0 0 3.9 0 2 2 0 0 1-3.9 0Z"
                        clip-rule="evenodd" />
                </svg>
                <span>Notifications</span>
            </a>

            <a href="#"
                class="flex items-center rounded-md gap-2 px-2 py-1.5 text-sm font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                        clip-rule="evenodd" />
                </svg>
                <span>Settings</span>
            </a>
        </div>

        <!-- Profile Menu  -->
        <div x-data="{ menuIsOpen: false }" class="mt-auto" x-on:keydown.esc.window="menuIsOpen = false">
            <button type="button"
                class="flex w-full cursor-pointer items-center rounded-md gap-2 p-2 text-left text-neutral-600 hover:bg-black/5 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white dark:focus-visible:outline-white"
                x-bind:class="menuIsOpen ? 'bg-black/10 dark:bg-white/10' : ''" aria-haspopup="true"
                x-on:click="menuIsOpen = ! menuIsOpen" x-bind:aria-expanded="menuIsOpen">
                {{-- <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-7.webp" class="size-8 object-cover rounded-md" alt="avatar" aria-hidden="true"/> --}}
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-neutral-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="w-32 overflow-hidden text-ellipsis text-xs md:w-36"
                        aria-hidden="true">{{ Auth::user()->email }}</span>
                    <span class="sr-only">profile settings</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                    stroke-width="2" class="ml-auto size-4 shrink-0 -rotate-90 md:rotate-0" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>

            <!-- menu -->
            <div x-cloak x-show="menuIsOpen"
                class="absolute bottom-20 right-6 z-20 -mr-1 w-48 border divide-y divide-neutral-300 border-neutral-300 bg-white dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-950 rounded-md md:-right-44 md:bottom-4"
                role="menu" x-on:click.outside="menuIsOpen = false"
                x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()"
                x-transition="" x-trap="menuIsOpen">

                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </nav>

    <!-- toggle button for small screen  -->
    <button x-cloak
        class="fixed right-4 top-4 z-20 rounded-full bg-black p-4 md:hidden text-neutral-100 dark:bg-white dark:text-black"
        x-on:click="showSidebar = ! showSidebar">
        <svg x-show="showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
            class="size-5" aria-hidden="true">
            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
        </svg>
        <svg x-show="! showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
            class="size-5" aria-hidden="true">
            <path
                d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z" />
        </svg>
        <span class="sr-only">sidebar toggle</span>
    </button>
</div>
