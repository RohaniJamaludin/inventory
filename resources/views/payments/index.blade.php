@extends('layouts.app')

@section('content')
    <!-- Create payment Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <form action="{{ url('payments/create') }}" method="GET">
            {{ csrf_field() }}

            <div class="col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Payment Method
                    </button>
                </div>
        </form>
    </div>



    <!-- Current payments -->
    @if (count($payments) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Payment Methods
            </div>

            <div class="panel-body">
                <table class="table table-striped payment-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Payment Method</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                            
                                <!-- payment Name -->
                                <td class="table-text">
                                    <div>{{ $payment->name }}</div>
                                </td>

                                <!-- payment  Category-->
                                <td class="table-text">
                                    <div>{{ $payment->label }}</div>
                                </td>

                                 <!-- Edit Button -->
    <td>
            <a href="{{ url('payments/' .$payment->id. '/edit')}}" class="btn btn-warning"> Edit</a>
    </td>

                                 <!-- Delete Button -->
    <td>
        <form action="{{ url('payments/'.$payment->id. '/delete') }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-payment-{{ $payment->id }}" class="btn btn-danger">
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