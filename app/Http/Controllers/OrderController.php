<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Item;
use App\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get()->toArray();
        $orders = array_reverse($orders);

        for ($r = 0; $r < count($orders); $r++) {
            $totalPrice = 0;
            $orders[$r]['data'] = json_decode($orders[$r]['data'], true);
            $items = array();
            for ($i = 0; $i < count($orders[$r]['data']); $i++) {
                $data = $orders[$r]['data'][$i];

                $item = Item::where('id', $data['article_id'])->first();
                $item['amount'] = $data['amount'];

                $category = Category::where('id', $item['category_id'])->first();
                array_push($items, [$item, $category]);

                $totalPrice += $data['amount'] * $item['price'];
            }
            $orders[$r]['totalPrice'] = $totalPrice;
            $orders[$r]['data'] = $items;
        }
        return view('orders', compact('orders'));
    }
}
