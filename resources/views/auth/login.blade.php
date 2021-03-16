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

    <link rel="shortcut icon"
        href="https://binamegah.com/wp-content/uploads/2020/09/cropped-favicon-logo-bmi1-32x32.png" />

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    {{-- metismenu --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/costume.css') }}">
</head>

<body>
    {{--class="not-remove sidebar-folded"--}}
    <div class="main-wrapper" id="app">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper"
                                        style="background-image: url(https://binamegah.com/wp-content/uploads/2014/03/Warehouse.jpg)">

                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">SIBMI <span>WEB</span></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Sistem Informasi Inventory BMI
                                        </h5>
                                        <form class="forms-sample" method="post" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input name="email" type="email"
                                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    id="exampleInputEmail1" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input name="password" type="password"
                                                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    id="exampleInputPassword1" autocomplete="current-password"
                                                    placeholder="Password">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit"
                                                    href="https://www.nobleui.com/laravel/template/light"
                                                    class="btn btn-primary mr-2 mb-2 mb-md-0">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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