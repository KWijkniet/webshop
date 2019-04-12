<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category, $name)
    {
        $category = Category::where('name', str_replace('_', ' ', $category))->first();
        $item = Item::where('name', str_replace('_', ' ', $name))->first();
        return view('item', compact('category', 'item'));
    }
}
