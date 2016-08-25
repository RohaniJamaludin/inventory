<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
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
     * Display a list of all of the user's category.
    *
    * @param  Request  $request
    * @return Response
    */

    public function index(Request $request){
    	// $this->authorize('index_category');
    	return view('categories.index', ['categories' => Category::All()]);
    }

    public function show(Request $request, $id){
    	// $this->authorize('read_category');
    	return view('categories.show', ['category' => Category::find($id)]);
    }

    public function create(Request $request)
    {
        return view('categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [ 
            'name' => 'required|max:30',  
            'label' => 'max:255']);

        $category = $request->user()->categories()->create([
            'name'=> $request->name,
            'label' => $request->label]);

        return redirect('categories/' . $category->id);
    }


    public function edit(Request $request, $id){
    	// $this->authorize('edit_category');
    	return view('categories.edit', ['category' => Category::find($id)]);
    }

    public function update(Request $request, $id){
    	$this->validate($request, [ 
    		'label' => 'max:255']);

    	$category = Category::where('id', $id)->first();
    	$category->label = $request['label'];
    	$category->update();

    	return redirect('categories/' . $id);
    }

    

    public function destroy(Request $request, Category $category){
    	// $this->authorize('destroy_category');

    	$category->delete();

    	return redirect('/categories');

    }
}
