@extends('layouts.app')

@section('content')
    <!-- Create account Form... -->
    
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New account Form -->
        <form action="{{ url('account', $account->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- Account Name -->
            <div class="form-group">
                <label for="account-name" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="account-name" class="form-control" value="{{ $account->name }}">
                </div>
            </div>

             <!-- Account Address -->
            <div class="form-group">
                <label for="account-name" class="col-sm-3 control-label">Address</label>

                <div class="col-sm-6">
                    <input type="text" name="address" id="account-address" class="form-control" value="{{ $account->address }}">
                </div>
            </div>

             <div class="col-sm-offset-3 col-sm-6">
                <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-plus"></i> Back</a>
            </div>

            <!-- Add account Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update account
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection