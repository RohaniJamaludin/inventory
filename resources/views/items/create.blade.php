@extends('layouts.app')

@section('content')
    <!-- Create Item Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Item Form -->
        {{ Form::open(array('action' => array('ItemController@store'), 'class' => 'form-horizontal', 'method' => 'post')) }}
            <!-- Item Name -->

        <div class="form-group">
            {{ Form::label('code', 'Code', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('code', null, ['class' => 'form-control'] )}}
            </div>
        </div>
        
         <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', null, ['class' => 'form-control'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('category', $categories, null, ['class' => 'form-control'])}}
            </div>
        </div>

        <!-- Add Item Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}&nbsp;&nbsp;
                <a href="{{ url()->previous() }}" class="btn btn-primary"> Cancel</a>
            </div>
        </div> 
    </div>
@endsection