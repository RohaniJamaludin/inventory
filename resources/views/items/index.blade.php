@extends('layouts.app')

@section('content')
    <!-- Create Item Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <form action="{{ url('items/create') }}" method="GET">
            {{ csrf_field() }}

            <div class="col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Item
                    </button>
                </div>
        </form>
    </div>



    <!-- Current Items -->
    @if (count($items) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Items
            </div>

            <div class="panel-body">
                <table class="table table-striped item-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                             <!-- Item Code -->
                                <td class="table-text">
                                    <div><a href="{{ url('items', $item->id) }}">{{ $item->code }}</a></div>
                                </td>

                                <!-- Item Name -->
                                <td class="table-text">
                                    <div>{{ $item->name }}</div>
                                </td>

                                <!-- Item  Category-->
                                <td class="table-text">
                                    <div>{{$item->category()->lists('name')->first()}}</div>
                                </td>

                                 <!-- Edit Button -->
    <td>
            <a href="{{ url('items/' .$item->id. '/edit')}}" class="btn btn-warning"> Edit</a>
    </td>

                                 <!-- Delete Button -->
    <td>
        <form action="{{ url('items/'.$item->id. '/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-item-{{ $item->id }}" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i> Delete
            </button>
        </form>
    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection