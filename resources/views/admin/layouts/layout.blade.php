<!DOCTYPE html>
<html lang="en">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>Titanium</title>
		<!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('images/golder.png') }}" />

		<link rel="stylesheet" href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/style.css') }}">


		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/font-awesome.min.css') }}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/feathericon.min.css') }}">

		<link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/morris/morris.css') }}">

        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/select2.min.css') }}">
		<!-- Datatables CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/datatables/datatables.min.css') }}">

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        @yield('head')
    <style>
        .card-table .card-body {
            padding: 25px;
        }
        .sidebar-menu > ul > li > a.active {
            background-color: #00d5ab;
            color: #fff;
        }

        @media only screen and (min-width: 992px){
            .mini-sidebar.expand-menu .sidebar {
                width: 250px;
            }
            .mini-sidebar.expand-menu .page-wrapper {
                margin-left: 250px;
            }
        }
        @media only screen and (min-width: 992px){
            #toggle_btn {
                margin-left: 60px;
            }
        }
        @media only screen and (min-width: 992px){
            .sidebar {
                width: 250px;
            }
            .page-wrapper {
                margin-left: 250px;
            }
        }

        @media only screen and (max-width: 991.98px){
            .sidebar {
                margin-left: -250px;
                width: 250px;
                -webkit-transition: all 0.4s ease;
                -moz-transition: all 0.4s ease;
                transition: all 0.4s ease;
                z-index: 1041;
            }
            .page-wrapper {
                margin-left: 0;
                padding-left: 0;
                padding-right: 0;
                -webkit-transition: all 0.4s ease;
                -moz-transition: all 0.4s ease;
                transition: all 0.4s ease;
            }
        }

        @media only screen and (min-width: 992px){
            #toggle_btn {
                height: 80px;
            }
        }
        .header{
            height: 80px !important;
        }
        .header .header-left{
            height: 80px;
        }
        .sidebar {
            top: 80px;
        }
        .header .header-left .logo, .header .header-left .logo img{
            line-height: 70px;
        }
        .header .header-left .logo img {
            max-height: 70px;
        }
        .top-nav-search form, .header-login{
            margin-top: 18px;
        }
        .login-wrapper .loginbox .login-left {
            background: white;
        }
        .user-menu.nav > li > a {
            line-height: 80px;
            height: 80px;
        }
        @media only screen and (max-width: 767.98px){
            .header-left .logo img {
                height: 50px;
                margin-right: 120px;
                margin-bottom: 0px;
            }
            .footer{
                margin-left:0px !important;
            }

        }
        @media only screen and (max-width: 575.98px){
            .page-wrapper > .content{
                padding: 30px 0.9375rem 0;
            }
        }
        .user-menu.nav > li > a > i {
            font-size: 1.5rem;
            line-height: 80px;
        }
        .user-menu.nav > li > a .badge {
            background-color: #00d5ab;
            top: 15px;
        }
        .dropdown-menu.notifications.show {
            top:-2px !important;
            left:-150px !important;
        }
        .table-health, .table-health th, .table-health td {
            border: 1px solid black !important;
            border-collapse: collapse;
        }
        .table-health th, .table-health td {
            padding: 5px;
            text-align: left;
        }
        .display-flex{
            display: flex;
        }
        .text-end{
            text-align: end;
        }
        .table-health tr th {
            vertical-align: middle;
        }
        .border-none{
            border:none !important;
        }
        .light-gray{
            background: #eeeeee;
        }
        .pre-wrap{
            white-space: pre-wrap;
        }
        .red{
            background:red;
            color:white;
        }
        .orange{
            background:orange;
            color:white;
        }
        .green{
            background:green;
            color:white;
        }
        .display-none{
            display: none !important;
        }
        .display-block{
            display: block !important;
        }
        @media only screen and (max-width: 991.98px){
            .mobile_btn {
                top: 17px;
            }
            .dropdown-menu.notifications.show {
                top: 70px !important;
                left: 37px !important;
            }
        }
        @media only screen and (max-width: 991.98px){
            .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
        @media only screen and (min-width: 992px){
            .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
        .table-row{
            display: table-row !important;
        }
        .pagination{
            justify-content: flex-end;
            margin-top: 20px;
        }
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
        }
        .sidebar {
            background-color: #222222;
        }
        .sidebar-menu ul ul a.active {
            color: #00d5ab !important;
        }
        .sidebar-menu li a:hover{
            color: white !important;
        }
    </style>
	</head>
	<body>
	<div class="main-wrapper">
		<!-- PAGE CONTENT -->
        @include('admin.partials.header')
            @yield('content')
	</div><!-- MAIN CONTAINER -->

	<!-- /Main Wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('admin-assets/assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin-assets/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/bootstrap.min.js') }}"></script>

    {{-- Tinymce --}}
    <script src="{{ asset('admin-assets/assets/js/tinymce/js/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/tinymce/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/tinymce/js/init-tinymce.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('admin-assets/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('admin-assets/assets/plugins/raphael/raphael.min.js') }}"></script>
    <!-- Datatables JS -->
    <script src="{{ asset('admin-assets/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('admin-assets/assets/js/select2.min.js') }}"></script>
    <!-- Custom JS -->
    <script  src="{{ asset('admin-assets/assets/js/script.js') }}"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#datepicker_date" ).datepicker({
                minDate: 0,
                dateFormat: "yy-mm-dd",
            });
        });
    </script>
    @stack('script')
</body>
</html>
