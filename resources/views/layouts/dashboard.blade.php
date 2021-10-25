@extends('layouts.skeleton')

@section('app')
    <div class="wrapper">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            @include('partials.dashboard.header')
        </header>

        <div class="navbar-expand-md">
            @include('partials.dashboard.navbar')
        </div>

        <div class="page-wrapper">
            <div class="container-xl">
                @yield('page-title')
            </div>
            <div class="page-body">
                @yield('content')
            </div>
            <footer class="footer footer-transparent d-print-none">
                @include('partials.footer')
            </footer>
        </div>
    </div>
@endsection
