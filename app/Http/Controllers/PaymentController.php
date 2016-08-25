<?php

namespace App\Http\Controllers;

use App\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

     /**
     * Display a list of all of the payment method.
    *
    * @param  Request  $request
    * @return Response
    */

    public function index()
    {
    	return view('payments.index', ['payments' => Payment::All()]);
    }


    public function create()
    {
    	return view('payments.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [ 
    		'name' => 'required|max:30',
    		'label' => 'max:255']);

    	$payment = $request->user()->payments()->create([
    		'name' => $request->name,
    		'label' => $request->label
    		]);

    	return redirect('payments/' .$payment->id);

    }

    public function show(Request $request, $id)
    {
    	return view('payments.show', ['payment' => Payment::find($id)]);
    }

    public function edit(Request $request, $id)
    {
    	return view('payments.edit', ['payment' => Payment::find($id)]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, ['label' => 'max:255']);

    	$payment = Payment::find($id);
    	$payment->label = $request['label'];
    	$payment->update();

    	return redirect('payments/' .$payment->id);

    }

    public function destroy(Request $request, Payment $payment)
    {
    	$payment->delete();

    	return redirect('payments');
    }
}
