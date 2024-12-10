<div class="sidebar bg-[#f4f3f3] text-black h-full min-h-screen">
    <div class="sidebar-header p-4">
        <h2 class="text-xl font-bold">Dashboard</h2>
    </div>
    <nav class="sidebar-nav mt-4 text-sm">
        <div class="mt-4 mr-1">
            <h3 class="text-lg font-medium">General</h3>
            <a href="{{ route('view') }}" class="flex items-center flex-row gap-2 hover:bg-[#a59eff] rounded p-2 content-center active:bg-[#a59eff] focus:bg-[#a59eff]">
                <img src="{{ asset('icon/home.svg') }}" alt="navIcon">
                Home
            </a>
            <a href="#" class="flex items-center flex-row gap-2 hover:bg-[#a59eff] rounded p-2 content-center">
                <img src="{{ asset('icon/inbox.svg') }}" alt="navIcon">
                Inbox
            </a>
            <a href="#" class="flex items-center flex-row gap-2 hover:bg-[#a59eff] rounded p-2 content-center">
                <img src="{{ asset('icon/folder.svg') }}" alt="navIcon">
                File Explorer
            </a>
        </div>
    </nav>
</div>