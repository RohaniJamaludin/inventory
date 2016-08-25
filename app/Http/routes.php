<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {

	//Auth::loginUsingId(2);
//    
////    // Authentication routes...
////    Route::get('auth/login', 'Auth\AuthController@getLogin');
////    Route::post('auth/login', 'Auth\AuthController@postLogin');
////    Route::get('auth/logout', 'Auth\AuthController@getLogout');
////    
////    
////    // Registration routes...
////    Route::get('auth/register', 'Auth\AuthController@getRegister');
////    Route::post('auth/register', 'Auth\AuthController@postRegister');

	//Route::get('/users', 'UserController@index');

	//Route::get('/items', 'ItemController@index');
	//Route::get('items/read/{id}', 'ItemController@show');
	//Route::post('/items', 'ItemController@store');
	//Route::delete('/items/{item}', 'ItemController@destroy');
	
   // return view('welcome');
//    
//    
//

Route::get('/', 'HomeController@index');

// Route::auth();

Auth::loginUsingId(1);


Route::get('/home', 'HomeController@index');

Route::get('users/{user}/delete', 'UserController@destroy');
Route::resource('users', 'UserController', ['except' =>['destroy']]);


// Route::get('/items', 'ItemController@index');
// Route::get('/items/create', 'ItemController@create');
// Route::get('/items/{item}', 'ItemController@read');
// Route::get('/items/edit/{item}', 'ItemController@edit');
// Route::post('/items/{item}', 'ItemController@update');
// Route::post('/items', 'ItemController@store');
// Route::delete('/items/{item}', 'ItemController@destroy');

Route::get('items/{item}/delete', 'ItemController@destroy');
Route::get('items/history','ItemController@history');
Route::resource('items','ItemController', ['except' => ['destroy','history']]);

Route::get('roles/{role}/delete', 'RoleController@destroy');
Route::get('roles/history', 'RoleController@history');
Route::get('roles/{role}/permission', 'RoleController@permission');
Route::post('roles/{role}/update-permission', 'RoleController@updatePermission');
Route::resource('roles', 'RoleController', ['except' => ['destroy', 'history','permission','updatePermission']]);

Route::get('permissions/{permission}/delete', 'PermissionController@destroy');
Route::get('permissions/history', 'PermissionController@history');
Route::resource('permissions','PermissionController', ['except'=> ['destroy','history']]);

Route::resource('account','AccountController', ['except' => ['show', 'destroy']]);

Route::get('categories/{category}/delete','CategoryController@destroy');
Route::resource('categories', 'CategoryController', [ 'except' => ['destroy']]);

Route::get('payments/{payment}/delete', 'PaymentController@destroy');
Route::resource('payments','PaymentController', ['except' => ['destroy']]);

Route::get('states/{state}/delete', 'StateController@destroy');
Route::resource('states', 'StateController', ['except' => ['destroy']]);

Route::get('customers/{customer}/delete', 'CustomerController@destroy');
Route::resource('customers', 'CustomerController', ['except' => ['destroy']]);

Route::get('statuses/{status}/delete', 'StatusController@delete');
Route::resource('statuses', 'StatusController', ['except' => ['destroy']]);


// Route::get('/categories', 'CategoryController@index');
// Route::get('/categories/create', 'CategoryController@create');
// Route::get('/categories/{category}', 'CategoryController@read');
// Route::get('/categories/edit/{category}', 'CategoryController@edit');
// Route::post('/categories/{category}','CategoryController@update');
// Route::post('/categories', 'CategoryController@store');
// Route::delete('/categories/{category', 'CategoryController@destroy');

// Route::get('/permissions', 'PermissionController@index');
// Route::get('/permissions/create', 'PermissionController@create');
// Route::get('/permissions/{permission}', 'PermissionController@read');
// Route::get('/permissions/edit/{permission}', 'PermissionController@edit');
// Route::post('/permissions', 'PermissionController@store');
// Route::post('/permissions/{permission}', 'PermissionController@update');
// Route::delete('/permissions/{permission}', 'PermissionController@destroy');

// Route::get('/roles', 'RoleController@index');
// Route::get('/roles/create', 'RoleController@create');
// Route::get('/roles/{role}','RoleController@read');
// Route::get('/roles/edit/{role}','RoleController@edit');
// Route::post('/roles', 'RoleController@store');
// Route::post('/roles/{role}', 'RoleController@update');
// Route::delete('/roles/{role}', 'RoleController@destroy');


