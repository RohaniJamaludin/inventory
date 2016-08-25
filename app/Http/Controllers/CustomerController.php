<?php

namespace App\Http\Controllers;

use App\Customer;

use App\State;

use App\Status;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	return view('customers.index', ['customers' => Customer::All()]);
    }

    public function create(Request $request)
    {
    	return view('customers.create', ['states' => State::All()->lists('name','id'), 'statuses' => Status::All()->lists('name', 'id')]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'customer_id' => 'required|max:12|unique:customers',
    		'name' => 'required|max:30|unique:customers',
    		'email' => 'required|email|unique:customers',
    		'phone' => 'required',
    		'address' => 'required',
    		'city' => 'required',
    		'zip' => 'required',
            ]);

    	$customer = $request->user()->customers()->create([
    		'customer_id' => $request->customer_id,
    		'name' => $request->name,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'city' => $request->city,
    		'state_id' => $request->state,
    		'zip' => $request->zip,
            'status_id' => $request->status]);


    	return redirect('customers/' . $customer->id);
    }


    public function show(Request $request, $id)
    {
    	return view('customers.show', ['customer' => Customer::find($id)]);
    }

    public function edit(Request $request, $id)
    {
    	return view('customers.edit', [
            'customer' => Customer::find($id), 
            'states' => State::All()->lists('name', 'id'), 
            'statuses' => Status::All()->lists('name', 'id')]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'email' => 'required',
    		'phone' => 'required',
    		'address' => 'required',
    		'city' => 'required',
    		'zip' => 'required']);

    	$customer = Customer::find($id);

    	$customer->email = $request['email'];
    	$customer->phone = $request['phone'];
    	$customer->address = $request['address'];
    	$customer->city = $request['city'];
    	$customer->state_id = $request['state'];
    	$customer->zip = $request['zip'];
        $customer->status_id = $request['status'];

    	$customer->update();

    	return redirect('customers/' .$customer->id);
    }

    public function destroy(Request $request, Customer $customer)
    {
    	$customer->delete();

    	return redirect('customers');
    }


}
