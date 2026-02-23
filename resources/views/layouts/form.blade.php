<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
{{-- 
    @yield('content')

    @yield('form')
    
    @yield('script') --}}

    <div class="max-w-5xl mx-auto">

        <div class="bg-white shadow-lg rounded-2xl p-6 mx-4 mb-8 mt-10">

            <h2 class="text-xl text-center font-bold mb-4 text-gray-700">
                Add New Member
            </h2>

            @yield('form')
            
        </div>


        <div class="bg-white shadow-lg rounded-2xl p-6 mx-3">

            <h2 class="text-xl font-bold mb-4 text-gray-700 text-center">
                Members
            </h2>

            @yield('table')
           
        </div>

    </div>

</body>
</html>