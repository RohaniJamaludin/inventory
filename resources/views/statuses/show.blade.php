@extends('layouts.app')

@section('content')

<div class="panel-body">
	<div class="form-group">

        <div class="col-sm-offset-3 col-sm-6">
            {{ $status->name }}
        </div>
    </div>

    <div class="col-sm-offset-3 col-sm-6">
            {{ $status->label }}
    </div>

    <div class="col-sm-offset-3 col-sm-6">
        <a href="{{ url('statuses') }}" class="btn btn-default"><i class="fa fa-plus"></i> Back to Index Page</a>
    </div>
    <div class="col-sm-offset-3 col-sm-6">
        <a href="{{ url('statuses/' .$status->id. '/edit') }}" class="btn btn-default"><i class="fa fa-plus"></i> Edit</a>
    </div>

</div>

@endsection
