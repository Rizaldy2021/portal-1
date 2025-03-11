<div class="flex flex-row rounded-md w-full bg-slate-200 p-2 justify-between shadow-sm flex-grow user-card"
    data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" data-user-email="{{ $user->email }}"
    data-user-password="{{ $user->password_real ?? 'N/A' }}">
    <div class="flex flex-col">
        <span class="font-bold">{{ $user->name }}</span>
        <span class="text-gray-600 text-sm">{{ $user->email }}</span>
        <span class="text-gray-600 text-sm">{{ $user->password_real ?? 'N/A' }}</span>
    </div>

    <div class="flex flex-row gap-3 w-fit items-center" x-data>
        <button class="rounded-full bg-red-600 w-fit h-fit p-1 hover:bg-red-800"
            x-on:click="$dispatch('open-modal', 'delete-user-modal')">
            <img src="{{ asset('icon/delete.svg') }}" alt="deleteicon" class="w-[20px]">
        </button>

        <button class="rounded-full bg-blue-600 w-fit h-fit p-1 hover:bg-blue-800"
            @click="window.editUser($event.currentTarget.dataset.userId)" data-user-id="{{ $user->id }}"
            data-user-name="{{ $user->name }}" data-user-email="{{ $user->email }}"
            data-user-password="{{ $user->password_real ?? 'N/A' }}" id="edit-user-btn">
            <img src="{{ asset('icon/edit.svg') }}" class="w-[20px]" alt="editicon">
        </button>
    </div>
</div>
