<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Home') &mdash; {{ env('APP_NAME') }}</title>

    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Tabler Styles -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tabler/dist/css/demo.min.css') }}" rel="stylesheet">

    @stack('stylesheet')
</head>
<body class="antialiased">
    @yield('app')

    <!-- Scripts -->
    <script src="{{ asset('tabler/dist/js/tabler.min.js') }}"></script>

    @yield('javascript')
</body>
</html>
