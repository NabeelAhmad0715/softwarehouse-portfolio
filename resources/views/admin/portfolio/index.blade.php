@extends('admin.layouts.layout')

@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Portfolio</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
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
                            <h4 class="card-title">Portfolio List</h4>
                        </div>
                        <div class="col-sm-2 col">
                            <a href="{{ route('portfolio.create') }}" class="btn btn-primary float-right mt-2">Add</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($portfolio as $key => $project)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <img height="80px" style="border-radius:20px" src="{{ asset('/storage/' . $project->featured_image) }}" />
                                        </td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->link }}</td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light" href="{{ route('portfolio.edit', $project->id) }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>

                                                <a  href="#" class="btn btn-sm bg-danger-light" onclick="event.preventDefault(); if(confirm('Are you sure you want to perform this action?')){document.getElementById('delete-user-{{ $project->id }}-form').submit();}">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                                <form action="{{ route('portfolio.destroy', $project->id) }}"
                                                    id="delete-user-{{ $project->id }}-form" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-info text-center">
                                                    No Portfolio Added So Far
                                                    <br>
                                                    <a href="{{ route('portfolio.create') }}" class="mt-2 btn btn-primary">
                                                        Add A New Portfolio
                                                    </a>
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
