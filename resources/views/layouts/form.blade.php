<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="bg-violet-500 min-h-screen">
{{-- 
    @yield('content')

    @yield('form')
    
    @yield('script') --}}
    <div class="mt-6 mb-6">
        <h1 class="text-6xl text-center font-extrabold tracking-tight pb-2 
           bg-gradient-to-r from-green-600 via-cyan-500 to-yellow-600 
           bg-clip-text text-transparent drop-shadow-[0_0_30px_#FFFFFF] 
           [-webkit-text-stroke:1px_#000000] leading-normal">
            Manajemen Tugas Kuliah
        </h1>
    </div>

    <div class="max-w-5xl mx-auto">

        <div class="bg-white shadow-lg rounded-2xl p-6 mx-4 mb-8">

            <h2 class="text-xl text-center font-bold mb-4 text-gray-700">
                {{ $title ?? 'Add Task' }}
            </h2>

            @yield('form')
            
        </div>


        <div class="bg-white shadow-lg rounded-2xl p-6 mx-3 mb-6">

            <h2 class="text-xl font-bold mb-4 text-gray-700 text-center">
                Tasks
            </h2>

            @yield('table')
           
        </div>

    </div>

</body>
</html>