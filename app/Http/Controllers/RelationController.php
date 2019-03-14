<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class RelationController extends Controller
{
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
    public function destroy($id)
    {
        $relation = Item::find($id);
        $relation->delete();

        // Go back to object relations
        return redirect('items.relations', $id)->with('success', 'Relation (id='.$id.') has been deleted successfully');
    }
}
