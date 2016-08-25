@extends('layouts.app')

@section('content')

<div class="panel-body">
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {{ $role->name }}
        </div>
          <div class="col-sm-offset-3 col-sm-6">
            {{ $role->label }}
        </div>
    </div>
 <div class="col-sm-offset-3 col-sm-3">
            <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-plus"></i> Back</a>
                </div>
                 <div class="col-sm-offset-2 col-sm-4">
                 <form action="{{ url('roles/' .$role->id. '/edit') }}" method="GET" class="form-horizontal">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Role
                    </button>
                    </form>
                </div>

</div>

@endsection