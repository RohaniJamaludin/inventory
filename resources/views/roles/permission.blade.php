@extends('layouts.app')

@section('content')

<div class="panel-body">

	{{ Form::open(array('action' => array('RoleController@updatePermission', $role->id), 'class' => 'form-horizontal', 'method' => 'post')) }}

	@foreach($permissions as $permission)
	<div class="form-group">
		@if($role->permissions->where('name', $permission->name)->isEmpty())
		<div class=" col-sm-offset-1 col-sm-8">
			{{ Form::checkbox($permission->name, 'yes' ) }} {{$permission->label}}
		</div>
		@else
		<div class=" col-sm-offset-1 col-sm-8">
			{{ Form::checkbox($permission->name, 'yes' , true) }} {{$permission->label}}
		</div>
		@endif
	</div>
	@endforeach

	<div class="form-group">
        <div class="col-sm-offset-1 col-sm-8">
            {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}&nbsp;&nbsp;
            <a href="{{ url('roles')}}" class="btn btn-primary"> Back</a>
        </div>
    </div>

	{{ Form::close() }}

</div>

@endsection