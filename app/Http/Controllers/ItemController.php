<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('backend.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:items',
            'type' => 'required',
        ]);

        $item = new Item([
            'name' => $request->get('name'),
            'description'=> $request->get('description'),
            'type'=> $request->get('type')
        ]);

        $item->save();

        // Go back to items list
        return redirect('/items')->with('success', 'Object '.$item.' has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);

        return view('backend.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:items,name,'.$id,
            'type' => 'required',
        ]);

        $item = Item::find($id);
        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->type = $request->get('type');
        $item->save();

        // Go back to items list
        return redirect('/items')->with('success', 'Object '.$item.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        // Go back to items list
        return redirect('/items')->with('success', 'Object '.$item.' has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function relations($id)
    {
        $item = Item::find($id);

        return view('backend.items.relations', compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRelation($id)
    {
        //$relation = Item::find($id);
        //$relation->delete();

        // Go back to object relations
        //return redirect('items.relations', $id)->with('success', 'Relation (id='.$id.') has been deleted successfully');
    }
}
