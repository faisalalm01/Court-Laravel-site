<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link rel="stylesheet" href="{{ asset('css/datatables-tailwind.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/custom.css'])

</head>

<body class="leading-normal tracking-normal bg-gray-100">
    <div id="app">
        @yield('main_content')
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>   
</body>

</html>