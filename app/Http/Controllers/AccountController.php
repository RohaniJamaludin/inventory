<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class AccountController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }



    public function index(Request $request)
    {
    	return view('account.index', ['account' => Auth::user()]);
    }

    public function edit(Request $request, $id)
    {
    	return view('account.edit', ['account' => Auth::user()]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, ['name' => 'required|max:255']);
    	$account = Auth::user();
    	$account->name = $request['name'];
    	$account->address = $request['address'];

    	$account->update();

    	return redirect('account');
    }

    public function change_password(Request $request)
    {
    	return view('account.change_password');
    }

    public function update_password(Request $request)
    {

    }



}
