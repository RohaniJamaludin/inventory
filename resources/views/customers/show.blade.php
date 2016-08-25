@extends('layouts.app')

@section('content')

<div class="panel-body">
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->customer_id }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->name }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->email }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->phone }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->address }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->zip }} {{ $customer->city }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->state->name}}
        </div>
         <div class="col-sm-offset-3 col-sm-6">
            {{ $customer->status->name}}
    </div>

    <div class="col-sm-offset-3 col-sm-6">
        <a href="{{ url('customers') }}" class="btn btn-default"><i class="fa fa-plus"></i> Back to Index Page</a>
    </div>
    <div class="col-sm-offset-3 col-sm-6">
        <a href="{{ url('customers/' .$customer->id. '/edit') }}" class="btn btn-default"><i class="fa fa-plus"></i> Edit</a>
    </div>

</div>

@endsection