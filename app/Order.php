<?php

namespace App;



class Order extends Model
{
    public function cartData($id, $content){
        $orders = Order::all();
        $cart = json_decode($orders[$id-1]->cart_data, true);
        foreach($cart as $c){
            echo(($c[$content]));
            echo "<br>" ;
        }
    }
    public function total()
    {
        return Order::all()->count();
    }
}
