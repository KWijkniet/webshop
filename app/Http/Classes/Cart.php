<?php
namespace App\Http\Classes;

use Illuminate\Http\Request;
use Cookie;

class Cart{
    private $cart = array();

    public function __construct(){}

    public function addToCart($articleId){
        $this->cart = $this->getCart();

        $hasFound = false;
        if($this->cart != null){
            foreach ($this->cart as &$item) {
                if($item['article_id'] == $articleId){
                    $item['amount'] += 1;
                    $hasFound = true;
                }
            }
        }else{
            $this->cart = array();
        }

        if($hasFound == false){
            array_push($this->cart, ['article_id' => $articleId, 'amount' => 1]);
            // $this->cart[$articleId] = $amount
        }
        $this->saveCart();
    }

    public function removeFromCart($articleId, $amount = 1){
        $this->cart = $this->getCart();

        if($this->cart != null){
            foreach ($this->cart as $valueKey => &$item) {
                if($item['article_id'] == $articleId){
                    if($item['amount'] - $amount <= 0){
                        array_splice($this->cart, $valueKey, 1);
                        array_values($this->cart);
                    }else{
                        $item['amount'] -= $amount;
                    }
                }
            }
            $this->saveCart();
        }
    }

    public function getAmountFromCart($articleId){
        $this->cart = $this->getCart();
        if($this->cart != null){
            foreach ($this->cart as &$item) {
                if($item['article_id'] == $articleId){
                    return $item['amount'];
                }
            }
        }
        return 0;
    }

    public function getCart(){
        $this->cart = json_decode(Cookie::get('cart'), true);
        return $this->cart;
    }

    public function deleteCart(){
        Cookie::queue(Cookie::make('cart', '', 45000));
        $this->cart = json_decode(Cookie::get('cart'), true);
    }

    private function saveCart(){
        Cookie::queue(Cookie::make('cart', json_encode($this->cart), 45000));
    }
}
