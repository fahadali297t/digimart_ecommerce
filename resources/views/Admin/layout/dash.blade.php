<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>DigiMart | Admin Dashboard</title>
    <!-- CSS files -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/logo.png') }}" type="image/x-icon">
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/demo.min.css') }}" rel="stylesheet"/>
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
  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>


    @yield('content')
    <script src="{{ asset('assets/dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/dist/js/demo.min.js') }}" defer></script>

  </body>
</html>