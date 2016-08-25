@extends('layouts.app')

@section('content')
<div class="panel-body">
        <form action="{{ url('permissions/create') }}" method="GET">
            {{ csrf_field() }}

            <div class="col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Permission
                    </button>
                </div>
        </form>
</div>

 <div class="panel panel-default">
            <div class="panel-heading">
                Current Permissions
            </div>

            <div class="panel-body">
                <table class="table table-striped permission-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Permission</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <!-- Permission Name -->
                                <td class="table-text">
                                    <div><a href="{{ url('permissions', $permission->id) }}">{{ $permission->name }}</a></div>
                                </td>

                                <!-- Permission Label -->
                                <td class="table-text">
                                    <div>{{ $permission->label }}</div>
                                </td>

                                 <!-- Edit Button -->
    <td>
        <form action="{{ url('permissions/'.$permission->id. '/edit') }}" method="GET">
            {{ csrf_field() }}

            <button type="submit" id="update-permission-{{ $permission->id }}" class="btn btn-warning">
                <i class="fa fa-pencil-square"></i> Edit
            </button>
        </form>
    </td>

                                 <!-- Delete Button -->
    <td>
        <form action="{{ url('permissions/'.$permission->id.'/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-permission-{{ $permission->id }}" class="btn btn-danger">
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

