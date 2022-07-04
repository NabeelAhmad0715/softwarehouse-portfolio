@extends('admin.layouts.layout')
@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Industries</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('industries.index') }}">Industries</a></li>
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
                        <h4 class="card-title">Add A New Industry</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('industries.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <div class="change-avatar">
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
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span class="@error('body_image') text-danger @enderror"><i class="fa fa-upload"></i> Upload Body Image <span style="color:red">*</span> </span>
                                                    <input type="file" class="@error('body_image') text-danger @enderror upload form-control" name="body_image">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('title') text-danger @enderror">Title <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('title') border-danger @enderror form-control" name="title" value="{{ old('title') }}" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('address') text-danger @enderror">Address <span style="color:red">*</span> </label>
                                        <input type="text" class="@error('address') border-danger @enderror form-control" value="{{ old('address') }}" name="address" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('display_order') text-danger @enderror">Display Order <span style="color:red">*</span> </label>
                                        <input type="number" class="@error('display_order') border-danger @enderror form-control" name="display_order" value="{{ old('display_order') }}" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('bg_color') text-danger @enderror">Background Color <span style="color:red">*</span> </label>
                                        <input type="color" class="@error('bg_color') border-danger @enderror form-control" name="bg_color" value="{{ old('bg_color') }}" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="@error('description') text-danger @enderror">Description <span style="color:red">*</span> </label>
                                        <textarea class="@error('description') text-danger @enderror tinymce form-control" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="@error('meta_title') text-danger @enderror">Meta Title</label>
                                        <input class="@error('meta_title') body-danger @enderror form-control" value="{{ old('meta_title') }}" name="meta_title">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('meta_keywords') text-danger @enderror">Meta Keywords</label>
                                        <textarea class="@error('meta_keywords') text-danger @enderror form-control" name="meta_keywords">{{ old('meta_keywords') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="@error('meta_description') text-danger @enderror">Meta Description</label>
                                        <textarea class="@error('meta_description') text-danger @enderror form-control" name="meta_description">{{ old('meta_description') }}</textarea>
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
