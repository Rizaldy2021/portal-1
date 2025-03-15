<div>
    <h2 class="text-gray-600">Folder</h2>
    <div class="bg-white w-full py-2 gap-3 grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
        @foreach ($files as $file)
            <x-fileCard :file="$file">{{ $file->name }}</x-fileCard>
        @endforeach
    </div>
</div>
