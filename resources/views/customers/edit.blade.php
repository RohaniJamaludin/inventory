@extends('layouts.app')

@section('content')

    <!-- Edit Customer Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New customer Form -->
        {{ Form::open(array('action' => array('CustomerController@update', $customer->id), 'class' => 'form-horizontal', 'method' => 'post')) }}

        {{ method_field('PUT') }}

         <div class="form-group">
            {{ Form::label('code', 'Code', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('customer_id', $customer->customer_id, ['class' => 'form-control', 'readonly' => 'true'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', $customer->name, ['class' => 'form-control', 'readonly' => 'true'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::email('email', $customer->email, ['class' => 'form-control'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone No', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('phone', $customer->phone, ['class' => 'form-control'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('address', 'Address', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('address', $customer->address, ['class' => 'form-control'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('city', 'City', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('city', $customer->city, ['class' => 'form-control'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('zip', 'Zip', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('zip', $customer->zip, ['class' => 'form-control'] )}}
            </div>
        </div>



        <div class="form-group">
            {{ Form::label('state', 'State', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('state', $states, $customer->state()->lists('id')->first(),  ['class' => 'form-control'])}}
            </div>

        </div>

         <div class="form-group">
            {{ Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('status', $statuses, $customer->status()->lists('id')->first(),  ['class' => 'form-control'])}}
            </div>
        </div>
     

            <!-- customer Name -->
           
             <div class="col-sm-offset-3 col-sm-6">
                <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-plus"></i> Back</a>
            </div>

            <!-- Add customer Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update customer
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection