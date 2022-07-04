@extends('admin.layouts.layout')

@section('content')
@include('admin.partials.sidebar')

<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
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
                            <h4 class="card-title">Users List</h4>
                        </div>
                        <div class="col-sm-2 col">
                            <a href="{{ route('users.create') }}" class="btn btn-primary float-right mt-2">Add</a>
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
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <select data-status-id="{{ $user->id }}" class="activeInactive form-control" name="is_active"
                                                    id="is_active">
                                                <option {{ $user->status == 1 ? 'selected' : '' }} value="1" name="hidden_is_active" class="hidden_is_active" id="hidden_is_active" >Active</option>
                                                <option {{ $user->status == 0 ? 'selected' : '' }} value="0" name="hidden_is_active" class="hidden_is_active" id="hidden_is_active">Inactive</option>
                                            </select>
                                        </td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-primary-light" href="{{ route('admin.users.change-password', $user->id) }}">
                                                    <i class="fe fe-lock"></i> Change Password
                                                </a>
                                                <a class="btn btn-sm bg-success-light" href="{{ route('users.edit', $user->id) }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>

                                                <a  href="#" class="btn btn-sm bg-danger-light" onclick="event.preventDefault(); if(confirm('Are you sure you want to perform this action?')){document.getElementById('delete-user-{{ $user->id }}-form').submit();}">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}"
                                                    id="delete-user-{{ $user->id }}-form" method="POST"
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
                                                    No Users Added So Far
                                                    <br>
                                                    <a href="{{ route('users.create') }}" class="mt-2 btn btn-primary">
                                                        Add A New User
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
