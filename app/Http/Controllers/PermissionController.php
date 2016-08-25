<?php

namespace App\Http\Controllers;

use App\Permission;

use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionController extends Controller
{
    //
      //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a list of all of the user's permission.
    *
    * @param  Request  $request
    * @return Response
    */

    public function index(Request $request)
    {
    	// $this->authorize('index_permission');

        return view('permissions.index', [
            'permissions' => Permission::All()->sortBy('name'),
        ]);
    	// return view('permissions.index', ['permissions_role' => Role::find($role_id)->permissions(), 'permissions' => Permission::All()]);

    	// return view('permissions.index', ['permissions' => Permission::where('name', 'NOT LIKE', '%permission')->get()]);
    }

    public function create(){
        // $this->authorize('create_permission');

        return view('permissions.create');
    }

    public function show(Request $request, $id)
    {
    	// $this->authorize('read_permission');

    	return view('permissions.show', ['permission' => Permission::find($id)]);

    }

    public function edit(Request $request, $id)
    {
    	// $this->authorize('edit_permission');

    	return view('permissions.edit',['permission' => Permission::find($id)]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, ['name' =>'required|max:30', 'label' =>  'max:255']);

    	$permission = Permission::find($id);
        $permission->name = $request['name'];
    	$permission->label = $request['label'];
    	$permission->update();

    	return redirect('permissions/'.$id);
    }

    public function store(Request $request)
    {
    	$this->validate($request, ['name' => 'required|max:30|unique:permissions,name', 'label' => 'max:255']);

    	$permission = $request->user()->permissions()->create([
    		'name' => $request->name,
    		'label' => $request->label]);



    	return redirect('permissions/' .$permission->id);
    }

    public function destroy(Request $request, Permission $permission)
    {
    	// $this->authorize('destroy_permission');

    	$permission->delete();

    	return redirect('permissions');
    }

}
