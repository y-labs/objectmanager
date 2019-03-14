<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        if($items->count() <= 0) {
            $items->add(new Item(['name' => 'Pc 1', 'description' => 'Some description', 'type' => 'DEVICE']));
        }

        return view('frontend.index', compact('items'));
    }

    /**
     * Return a Json with found objects.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchObjects($searchString) {
        /**
         *
         *  This function would receive a search string via ajax and would return a serialized list
         *  of objects filtered by name that would refresh the GUI dynamically.
         *
         */
    }
}
