<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Classes\Cart;
use App\Category;
use App\Item;
use App\Order;

class CartController extends Controller
{
    public function index(){
        $cart = new Cart();
        $cartData = $cart->getCart();

        $totalPrice = 0;

        $items = array();
        for ($i=0; $i < count($cartData); $i++) {
            $item = Item::where('id', $cartData[$i]['article_id'])->first();
            $item['amount'] = $cartData[$i]['amount'];

            $category = Category::where('id', $item['category_id'])->first();
            array_push($items, [$item, $category]);

            $totalPrice += $cartData[$i]['amount'] * $item['price'];
        }

        return view('cart', compact('items', 'totalPrice'));
    }

    public function addToCart($category, $article, $id){
        $cart = new Cart();
        $cart->addToCart($id);
        return redirect("/" . $category . "/" . $article);
    }

    public function addAmount($id){
        $cart = new Cart();
        $cart->addToCart($id);
        return redirect("/cart");
    }

    public function removeAmount($id){
        $cart = new Cart();
        $cart->removeFromCart($id, 1);
        return redirect("/cart");
    }

    public function deleteFromCart($id){
        $cart = new Cart();
        $amount = $cart->getAmountFromCart($id);
        $cart->removeFromCart($id, $amount);
        return redirect("/cart");
    }

    public function checkout(){
        if(Auth::check()){
            $cart = new Cart();
            $cartData = json_encode($cart->getCart());
            if($cartData != null || strlen($cartData) <= 0 || $cartData !== "" || $cartData != 'null'){
                $cart->deleteCart();
                Order::insert(['user_id' => Auth::id(), 'data' => $cartData]);
                return redirect("/home");
            }else{
                return redirect("/cart");
            }
        }else{
            return redirect("/login");
        }
    }
}
