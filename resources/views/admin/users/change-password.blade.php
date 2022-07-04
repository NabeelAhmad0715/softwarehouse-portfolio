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
                        <li class="breadcrumb-item active">Change Password</li>
                    </ul>
                </div>
            </div>
        </div>
        @include('common.partials.flash')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Change Password - {{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update-password', [$user->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-semibold @error('new_password') text-danger @enderror">New Password <span
                                        class="text-red">*</span></label>
                                <div class="form-group-feedback form-group-feedback-right">
                                    <input type="password" name="new_password" value="{{ old('new_password') }}"
                                        class="form-control @error('new_password') border-danger @enderror" required>
                                    @error('new_password')
                                    <div class="form-control-feedback text-danger">
                                        <i class="icon-cancel-circle2"></i>
                                    </div>
                                    @enderror
                                </div>
                                @error('new_password')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-semibold @error('confirm_password') text-danger @enderror">Confirm Password <span
                                        class="text-red">*</span></label>
                                <div class="form-group-feedback form-group-feedback-right">
                                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}"
                                        class="form-control @error('confirm_password') border-danger @enderror" required>
                                    @error('confirm_password')
                                    <div class="form-control-feedback text-danger">
                                        <i class="icon-cancel-circle2"></i>
                                    </div>
                                    @enderror
                                </div>
                                @error('confirm_password')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
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
