@extends('admin.layouts.portal')

@section('content')
<div class="login-wrapper">
    <div class="container">
        <div class="loginbox">
            <div class="login-left">
                <img class="img-fluid" src="{{ asset('images/logo/logo-in-different-style.png') }}" alt="Logo">
            </div>
            <div class="login-right">
                <div class="login-right-wrap">
                    @include('common.partials.flash')
                    <h1>Admin Login</h1>
                    <p class="account-subtitle">Access Our Dashboard</p>
                    <!-- Form -->
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                        </div>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div id="show_hide_password" class="form-group input-group">
                            <input class="form-control" type="password" name="password"  placeholder="Password">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                    </form>
                    <!-- /Form -->

                    <div class="text-center forgotpass"><a href="{{ route('admin.password.request') }}">Forgot Password?</a></div>
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
