@extends('layouts.app')

@section('content')

<!-- Display Validation Errors -->
@include('common.errors')


 <div class="panel-body">

{{ Form::open(array('action' => array('UserController@store'), 'class' => 'form-horizontal', 'method' => 'post')) }}

<div><h3>Create User</h3></div>

<div class="form-group">
    {{ Form::label('username', 'Username', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('username', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('password-confirmation', 'Password Confirmation', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::email('email', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('role', 'Role', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('role', $roles, null, ['class' => 'form-control'])}}
    </div>
</div>

<div class="form-group">
    {{ Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::textarea('address', null, ['class' => 'form-control', 'size' => '30x3']) }}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        {{ Form::submit('Register', ['class' => 'btn btn-primary']) }} &nbsp;&nbsp;
        <a href="{{ url()->previous() }}" class="btn btn-primary"> Back</a>
    </div>
</div>



{{ Form::close() }}

</div>


@endsection
