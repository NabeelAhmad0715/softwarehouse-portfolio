@extends('admin.layouts.layout')

@section('content')
@include('admin.partials.sidebar')
<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    @if (auth()->user()->is_master == 1)
                        <h3 class="page-title">Welcome Super Admin</h3>
                    @else
                        <h3 class="page-title">Welcome Administrator</h3>
                    @endif
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ul>
                </div>
            </div>
        </div>
        @include('common.partials.flash')
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <!-- Recent Orders -->
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.change-password.update') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-md-12">
                                    <div id="show_hide_password" class="form-group">
                                        <label>Current Password</label>
                                        <div style="display:flex">
                                            <input class="form-control" type="password" name="password"  placeholder="Password">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 col-md-6">
                                    <div id="show_hide_password_new" class="form-group">
                                        <label>New Password</label>
                                        <div style="display:flex">
                                            <input type="password" class="form-control" name="new_password" required >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @error('new_password')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 col-md-6">
                                    <div id="show_hide_password_confirm" class="form-group">
                                        <label>Confirm Password</label>
                                        <div style="display:flex">
                                            <input type="password" class="form-control" name="confirm_password" required >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @error('confirm_password')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
        </div>

    </div>
</div>
<div style="margin-left: 400px">
@include('admin.partials.footer')
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

            $("#show_hide_password_new .input-group-prepend span a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password_new input').attr("type") == "text"){
                    $('#show_hide_password_new input').attr('type', 'password');
                    $('#show_hide_password_new .input-group-prepend span a i').addClass( "fa-eye-slash" );
                    $('#show_hide_password_new .input-group-prepend span a i').removeClass( "fa-eye" );
                }else if($('#show_hide_password_new input').attr("type") == "password"){
                    $('#show_hide_password_new input').attr('type', 'text');
                    $('#show_hide_password_new .input-group-prepend span a i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password_new .input-group-prepend span a i').addClass( "fa-eye" );
                }
            });

            $("#show_hide_password_confirm .input-group-prepend span a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password_confirm input').attr("type") == "text"){
                    $('#show_hide_password_confirm input').attr('type', 'password');
                    $('#show_hide_password_confirm .input-group-prepend span a i').addClass( "fa-eye-slash" );
                    $('#show_hide_password_confirm .input-group-prepend span a i').removeClass( "fa-eye" );
                }else if($('#show_hide_password_confirm input').attr("type") == "password"){
                    $('#show_hide_password_confirm input').attr('type', 'text');
                    $('#show_hide_password_confirm .input-group-prepend span a i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password_confirm .input-group-prepend span a i').addClass( "fa-eye" );
                }
            });
        });
    </script>
@endpush
