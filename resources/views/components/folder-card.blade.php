<div class="folder-card relative flex items-center gap-4 bg-[#F2F1FF] haver:bg-blue-200 rounded p-2 w-full shadow flex-grow"
    data-folder-id="{{ $folder->id }}" data-folder-name="{{ $folder->name }}"
    data-update-url="{{ route('folders.update', ':folder_id') }}">
    <a href="{{ route('folders.show', $folder->id) }}" class="flex items-center gap-2 flex-grow min-w-0">
        <img src="{{ asset('icon/folder2.svg') }}" alt="" class="w-[20px]">
        <span class="truncate" title="{{ $folder->name }}">{{ $slot }}</span>
    </a>
    <div x-data="{ isOpen: false, openedWithKeyboard: false }" class="w-fit flex items-center lg:hidden"
        x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
        <!-- Toggle Button -->
        <button type="button" x-on:click="isOpen = ! isOpen"
            class="inline-flex items-center gap-2 whitespace-nowrap rounded-sm" aria-haspopup="true"
            x-on:keydown.space.prevent="openedWithKeyboard = true"
            x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.down.prevent="openedWithKeyboard = true"
            x-bind:class="isOpen || openedWithKeyboard ? 'text-neutral-900 dark:text-white' :
                'text-neutral-600 dark:text-neutral-300'"
            x-bind:aria-expanded="isOpen || openedWithKeyboard">
            <img src="{{ asset('icon/menu.svg') }}" alt="menu icon" class="w-[20px]">
        </button>
        <!-- Dropdown Menu -->
        <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
            x-on:click.outside="isOpen = false, openedWithKeyboard = false"
            x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()"
            class="absolute top-11 left-0 flex w-fit min-w-48 flex-col overflow-hidden rounded-sm border border-neutral-300 bg-neutral-50 py-1.5"
            role="menu">
            <button
                class="rename-folder-btn bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden flex items-start">
                Rename Folder</button>
            <button
                class="delete-folder-btn bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden flex items-start">
                Delete Folder</button>
        </div>
    </div>
</div>
