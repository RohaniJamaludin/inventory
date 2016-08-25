@extends('layouts.app')

@section('content')

<div class="panel-body">
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {{ $category->name }}
        </div>
          <div class="col-sm-offset-3 col-sm-6">
            {{ $category->label }}
        </div>
    </div>
    <div class="col-sm-offset-3 col-sm-3">
        <a href="{{ url('categories') }}" class="btn btn-default"><i class="fa fa-plus"></i> Back to Index Page</a>
    </div>
    <div class="col-sm-offset-2 col-sm-4">
        <form action="{{ url('categories/' .$category->id. '/edit') }}" method="GET" class="form-horizontal">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update category
                    </button>
                    </form>
                </div>

</div>

@endsection