<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <title>Document</title>
</head>
<body class="font-[poppins] flex items-center login">
    <div class="container h-screen flex flex-col items-center justify-center gap-4">
        <h1 class="text-xl font-bold mb-4">Login</h1>
        <form action="#" class="flex flex-col gap-6">
            <div class="relative w-56">
                <input type="text" id="username" class="w-full h-10 pt-2 pb-1 text-sm outline-none peer border-b-2 focus:border-[#4287f5]" required>
                <label for="username" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-sm text-gray-500 transition-all 
                    peer-focus:top-0 peer-focus:text-xs peer-focus:-translate-y-full peer-focus:text-[#4287f5]
                    peer-valid:top-0 peer-valid:text-xs peer-valid:-translate-y-full">
                    Username
                </label>
            </div>
            <div class="relative w-56">
                <input type="password" id="password" class="w-full h-10 pt-2 pb-1 text-sm outline-none peer border-b-2 focus:border-[#4287f5]" required>
                <label for="password" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-sm text-gray-500 transition-all 
                    peer-focus:top-0 peer-focus:text-xs peer-focus:-translate-y-full peer-focus:text-[#4287f5]
                    peer-valid:top-0 peer-valid:text-xs peer-valid:-translate-y-full">
                    Password
                </label>
            </div>
        </form>
        <button class="bg-[#C0392B] text-white px-6 py-2 mt-2 rounded-md hover:bg-[#912c21]">Login</button>
    </div>
</body>
</html>