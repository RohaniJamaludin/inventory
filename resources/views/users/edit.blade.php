@extends('layouts.app')

@section('content')

<div class="panel-body">
        <!-- Display Validation Errors -->

        @include('common.errors')

        <!-- Edit Form -->
        {{ Form::open(array('action' => array('UserController@update', $user->id), 'class' => 'form-horizontal', 'method' => 'post')) }}

        {{ method_field('PUT') }}

        <div class="form-group">
            {{ Form::label('username', 'Username', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('username', $user->username, ['class' => 'form-control', 'readonly' => 'true'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
            {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::email('email', $user->email, ['class' => 'form-control', 'readonly' => 'true']) }}
            </div>
        </div>

         <div class="form-group">
            {{ Form::label('role', 'Role', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('role', $roles, $role_user,  ['class' => 'form-control'])}}
            </div>
            
        </div>

        <div class="form-group">
            {{ Form::label('', 'Address', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::textarea('address', $user->address, ['class' => 'form-control', 'size' => '30x3']) }}
            </div>
            
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}&nbsp;&nbsp;
                <a href="{{ url()->previous() }}" class="btn btn-primary"> Back</a>
            </div>
        </div>

        

        {{ Form::close() }}
        
    </div>
@endsection
