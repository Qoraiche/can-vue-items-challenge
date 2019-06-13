<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreItem;
use App\Item;

class ItemController extends Controller
{
    /**
     * Prevent guests adding resource using built-in auth middlware
     */
    public function __construct(){

        $this->middleware('auth')->except(['listItems']);
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listItems()
    {
        $response = Item::orderBy('id')->paginate(25);

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreItem  $item
     */
    public function createItem(StoreItem $item)
    {
        $user = Auth::user();
        $item = $user->item()->create($item->all());
    }
}
