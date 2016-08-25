@extends('layouts.app')

@section('content')
    <!-- Create Status Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <form action="{{ url('statuses/create') }}" method="GET">
            {{ csrf_field() }}

            <div class="col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Status
                    </button>
                </div>
        </form>
    </div>



    <!-- Current statuss -->
    @if (count($statuses) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Statuses
            </div>

            <div class="panel-body">
                <table class="table table-striped status-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Status</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($statuses as $status)
                            <tr>
                            
                                <!-- status Name -->
                                <td class="table-text">
                                    <div>{{ $status->name }}</div>
                                </td>

                                <!-- status  Category-->
                                <td class="table-text">
                                    <div>{{ $status->label }}</div>
                                </td>

                                 <!-- Edit Button -->
    <td>
            <a href="{{ url('statuses/' .$status->id. '/edit')}}" class="btn btn-warning"> Edit</a>
    </td>

                                 <!-- Delete Button -->
    <td>
        <form action="{{ url('statuses/'.$status->id. '/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-status-{{ $status->id }}" class="btn btn-danger">
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