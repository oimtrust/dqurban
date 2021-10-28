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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    @stack('stylesheet')
</head>
<body class="antialiased">
    @yield('app')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('tabler/dist/libs/choices.js/choices.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('tabler/dist/js/tabler.min.js') }}"></script>

    @yield('javascript')
    @include('sweetalert::alert')
</body>
</html>
