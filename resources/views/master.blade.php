<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- alpinejs --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/hat-graduation-png-5.png')}}">
    <title>CAP College Assurance Plan Philippines</title>
</head>
<body>
    @include('navbar')
    
    @yield('body')
</body>
</html>