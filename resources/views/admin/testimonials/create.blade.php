@extends('admin.layouts.layout')
@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Testimonails</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('testimonials.index') }}">Testimonails</a></li>
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
                        <h4 class="card-title">Add A New Testimonail</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span class="@error('image') text-danger @enderror"><i class="fa fa-upload"></i> Upload Image <span style="color:red">*</span> </span>
                                                    <input type="file" class="@error('image') text-danger @enderror upload form-control" name="image">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('name') text-danger @enderror">Name <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('name') border-danger @enderror form-control" name="name" value="{{ old('name') }}" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="@error('message') text-danger @enderror">Message <span style="color:red">*</span> </label>
                                        <textarea class="@error('message') text-danger @enderror form-control" name="message">{{ old('message') }}</textarea>
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
