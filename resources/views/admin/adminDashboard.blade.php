@extends($layout)

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('File Explorer') }}
    </h2>
@endsection

@section('content')
    <div :folders="$folders" class="w-full">
        <div class="bg-white p-4 h-full w-full flex flex-wrap" id="file-explorer">
            <div class="flex flex-col gap-4 drop-zone w-full" id="drop-element">
                @include('files.index')
                @include('folders.index')
            </div>
        </div>

        @include('components.modals.new-folder-modal')
        @include('components.modals.file-upload-modal')
        {{-- @include('components.modals.edit-user-modal') --}}
    </div>

    {{-- <div x-data="{ openMenu: false }" class="relative">
        <!-- Blur background -->
        <div x-show="openMenu" x-transition.opacity class="fixed inset-0 bg-black/20 backdrop-blur-sm z-10"
            @click="openMenu = false"></div>

        <!-- FAB + Menu -->
        <div class="fixed right-4 bottom-8 z-20 flex flex-col items-end gap-3">
            <template x-if="openMenu">
                <div class="flex flex-col items-end gap-3 mb-2">
                    <button
                        class="w-14 h-14 rounded-full backdrop-blur-md bg-white/30 shadow-lg flex items-center justify-center hover:bg-white/50 transition"
                        x-on:click="$dispatch('open-modal', 'new-folder-modal')">
                        <i class="fas fa-folder-plus text-xl text-black"></i>
                    </button>
                    <button
                        class="w-14 h-14 rounded-full backdrop-blur-md bg-white/30 shadow-lg flex items-center justify-center hover:bg-white/50 transition"
                        x-on:click="$dispatch('open-modal', 'file-upload-modal')">
                        <i class="fas fa-upload text-xl text-black"></i>
                    </button>
                </div>
            </template>

            <!-- Tombol utama -->
            <button
                class="w-16 h-16 rounded-full bg-blue-500 text-white shadow-xl flex items-center justify-center hover:bg-blue-600 transition md:hidden"
                @click="openMenu = !openMenu">
                <svg x-show="!openMenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-8 h-8">
                    <path fill-rule="evenodd"
                        d="M12 2a1 1 0 0 1 1 1v8h8a1 1 0 1 1 0 2h-8v8a1 1 0 1 1-2 0v-8H3a1 1 0 1 1 0-2h8V3a1 1 0 0 1 1-1z"
                        clip-rule="evenodd" />
                </svg>
                <svg x-show="openMenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="w-6 h-6">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </button>
        </div>
    </div> --}}


    {{-- <button x-cloak
        class="fixed right-4 bottom-8 z-20 rounded-full bg-blue-400 p-4 md:hidden text-black dark:bg-black dark:text-white"
        x-on:click="showSidebar = ! showSidebar">
        <svg x-show="showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5"
            aria-hidden="true">
            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
        </svg>
        <span class="sr-only">sidebar toggle</span>
    </button> --}}

    @vite('resources/js/contextMenu.js')
@endsection
