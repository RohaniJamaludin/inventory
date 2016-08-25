@extends('layouts.app')

@section('content')

<div class="panel-body">
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {{ $account->email }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $account->name }}
        </div>
        <div class="col-sm-offset-3 col-sm-6">
            {{ $account->address }}
        </div>
    </div>
    <div class="col-sm-offset-3 col-sm-6">
        <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-plus"></i> Back</a>
    </div>
    <div class="col-sm-offset-3 col-sm-6">
        <a href="{{ url('account/' .$account->id. '/edit') }}" class="btn btn-default"><i class="fa fa-plus"></i> Edit</a>
    </div>

</div>

@endsection

