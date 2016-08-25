@extends('layouts.app')

@section('content')
    <!-- Create permission Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- Edit permission Form -->
        {{ Form::open(array('action' => array('CategoryController@update', $category->id), 'class' => 'form-horizontal', 'method' => 'post')) }}

        {{ method_field('PUT') }}

        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', $category->name, ['class' => 'form-control', 'readonly' => 'true'] )}}
            </div>
        </div>

         <div class="form-group">
            {{ Form::label('label', 'Label', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('label', $category->label, ['class' => 'form-control']) }}
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}&nbsp;&nbsp;
                <a href="{{ url()->previous() }}" class="btn btn-primary"> Cancel</a>
            </div>
        </div> 
        {{ Form::close() }}
    </div>
@endsection