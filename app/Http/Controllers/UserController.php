<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    /**Illuminate\Routing\Redirector;

     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    // $this->authorize('index_user');
    $users = User::all();
    $users->toarray();
    
    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('users.create', ['roles' => Role::all()->lists('name','id')]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $this->validate($request, ['username' => 'required|max:30|unique:users',
      'name' => 'required|max:30',
      'password'=> 'required|min:6|confirmed',
      'email' => 'required|email|unique:users']);
        
    $user = User::create([
    'username' => $request['username'],
    'name' => $request['name'],
    'email' => $request['email'],
    'password' => bcrypt($request['password']),
    'address' => $request['address'],
    ]);

    $role = Role::where('id', $request['role'])->firstOrfail();

    $user->assign($role);

    return redirect('users');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
    $user = User::find($id);
    return view('users.show', $user);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request, $id)
  {
    $user = User::find($id);
    $role_user = $user->roles()->first()->id;
    $roles = Role::all()->lists('name','id');

    return view('users.edit',['user' => $user , 'roles' => $roles , 'role_user' => $role_user]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    // $this->validate($request, [ 'name' => 'required|max:30']);
    $validator = Validator::make($request->all(),[ 'name' => 'required|max:30']);

     if ($validator->fails()) {
            return redirect('users/' .$id. '/edit' )
                        ->withErrors($validator)
                        ->withInput();
        }
    $user = User::find($id);
    $user->name = $request['name'];
    $user->address = $request['address'];
    $user->update();

    $role = Role::where('id', $request['role'])->firstOrfail();

    $user->updateRole($role);
    return redirect('users');
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, User $user)
  {
    //
    $user->delete();
    return redirect('/users');
  }
}
