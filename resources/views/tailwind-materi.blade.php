<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-200 w-full">
    <div class="h-screen flex items-center justify-center border border-red-500">
        <div class="w-1/3 bg-gray-300 flex flex-col space-y-3 m-8 p-8 shadow-2xl outline outline-amber-500">
            <input type="text" placeholder="Username" class="w-full outline p-1 rounded">
            <input type="password" placeholder="Password" class="w-full outline p-1 rounded">
            <button class="place-self-end bg-green-600 py-2 px-4 rounded-lg hover:bg-green-700 hover:text-white cursor-pointer">Submit</button>
        </div>
    </div>
    <div class="h-screen flex items-center justify-center mt-20 bg-red-800">
        <div class="grid grid-cols-3 p-8 gap-4">
            <div class="bg-red-200 px-6 py-10 hover:shadow-white hover:drop-shadow">
                <div class="text-xl font-bold mb-4">Lomba 1</div>
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo fugit tempore natus! Magni ipsa dolore quibusdam voluptatem, tempore mollitia soluta totam debitis reprehenderit sed! Aliquam id commodi veniam libero impedit.</div>
            </div>
            <div class="bg-red-200 px-6 py-3">
                <div class="text-xl font-bold mb-4">Lomba 2</div>
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo fugit tempore natus! Magni ipsa dolore quibusdam voluptatem, tempore mollitia soluta totam debitis reprehenderit sed! Aliquam id commodi veniam libero impedit.</div>
            </div>
            <div class="bg-red-200 px-6 py-3">
                <div class="text-xl font-bold mb-4">Lomba 3</div>
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo fugit tempore natus! Magni ipsa dolore quibusdam voluptatem, tempore mollitia soluta totam debitis reprehenderit sed! Aliquam id commodi veniam libero impedit.</div>
            </div>
            <div class="bg-red-200 px-6 py-3">
                <div class="text-xl font-bold mb-4">Lomba 4</div>
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo fugit tempore natus! Magni ipsa dolore quibusdam voluptatem, tempore mollitia soluta totam debitis reprehenderit sed! Aliquam id commodi veniam libero impedit.</div>
            </div>
        </div>
    </div>
</body>
</html>