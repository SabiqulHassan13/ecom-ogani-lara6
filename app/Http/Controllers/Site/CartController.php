<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    //
    public function showCart () {
        $cartCollection = Cart::getContent();
        $subTotal = Cart::getSubTotal();
        $total = Cart::getTotal();
        // $cartTotalQuantity = Cart::getTotalQuantity();


        return view('frontend.cart.cart', [
                'cartCollection'    =>  $cartCollection,
                'subTotal'          =>  $subTotal,
                'total'             =>  $total
                // 'cartTotalQuantity' =>  $cartTotalQuantity
            ]);

    }

    public function addToCart(Request $request)
    {        
        $product = Product::where('id', $request->product_id)->first();
        
        Cart::add([
            'id'         =>  $product->id,
            'name'       =>  $product->name,
            'price'      =>  $product->price,
            'quantity'   =>  $request->product_qty,
            'attributes' =>  array(
                'image'  =>  $product->image,
                // 'color'  => 'blue'
            )
        ]);
            
        // return response()->json($product);
        return redirect()->route('site.cart.show')->with('message', 'item added into cart');
    }

    public function updateCartItem(Request $request)
    {
        Cart::update($request->id, ['quantity' => [
                'relative' => false,
                'value' => $request->product_qty
            ]
        ]);

        return redirect()->route('site.cart.show')->with('message', 'item updated into cart');
    }

    public function deleteCartItem($id) {
        Cart::remove($id);

        return redirect()->route('site.cart.show')->with('message', 'item removed from cart');
    }




}
