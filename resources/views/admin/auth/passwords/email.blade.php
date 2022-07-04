@extends('admin.layouts.portal')

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
                    <h1>Admin Reset Password</h1>
                    <p class="account-subtitle"></p>
                    <!-- Form -->
                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @include('common.partials.flash')
                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            @isset($settings)
                                <img src="{{ asset('/storage/'. $settings->site_logo ) }}" class="img-fluid" alt="Novel Feast Login">
                            @else
                                <img src="{{ asset('assets/img/login-banner.png') }}" class="img-fluid" alt="Novel Feast Login">
                            @endisset
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Admin Reset Password</h3>
                            </div>
                            <form method="POST" action="{{ route('admin.password.email') }}">
                                @csrf
                                <div class="form-group form-focus">
                                    <input type="email" name="email" class="form-control floating" required>
                                    <label class="focus-label">Email</label>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input class="btn btn-primary btn-block btn-lg login-btn" type="submit" value="Send Password Reset Link" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
