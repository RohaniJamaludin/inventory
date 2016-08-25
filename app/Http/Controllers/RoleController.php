<?php

namespace App\Http\Controllers;

use App\Role;

use App\Permission;

use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
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
     * Display a list of all of the user's role.
    *
    * @param  Request  $request
    * @return Response
    */

     public function index(Request $request)
     {
        // $this->authorize('index_role');

        return view('roles.index', ['roles' => Role::All()]);
     }

     public function create()
     {
        // $this->authorize('create_role');

        return view('roles.create');
     }

     public function show(Request $request, $id)
     {
        //$this->authorize('read_role');

        return view('roles.show', ['role' => Role::find($id)]);
     }

     public function edit(Request $request, $id)
     {
        // $this->authorize('edit_role');

        return view('roles.edit', ['role' => Role::find($id)]);
     }


     public function store(Request $request)
     {
        $this->validate($request,['name' => 'required|max:30|unique:permissions,name', 'label' => 'max:255']);

        $request->user()->hasManyRoles()->create([
            'name' => $request->name,
            'label' => $request->label]);

        return redirect('roles');
     }

     public function update(Request $request, $id)
     {
        $this->validate($request, ['label' => 'max:255']);

        $role = Role::find($id);
        $role->label =$request['label'];
        $role->update();

        return redirect('roles/' . $id );
     }

     public function destroy(Request $request, Role $role)
     {
        // $this->authorize('destroy_role');

        $role->delete();

        return redirect('roles');
     }

     public function permission(Request $request, $id)
     {

        return view('roles.permission',['role' => Role::find($id), 'permissions'=> Permission::All()->sortBy('name')]);
     }

     public function updatePermission(Request $request, $id)
     {
        $role = Role::find($id);
        $permissions = Permission::All();

        foreach ($permissions as $permission) {
            if($request->has($permission->name) &&  $role->permissions->where('name', $permission->name)->isEmpty())
            {
                $role->assign($permission);
            } 
            else if(! $request->has($permission->name) && $role->permissions->where('name', $permission->name)->first())
            {
                $role->unassign($permission);
            }


        }
        return view('roles.index', ['roles' => Role::All()]);
     }

}
