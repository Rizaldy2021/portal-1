<div>
    <h2 class="text-gray-600">Folder</h2>
    <div class="bg-white w-full py-2 gap-3 flex flex-wrap">
        @foreach ($files as $file)
            <x-fileCard :file="$file">{{ $file->name }}</x-fileCard>
        @endforeach
    </div>
</div>