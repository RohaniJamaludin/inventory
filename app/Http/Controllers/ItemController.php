<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ItemRepository;

class ItemController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ItemRepository $items)
    {
        $this->middleware('auth');
        
        $this->items = $items;
    }
    /**
     * Display a list of all of the user's item.
    *
    * @param  Request  $request
    * @return Response
    */
    public function index(Request $request)
    {
        // $this->authorize('index_item');
        return view('items.index', [
            // 'items' => $this->items->forUser($request->user()),
            'items' => Item::All(),
        ]);
    }

    public function create()
    {
        // $this->authorize('create_item');
        return view('items.create', ['categories' => Category::All()->lists('name','id')]);
    }

     /**
    * Create a new item.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|max:30|unique:items',
            'name' => 'required|max:255',
        ]);

        $item = $request->user()->items()->create([
            'code' => $request->code,
            'name' => $request->name,
            'category_id' => $request->category,
        ]);

        return redirect('items/' .$item->id);
    }

    public function show(Request $request, $id)
    {
        return view('items.show', ['item' => Item::find($id)]);
    }
    

    public function edit(Request $request, $id)
    {
        return view('items.edit', ['item' => Item::find($id), 'categories' => Category::All()->lists('name','id')]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required|max:30|unique:items',
            'name' => 'required|max:255',
        ]);

        $item = Item::where('id', $id)->first();
        $item->code = $request['code'];
        $item->name = $request['name'];
        $item->category_id = $request['category'];
        $item->update();

        return redirect('items/' .$id);
    }
   

    
    public function destroy(Request $request, Item $item)
    {
        //
        //$this->authorize('destroy', $item);
        
        $item->delete();

        return redirect('/items');
    }

    public function history()
    {
      
        return view('items.history', ['items' => Item::withTrashed()->get()]);
        // return view('items.history',['items'=>Item::All()]);
    }
}
