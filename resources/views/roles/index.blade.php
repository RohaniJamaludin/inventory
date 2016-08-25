@extends('layouts.app')

@section('content')
<div class="panel-body">
        <form action="{{ url('roles/create') }}" method="GET">
            {{ csrf_field() }}

            <div class="col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add role
                    </button>
                </div>
        </form>
</div>

 <div class="panel panel-default">
            <div class="panel-heading">
                Current Roles
            </div>

            <div class="panel-body">
                <table class="table table-striped role-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Role</th>
                        <th>Edit Permission</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <!-- role Name -->
                                <td class="table-text">
                                    <div><a href="{{ url('roles', $role->id) }}">{{ $role->name }}</a></div>
                                </td>

                                <!-- role Label -->
                                <td class="table-text">
                                    <div>{{ $role->label }}</div>
                                </td>
                                <td>
                                <div><a href={{url('roles/' .$role->id. '/permission')}} class="btn btn-warning"><i class="fa fa-pencil-square"></i> Edit Permission</a>
                                </div>
                                </td>

   <td>
        <form action="{{ url('roles/' .$role->id. '/edit') }}" method="GET">
            {{ csrf_field() }}

            <button type="submit" id="update-role-{{ $role->id }}" class="btn btn-warning">
                <i class="fa fa-pencil-square"></i> Edit Role
            </button>
        </form>
    </td>


                                 <!-- Delete Button -->
    <td>
        <form action="{{ url('roles/'.$role->id. '/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-role-{{ $role->id }}" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i>Delete
            </button>
        </form>
    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection

