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
                        <li class="breadcrumb-item active">General Settings</li>
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
                        <h4 class="card-title">General Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('general-settings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img" style="margin-bottom:20px;">
                                                <img height="150" src="{{ asset('assets/img/patients/patient.jpg') }}" alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Site Logo</span>
                                                    <input type="file" class="upload form-control" name="site_logo">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('site_logo')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img" style="margin-bottom:20px;">
                                                <img height="150" src="{{ asset('assets/img/patients/patient.jpg') }}" alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Favicon</span>
                                                    <input type="file" class="upload form-control" name="favicon_icon">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('favicon_icon')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Site Name</label>
                                        <input type="text" class="form-control" name="site_name" required >
                                    </div>
                                </div>
                                @error('site_name')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Admin Email</label>
                                        <input type="email" class="form-control" name="admin_email" required >
                                    </div>
                                </div>
                                @error('admin_email')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
        </div>

    </div>
</div>


{{-- <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <!-- Profile Sidebar -->
                <div class="profile-sidebar">
                    <div class="widget-profile pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                                <img src="{{ asset('/storage/' . $settings->site_logo) }}" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3>{{ auth()->user()->username }}</h3>
                            </div>
                        </div>
                    </div>
                    @include('admin.partials.sidebar')
                </div>
                <!-- /Profile Sidebar -->

            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="page-wrapper">
                    <div class="content container-fluid">
                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-7 col-auto">
                                    <h3 class="page-title">General Settings</h3>
                                    <ul class="breadcrumb" style="padding-left: 0;padding: 10px 0px;background:transparent;">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.home') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">General Settings</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('general-settings.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row form-row">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="change-avatar">
                                                            <div class="profile-img">
                                                                <img src="{{ asset('assets/img/patients/patient.jpg') }}" alt="User Image">
                                                            </div>
                                                            <div class="upload-img">
                                                                <div class="change-photo-btn">
                                                                    <span><i class="fa fa-upload"></i> Upload Site Logo</span>
                                                                    <input type="file" class="upload" name="site_logo">
                                                                </div>
                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('site_logo')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="change-avatar">
                                                            <div class="profile-img">
                                                                <img src="{{ asset('assets/img/patients/patient.jpg') }}" alt="User Image">
                                                            </div>
                                                            <div class="upload-img">
                                                                <div class="change-photo-btn">
                                                                    <span><i class="fa fa-upload"></i> Upload Favicon</span>
                                                                    <input type="file" class="upload" name="favicon_icon">
                                                                </div>
                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('favicon_icon')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Site Name</label>
                                                        <input type="text" class="form-control" name="site_name" required >
                                                    </div>
                                                </div>
                                                @error('site_name')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Admin Email</label>
                                                        <input type="email" class="form-control" name="admin_email" required >
                                                    </div>
                                                </div>
                                                @error('admin_email')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="submit-section">
                                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
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
</div> --}}
<div style="margin-left: 400px">
@include('admin.partials.footer')
</div>  @endsection
