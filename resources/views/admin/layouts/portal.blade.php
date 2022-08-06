<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Cloudily</title>

    <!-- Favicons -->

    <link rel="shortcut icon" href="{{ asset('images/golder.png') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/font-awesome.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/style.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <![endif]-->
    {{-- <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script> --}}

    <style>
        .main-menu-wrapper {
            width: 65%;
        }

        .main-menu-wrapper li.active {
            width: 100%;
            text-align: center;
        }

        .login-wrapper .loginbox .login-left {
            background: white;
        }

        .login-left,.login-right {
            border: 2px solid #00d5ab;
        }

        .login-wrapper .loginbox .login-left {
            background: #222222 !important;
        }
    </style>
    @yield('head')
</head>

<body>
    <div class="main-wrapper login-body">
        <!-- PAGE CONTENT -->
        @yield('content')
    </div><!-- MAIN CONTAINER -->

    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin-assets/assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin-assets/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/bootstrap.min.js') }}"></script>

    <!-- Slick JS -->
    <script src="{{ asset('admin-assets/assets/js/slick.js') }}"></script>

    @stack('script')
    <!-- Custom JS -->
    <script src="{{ asset('admin-assets/assets/js/script.js') }}"></script>

</body>

</html>
