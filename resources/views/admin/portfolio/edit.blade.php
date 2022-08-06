@extends('admin.layouts.layout')
@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Portfolio</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
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
                        <h4 class="card-title">Edit Portfolio - {{ $portfolio->title }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row form-row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img" style="margin-bottom:20px;">
                                                @if($portfolio->featured_image)
                                                    <img height="150" src="{{ asset('/storage/' . $portfolio->featured_image) }}" alt="User featured_image">
                                                @endif
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span class="@error('featured_image') text-danger @enderror"><i class="fa fa-upload"></i> Upload Featured Image <span style="color:red">*</span> </span>
                                                    <input type="file" class="@error('featured_image') text-danger @enderror upload form-control" name="featured_image">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('title') text-danger @enderror">Title <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('title') border-danger @enderror form-control" name="title" value="{{ old('title', $portfolio->title) }}" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('link') text-danger @enderror">Link <span style="color:red">*</span> </label>
                                        <input type="url" class="@error('link') border-danger @enderror form-control" value="{{ old('link', $portfolio->link) }}" name="link" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="@error('description') text-danger @enderror">Description <span style="color:red">*</span> </label>
                                        <textarea class="@error('description') text-danger @enderror tinymce form-control" name="description">{{ old('description',$portfolio->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="@error('meta_title') text-danger @enderror">Meta Title</label>
                                        <input class="@error('meta_title') body-danger @enderror form-control" value="{{ old('meta_title', $portfolio->meta_title) }}" name="meta_title">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('meta_keywords') text-danger @enderror">Meta Keywords</label>
                                        <textarea class="@error('meta_keywords') text-danger @enderror form-control" name="meta_keywords">{{ old('meta_keywords', $portfolio->meta_keywords) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('meta_description') text-danger @enderror">Meta Description</label>
                                        <textarea class="@error('meta_description') text-danger @enderror form-control" name="meta_description">{{ old('meta_description', $portfolio->meta_description) }}</textarea>
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
