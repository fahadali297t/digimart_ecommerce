<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digimart') }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/dist/css/user.css') }}">
</head>

<body>
    @yield('content')

    {{-- js --}}
    <script src="https://kit.fontawesome.com/0e26b3244d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>
</body>

</html>
