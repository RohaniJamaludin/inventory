@extends('layouts.users')

@section('main')

<h1>Show User</h1>

   <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Address</th>
            </tr>
        </thead>
        <tr>
                    <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->address }}</td>
                </tr>
                </tbody>
      
    </table>

@stop

