@extends('layouts.app')

@section('content')
    <!-- Create customer Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New customer Form -->
        {{ Form::open(array('action' => array('CustomerController@store'), 'class' => 'form-horizontal', 'method' => 'post')) }}
            <!-- customer Name -->

        <div class="form-group">
            {{ Form::label('customer_id', 'Customer Id', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('customer_id', null, ['class' => 'form-control'] )}}
            </div>
        </div>
        
         <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', null, ['class' => 'form-control'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::email('email', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('phone', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('address', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('city', 'City', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('city', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('zip', 'Zip', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('zip', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('state', 'State', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('state', $states, null, ['class' => 'form-control'])}}
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('status', $statuses, null, ['class' => 'form-control'])}}
            </div>
        </div>

        <!-- Add customer Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}&nbsp;&nbsp;
                <a href="{{ url()->previous() }}" class="btn btn-primary"> Cancel</a>
            </div>
        </div> 
    </div>
@endsection