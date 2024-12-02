<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Explorer</title>
</head>
<body class="flex bg-[#f4f3f3] font-[poppins] pl-[16px]">
    <aside class="flex pr-2">
        <x-sidebar/>
    </aside>
    <main class="bg-white pr-4 rounded-s-[34px] p-4 w-screen">
        <h1 class="text-2xl font-medium mb-4">File Explorer</h1>
        <div class="flex flex-col gap-10">
            <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="file" class="block font-medium mb-2">Upload File:</label>
                <input 
                    type="file" 
                    name="file" 
                    id="file" 
                    required 
                    class="border p-2 rounded w-full mb-4"
                >

                <label for="folder_id" class="block font-medium mb-2">Folder ID (optional):</label>
                <input 
                    type="number" 
                    name="folder_id" 
                    id="folder_id" 
                    min="1" 
                    class="border p-2 rounded w-full mb-4"
                >

                <button 
                    type="submit" 
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                >
                    Upload
                </button>
            </form>

            <!-- Display success message -->
            @if(session('success'))
                <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </main>
</body>
</html>
