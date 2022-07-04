@extends('frontend.layouts.app')

@section('head')
    <title>Homepage | Novel Feast</title>
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
                    <h1>Register</h1>
                    <p class="account-subtitle">To Access Our Dashboard</p>
                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="company_name" placeholder="Company Name" class="form-control" required>
                        </div>
                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="contact_person" placeholder="Contact Person" class="form-control" required>
                        </div>
                        @error('contact_person')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <input type="file" name="logo" placeholder="Logo" class="form-control" required>
                        </div>
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Phone" class="form-control" required>
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="business_category" placeholder="Industry/Business Sector" class="form-control" required>
                        </div>
                        @error('business_category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="reference_prefix" placeholder="Reference Prefix" class="form-control" required>
                        </div>
                        @error('reference_prefix')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <textarea  name="about" placeholder="About" class="form-control" required></textarea>
                        </div>
                        @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <textarea  name="address" placeholder="Address" class="form-control" required></textarea>
                        </div>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block" type="submit">Register</button>
                        </div>
                    </form>
                    <!-- /Form -->
                    <div class="login-or">
                        <span class="or-line"></span>
                        <span class="span-or">or</span>
                    </div>
                    <!-- /Social Login -->

                    <div class="text-center dont-have">Already have an account? <a href="{{ route('login') }}">Login</a></div>
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
                                <h3>Client Register</h3>
                            </div>
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-focus">
                                    <input type="text" name="title" class="form-control floating" required>
                                    <label class="focus-label">Title</label>
                                </div>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <input type="text" name="name" class="form-control floating" required>
                                    <label class="focus-label">Name</label>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <input type="email" name="email" class="form-control floating" required>
                                    <label class="focus-label">Email</label>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <input type="file" name="logo" class="form-control floating" required>
                                    <label class="focus-label">Logo</label>
                                </div>
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <input type="text" name="phone" class="form-control floating" required>
                                    <label class="focus-label">Phone</label>
                                </div>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <input type="text" name="business_category" class="form-control floating" required>
                                    <label class="focus-label">Business Category</label>
                                </div>
                                @error('business_category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <input type="password" name="password" class="form-control floating" required>
                                    <label class="focus-label">Password</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <input type="password" name="password_confirmation" class="form-control floating" required>
                                    <label class="focus-label">Confirm Password</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <textarea  name="about" class="form-control floating" required></textarea>
                                    <label class="focus-label">About</label>
                                </div>
                                @error('about')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group form-focus">
                                    <textarea  name="address" class="form-control floating" required></textarea>
                                    <label class="focus-label">Address</label>
                                </div>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="text-right">
                                    <a class="forgot-link" href="{{ route('login') }}">Already have an account?</a>
                                </div>
                                <input class="btn btn-primary btn-block btn-lg login-btn" type="submit" value="Login" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
