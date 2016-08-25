@extends('layouts.app')

@section('content')

    <!-- Create Item Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Item Form -->
        {{ Form::open(array('action' => array('ItemController@update', $item->id), 'class' => 'form-horizontal', 'method' => 'post')) }}

        {{ method_field('PUT') }}

         <div class="form-group">
            {{ Form::label('code', 'Code', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('code', $item->code, ['class' => 'form-control', 'readonly' => 'true'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => ' col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', $item->name, ['class' => 'form-control', 'readonly' => 'true'] )}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('category', $categories, $item->category()->lists('id')->first(),  ['class' => 'form-control'])}}
            </div>
            
        </div>
     

            <!-- Item Name -->
           
             <div class="col-sm-offset-3 col-sm-6">
                <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-plus"></i> Back</a>
            </div>

            <!-- Add Item Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Item
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection