@extends('admin.layouts.layout')

@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Careers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('careers.index') }}">Careers</a></li>
                        <li class="breadcrumb-item active">{{ $career->title }}</li>
                        <li class="breadcrumb-item active">Jobs</li>
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
                    <div class="card-header" style="display: flex">
                        <div class="col-sm-10 col" style="margin-top:10px;">
                            <h4 class="card-title">Jobs List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jobs as $key => $job)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->email }}</td>
                                        <td>{{ $job->phone }}</td>
                                        <td>{{ $job->city }}</td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-primary-light" target="blank" href="{{ asset('/storage/' . $job->cv) }}">
                                                    <i class="fe fe-work"></i> View Cv
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-info text-center">
                                                    No Jobs Recieved So Far
                                                    <br>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
