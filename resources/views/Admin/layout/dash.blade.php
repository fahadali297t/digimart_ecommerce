<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chawkbazar | Admin Dashboard</title>
    <!-- CSS files -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/logo.png') }}" type="image/x-icon">
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css') }}">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-3gJwYp8G4PVnYf3UnIFJQGryDxkS7Ms6kM3H2H+zSZo=" crossorigin="anonymous"></script>

</head>

<body>


    @yield('content')
    <script src="{{ asset('assets/dist/js/tabler.min.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/0e26b3244d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/dist/js/custom.js ') }}"></script>

</body>

</html>
