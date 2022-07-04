@extends('admin.layouts.layout')
@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Create</li>

                    </ul>
                </div>
            </div>
        </div>
        @include('common.partials.flash')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Add A New User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="logo">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('name') text-danger @enderror">Name</label>
                                        <input type="text" class="@error('name') border-danger @enderror form-control" name="name" value="{{ old('name') }}" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('contact_person') text-danger @enderror">Contact Person</label>
                                        <input type="text" class="@error('contact_person') border-danger @enderror form-control" value="{{ old('contact_person') }}" name="contact_person" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('email') text-danger @enderror">Email</label>
                                        <input type="email" class="@error('email') border-danger @enderror form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('phone') text-danger @enderror">Phone</label>
                                        <input type="tel" class="@error('phone') border-danger @enderror form-control" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('about') text-danger @enderror">About</label>
                                        <textarea class="@error('about') body-danger @enderror form-control" name="about" required>{{ old('about') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('address') text-danger @enderror">Address</label>
                                        <textarea class="@error('address') text-danger @enderror form-control" name="address" required>{{ old('address') }}</textarea>
                                    </div>
                                </div>
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
<div style="margin-left: 400px">
@include('admin.partials.footer')
</div>
@endsection
