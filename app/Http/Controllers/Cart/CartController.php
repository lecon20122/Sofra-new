<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function newCartItems(Request $request)
    {
        // dd($request->user()->id);
        $cart = Cart::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
        ]);
        return "succeed";
    }
    public function cartProducts(Request $request)
    {
        return Cart::where('user_id', $request->user()->id)->with("product.restaurant")->get();
    }
    public function deleteCartItems(Request $request)
    {
        $cart = Cart::where('user_id' , $request->user()->id)->findOrFail($request->id);
        // dd($cart);
        $cart->delete();
        return Cart::where('user_id', $request->user()->id)->with("product")->get();
    }
}
