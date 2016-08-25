@extends('layouts.app')

@section('content')
    <!-- Create customer Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <form action="{{ url('customers/create') }}" method="GET">
            {{ csrf_field() }}

            <div class="col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add customer
                    </button>
                </div>
        </form>
    </div>



    <!-- Current customers -->
    @if (count($customers) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Customers
            </div>

            <div class="panel-body">
                <table class="table table-striped customer-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Customer City</th>
                        <th>Customer Status</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                             <!-- Customer Code -->
                                <td class="table-text">
                                    <div><a href="{{ url('customers', $customer->id) }}">{{ $customer->customer_id }}</a></div>
                                </td>

                                <!-- Customer Name -->
                                <td class="table-text">
                                    <div>{{ $customer->name }}</div>
                                </td>

                                 <!-- Customer Email -->
                                <td class="table-text">
                                    <div>{{ $customer->email }}</div>
                                </td>

                                 <!-- Customer Phone -->
                                <td class="table-text">
                                    <div>{{ $customer->phone }}</div>
                                </td>

                                <!-- customer  City-->
                                <td class="table-text">
                                    <div>{{$customer->city}}, {{$customer->state->name}}</div>
                                </td>

                                 <td class="table-text">
                                    <div>{{$customer->status->name}}</div>
                                </td>

                                 <!-- Edit Button -->
    <td>
            <a href="{{ url('customers/' .$customer->id. '/edit')}}" class="btn btn-warning"> Edit</a>
    </td>

                                 <!-- Delete Button -->
    <td>
        <form action="{{ url('customers/'.$customer->id. '/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-customer-{{ $customer->id }}" class="btn btn-danger">
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