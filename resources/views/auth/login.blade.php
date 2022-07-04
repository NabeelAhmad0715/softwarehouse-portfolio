@extends('frontend.layouts.app')

@section('head')
    <title>Login Panel | Novel Feast</title>
    <meta name="description" content="Novel Feast">
    <meta name="keywords" content="Novel Feast">
@endsection

@section('content')
<div class="login-wrapper">
    <div class="container">
        <div class="loginbox">
            <div class="login-left">
                <img class="img-fluid" src="{{ asset('admin-assets/assets/img/logo-qhsms.png') }}" alt="Logo">
            </div>
            <div class="login-right">
                <div class="login-right-wrap">
                    @include('common.partials.flash')
                    <h1>Client Login</h1>
                    <p class="account-subtitle">Access Our Dashboard</p>
                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="email" name="email"  placeholder="Email">
                        </div>
                        <div id="show_hide_password" class="form-group input-group">
                            <input class="form-control" type="password" name="password"  placeholder="Password">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                    </form>
                    <!-- /Form -->

                    <div class="text-center forgotpass"><a href="{{ route('password.request') }}">Forgot Password?</a></div>
                    <div class="login-or">
                        <span class="or-line"></span>
                        <span class="span-or">or</span>
                    </div>
                    <!-- /Social Login -->

                    <div class="text-center dont-have">Don’t have an account? <a href="{{ route('register') }}">Register</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#show_hide_password .input-group-prepend span a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password .input-group-prepend span a i').addClass( "fa-eye-slash" );
                    $('#show_hide_password .input-group-prepend span a i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password .input-group-prepend span a i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password .input-group-prepend span a i').addClass( "fa-eye" );
                }
            });
        });
    </script>
@endpush
