<?php

namespace App\Http\Controllers;

use App\State;

use Illuminate\Http\Request;

use App\Http\Requests;

class StateController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	return view('states.index', ['states' => State::All()]);
    }

    public function create(Request $request)
    {
    	return view('states.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:30|unique:states',
    		'label' => 'max:255']);

    	$state = $request->user()->states()->create([
    		'name' => $request->name,
    		'label' => $request->label]);

    	return redirect('states/' .$state->id);
    }

    public function show(Request $request, $id)
    {
    	return view('states.show', ['state' => State::find($id)]);
    }

    public function edit(Request $request, $id)
    {
    	return view('states.edit', ['state' => State::find($id)]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'label' => 'max:30']);

    	$state = State::find($id);

    	$state->label = $request['label'];
    	$state->update();

    	return redirect('states/' .$state->id);
    }

    public function destroy(Request $request, State $state)
    {
    	$state->delete();

    	return redirect('states');
    }


}
