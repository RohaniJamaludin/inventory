@extends('layouts.app')

@section('content')
    <!-- Create status Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Status Form -->
        {{ Form::open(array('action' => array('StatusController@store'), 'class' => 'form-horizontal', 'method' => 'post')) }}
            <!-- Status Name -->
        
         <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', null, ['class' => 'form-control'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('label', 'Description', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('label', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <!-- Add status Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}&nbsp;&nbsp;
                <a href="{{ url()->previous() }}" class="btn btn-primary"> Cancel</a>
            </div>
        </div> 
    </div>
@endsection