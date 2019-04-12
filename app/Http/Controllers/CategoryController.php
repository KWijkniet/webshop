<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $category = Category::where('name', $name)->first();
        $items = Item::where('category_id', $category['id'])->get()->toArray();
        return view('category', compact('category', 'items'));
    }
}
