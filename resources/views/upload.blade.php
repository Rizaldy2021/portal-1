<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Explorer</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> --}}
</head>
<body class="flex bg-[#f4f3f3] font-[poppins] pl-[16px]">
    <aside class="flex pr-2">
        <x-sidebar/>
    </aside>
    <main class="bg-white pr-4 rounded-s-[34px] p-4 w-screen drop-zone filepond" id="drop-zone">
        <h1 class="text-2xl font-medium mb-4">File Explorer</h1>
        <div class="flex flex-col gap-10" id="drop-element">
            <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="file" class="block font-medium mb-2">Upload File:</label>
                <input 
                    type="file" 
                    name="file[]" 
                    id="filepond" 
                    required 
                    class="border p-2 rounded w-full mb-4 filepond"
                    multiple
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

            <form action="{{ route('folders.store') }}" method="POST">
                @csrf
                <label for="name" class="block font-medium mb-2">Folder Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required 
                    class="border p-2 rounded w-full mb-4"
                >
            
                <label for="description" class="block font-medium mb-2">Folder Description (optional):</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="3" 
                    class="border p-2 rounded w-full mb-4"
                ></textarea>
            
                <!-- Change parent_id to a text input -->
                <label for="parent_id" class="block font-medium mb-2">Parent Folder ID (optional):</label>
                <input 
                    type="text" 
                    name="parent_id" 
                    id="parent_id" 
                    value="{{ old('parent_id') }}" 
                    placeholder="Enter parent folder ID (optional)" 
                    class="border p-2 rounded w-full mb-4"
                >
            
                <button 
                    type="submit" 
                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600"
                >
                    Create Folder
                </button>
            </form>

            <!-- Display success message -->
            @if(session('success'))
                <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <script>
            // Get the drop zone and file input
            const dropZone = document.getElementById('drop-zone');
            const fileInput = document.getElementById('filepond');
    
            // Add dragover event to allow dropping
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('dragging'); // Change the drop zone style
            });
    
            // Remove the "dragging" style when dragging leaves the drop zone
            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('dragging');
            });
    
            // Handle the drop event
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('dragging'); // Remove the "dragging" style
    
                // Get the dropped files and add them to the file input
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files; // Set the files of the input element
                }
            });
    
            // Optional: Trigger file input click when the drop zone is clicked
            dropZone.addEventListener('click', () => {
                fileInput.click();
            });
    
            // Optional: Handle file selection via the file input
            fileInput.addEventListener('change', (e) => {
                // You can handle the selected files if needed here
                const files = e.target.files;
                console.log(files); // Log the selected files
            });
        </script>
        
    </main>
</body>
</html>
