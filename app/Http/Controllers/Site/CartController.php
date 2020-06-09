<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    
    public function showCart () 
    {
        // Cart::clear();

        $cartCollection = Cart::getContent();

        return view('frontend.cart.cart', ['cartCollection' => $cartCollection]);

    }

    public function addToCart(Request $request)
    {        
        $productId  = $request->input('product_id');
        $productQty = $request->input('product_qty');
        $product    = Product::where('id', $productId)->first();
        
        // $userId = auth()->user()->id;
        Cart::add(array(
            'id'         =>  $product->id,
            'name'       =>  $product->name,
            'price'      =>  $product->price,
            'quantity'   =>  $productQty,
            'attributes' =>  array(
                'image'  =>  $product->image,
            ),
            'associatedModel' => 'Product',
        ));

        // echo "<pre>";
        // print_r($cartItem);
        // dd($cartItem);
            
        return redirect()->route('site.cart.show')->with('message', 'item added into cart');
        // return redirect()->back()->with('message', 'item added into cart');
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

    public function clearCart() {
        Cart::clear();

        return redirect()->route('site.cart.show')->with('message', 'cart is cleared');
    }



}
