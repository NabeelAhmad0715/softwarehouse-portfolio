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
                            <h4 class="card-title">Careers List</h4>
                        </div>
                        <div class="col-sm-2 col">
                            <a href="{{ route('careers.create') }}" class="btn btn-primary float-right mt-2">Add</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Job Type</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($careers as $key => $career)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $career->title }}</td>
                                        <td>{{ $career->location }}</td>
                                        <td>{{ $career->job_type }}</td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-primary-light" href="{{ route('careers.jobs', $career->id) }}">
                                                    <i class="fe fe-document"></i> Jobs
                                                </a>

                                                <a class="btn btn-sm bg-success-light" href="{{ route('careers.edit', $career->id) }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>

                                                <a  href="#" class="btn btn-sm bg-danger-light" onclick="event.preventDefault(); if(confirm('Are you sure you want to perform this action?')){document.getElementById('delete-user-{{ $career->id }}-form').submit();}">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                                <form action="{{ route('careers.destroy', $career->id) }}"
                                                    id="delete-user-{{ $career->id }}-form" method="POST"
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
                                                    No Careers Added So Far
                                                    <br>
                                                    <a href="{{ route('careers.create') }}" class="mt-2 btn btn-primary">
                                                        Add A New Career
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
@push('script')
    <script>
        $('.activeInactive').change(function(status){
            var user_id = this.getAttribute('data-status-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'get',
                url: "/admin/"+ user_id +"/set-status/"+status.target.value,
                dataType: 'json',
                success:function(data){
                    if(data == 'done')
                    {
                        $('#status').bootstrapToggle('on');
                    }
                }
            });
        });
    </script>
@endpush
