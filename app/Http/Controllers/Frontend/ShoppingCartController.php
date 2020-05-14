<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cart = Cart::content();
        Cart::setGlobalTax(0);
        $subtotal = Cart::subtotal(false, ".", ",");
        $tax = Cart::tax(false, ".", ",");
        $total = Cart::total(false, ".", ",");

        return view('frontend.cart', compact('cart', 'subtotal', 'tax', 'total'));
    }

    public function add($id)
    {
        $product = Product::find($id);
        Cart::setGlobalTax(0);
        Cart::add($product->id, $product->name, 1, $product->price, 0, ['photo' => $product->photo]);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $rowId = $request['rowId'];
        $quantity = $request['quantity'];
        Cart::update($rowId, ['qty' => $quantity]);
        return redirect('/cart');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return redirect('/cart');
    }

    public function cancel()
    {
        Cart::destroy();
        return redirect("/cart");
    }
}
