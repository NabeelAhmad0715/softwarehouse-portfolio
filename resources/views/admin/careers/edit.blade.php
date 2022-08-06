@extends('admin.layouts.layout')
@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Careers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('careers.index') }}">Careers</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </div>
            </div>
        </div>
        @include('common.partials.flash')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Edit Career - {{ $career->title }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('careers.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row form-row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img" style="margin-bottom:20px;">
                                                @if($career->icon)
                                                    <img height="150" src="{{ asset('/storage/' . $career->icon) }}" alt="User icon">
                                                @endif
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span class="@error('icon') text-danger @enderror"><i class="fa fa-upload"></i> Upload Icon <span style="color:red">*</span> </span>
                                                    <input type="file" class="@error('icon') text-danger @enderror upload form-control" name="icon">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('title') text-danger @enderror">Title <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('title') border-danger @enderror form-control" name="title" value="{{ old('title', $career->title) }}" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('location') text-danger @enderror">Location <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('location') border-danger @enderror form-control" value="{{ old('location', $career->location) }}" name="location" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('job_type') text-danger @enderror">Job Type <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('job_type') border-danger @enderror form-control" value="{{ old('job_type', $career->job_type) }}" name="job_type" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('job_category') text-danger @enderror">Job Category <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('job_category') border-danger @enderror form-control" value="{{ old('job_category', $career->job_category) }}" name="job_category" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="@error('description') text-danger @enderror">Description <span style="color:red">*</span> </label>
                                        <textarea class="@error('description') text-danger @enderror tinymce form-control" name="description">{{ old('description',$career->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="@error('meta_title') text-danger @enderror">Meta Title</label>
                                        <input class="@error('meta_title') body-danger @enderror form-control" value="{{ old('meta_title', $career->meta_title) }}" name="meta_title">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('meta_keywords') text-danger @enderror">Meta Keywords</label>
                                        <textarea class="@error('meta_keywords') text-danger @enderror form-control" name="meta_keywords">{{ old('meta_keywords', $career->meta_keywords) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('meta_description') text-danger @enderror">Meta Description</label>
                                        <textarea class="@error('meta_description') text-danger @enderror form-control" name="meta_description">{{ old('meta_description', $career->meta_description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
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
