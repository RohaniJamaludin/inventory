@extends('layouts.app')

@section('content')
    <!-- Create state Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <form action="{{ url('states/create') }}" method="GET">
            {{ csrf_field() }}

            <div class="col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add State
                    </button>
                </div>
        </form>
    </div>



    <!-- Current states -->
    @if (count($states) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current States
            </div>

            <div class="panel-body">
                <table class="table table-striped state-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>State</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($states as $state)
                            <tr>
                            
                                <!-- state Name -->
                                <td class="table-text">
                                    <div>{{ $state->name }}</div>
                                </td>

                                <!-- state  Category-->
                                <td class="table-text">
                                    <div>{{ $state->label }}</div>
                                </td>

                                 <!-- Edit Button -->
    <td>
            <a href="{{ url('states/' .$state->id. '/edit')}}" class="btn btn-warning"> Edit</a>
    </td>

                                 <!-- Delete Button -->
    <td>
        <form action="{{ url('states/'.$state->id. '/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-state-{{ $state->id }}" class="btn btn-danger">
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