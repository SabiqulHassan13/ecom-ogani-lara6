<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function home () {
        return view('frontend.home.home');
    }

    public function category () {
        return view('frontend.category.category');
    }

    public function singleProduct () {
        return view('frontend.product.product_single');
    }

    public function contact () {
        return view('frontend.contact.contact');
    }

    public function showCart () {
        return view('frontend.cart.cart');
    }

    public function checkout () {
        return view('frontend.checkout.checkout');
    }

}
