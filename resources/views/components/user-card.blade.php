<div class="group flex rounded-md max-w-xs flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <!-- Images -->
    <div class="relative h-36"> 
        <img src="https://penguinui.s3.amazonaws.com/component-assets/card-img-5.gif" class="h-full w-full object-cover" alt="cover photo" />
        <div class="relative z-10 mx-auto -mt-14 size-28 overflow-hidden rounded-full border-4 border-neutral-50 dark:border-neutral-900">
            <!-- The 3D avatar is generated by AI using https://perchance.org/ai-character-generator with the art style of 'Cute 3D Icon'. -->
            <img src="https://penguinui.s3.amazonaws.com/component-assets/3d-avatar-1.webp" class="h-full object-cover transition duration-700 ease-out group-hover:scale-105" alt="avatar" />
        </div>
    </div>
    <!-- Body -->
    <div class="flex flex-col gap-2 p-6 text-center mt-12">
        <h3 class="text-balance text-xl font-bold text-neutral-900 lg:text-2xl dark:text-white" aria-describedby="profileDescription">{{ $user->name }}</h3>
        <span class="mx-auto w-fit bg-black px-2 py-1 text-xs text-neutral-100 dark:bg-white dark:text-black rounded-md">{{ $user->email }}</span>
        <span class="mx-auto w-fit bg-black px-2 py-1 text-xs text-neutral-100 dark:bg-white dark:text-black rounded-md">{{ $user->password }}</span>
        <p id="profileDescription" class="mt-4 text-pretty text-sm">
            Making tech products user-friendly and delightful. Looking to
            collaborate and create meaningful digital products.
        </p>
    </div>
</div>