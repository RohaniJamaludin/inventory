@extends('layouts.app')

@section('content')

    <!-- Create payment Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New payment Form -->
        {{ Form::open(array('action' => array('PaymentController@update', $payment->id), 'class' => 'form-horizontal', 'method' => 'post')) }}

        {{ method_field('PUT') }}


        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', $payment->name, ['class' => 'form-control', 'readonly' => 'true'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('label', 'Description', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('label', $payment->label,  ['class' => 'form-control'])}}
            </div>
            
        </div>
     

            <!-- payment Name -->
           
             <div class="col-sm-offset-3 col-sm-6">
                <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-plus"></i> Back</a>
            </div>

            <!-- Add payment Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Payment Method
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection