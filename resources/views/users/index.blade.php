@extends('layouts.app')

@section('content')

<div class="panel-body">

<h1>All Users</h1>

<p><a href="{{ url('users/create') }}" class = 'btn btn-primary' > Add new user </a></p>

@if ($users->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>Username</th>
                <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>

          <td>{{ $user->email }}</td>
          <td>{{ $user->roles()->lists('name')->first() }}</td>
          <td>{{ $user->address }}</td>
                    <td> <a href="{{ url('users/'.$user->id. '/edit') }}" class="btn btn-warning"> Edit</a></td>
                    <td>
            <form action="{{ url('users/'.$user->id. '/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> Delete
            </button>
        </form>
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    There are no users
@endif

</div>

@stop
