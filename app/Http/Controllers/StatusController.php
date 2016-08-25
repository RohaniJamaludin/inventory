<?php

namespace App\Http\Controllers;

use App\Status;

use Illuminate\Http\Request;

use App\Http\Requests;

class StatusController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	return view('statuses.index', ['statuses' => Status::All()]);
    }

    public function create(Request $request)
    {
    	return view('statuses.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:15|unique:statuses',
    		'label' => 'max:255'
    		]);

    	$status = $request->user()->statuses()->create([
    		'name' => $request->name,
    		'label' => $request->label
    		]);

    	return redirect('statuses/' .$status->id);
    }

    public function show(Request $request, $id)
    {
    	return view('statuses.show', ['status' => Status::find($id)]);
    }

    public function edit(Request $request, $id)
    {
    	return view('statuses.edit', ['status' => Status::find($id)]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'label' => 'max:255']);

    	$status = Status::find($id);

    	$status->label = $request['label'];

    	$status->update();

    	return redirect('statuses/' . $status->id);
    }

    public function destroy(Request $request, Status $status)
    {
    	$status->delete();

    	return redirect('statuses');
    }
}
