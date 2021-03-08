<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BMI</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">

    @yield('plugins_css')

    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="shortcut icon" href="https://binamegah.com/wp-content/uploads/2020/09/cropped-favicon-logo-bmi1-32x32.png" />

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    {{-- metismenu --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/costume.css') }}">
</head>

<body style="overflow: scroll">
    {{--class="not-remove sidebar-folded"--}}
    <div class="main-wrapper" id="app">
        {{-- @include('components.sidebar.mysidebar') --}}
        <navigation></navigation>
        <div class="page-wrapper">
            {{-- <x-navbar.navbar/> --}}
            <navbar></navbar>
            {{-- @include('components.navbar.navbar') --}}

            <div class="page-content">
                <router-view></router-view>
            </div>
            {{-- @yield('content') --}}
            {{-- ISI --}}

            {{-- <x-footer/> --}}
            <bawahan></bawahan>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>

    {{-- @stack('plugins_js') --}}
    @yield('plugins_js')

    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>


    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>

    {{-- @stack('scripts') --}}
    @yield('scripts')

    {{-- metismenu --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
    <script>
        $(function() {
            $('#menu1').metisMenu();
        });
    </script>


</body>

</html>