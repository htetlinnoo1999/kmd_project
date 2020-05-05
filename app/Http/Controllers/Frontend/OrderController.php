<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //todo: order functions! Luv u dude! xP

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order(){

        $total = Cart::total(false, ".", ",");
        $cart = Cart::content();

        $order = new Order;
        $order->user_id = Auth::id();
        $order->payment_type = "cash";
        $order->amount = $total;
        $order->status = 1;
        $order->save();

        foreach($cart as $item){
            $order->product()->attach($item->id, ['quantity' => $item->qty ]);
        }

        Cart::destroy();

        return redirect('/');


    }

}
