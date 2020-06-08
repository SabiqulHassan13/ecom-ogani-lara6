<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class FrontendController extends Controller
{
    //
    public function home () {
        $publishedProducts = Product::where('publication_status', 1)->get();

        return view('frontend.home.home', [
            'publishedProducts' =>  $publishedProducts,
        ]);
    }

    public function category ($id) {
        $publishedCategoryProducts = Product::where('category_id', $id)
                                            ->where('publication_status', 1)
                                            ->get();

        return view('frontend.category.category', [
            'publishedCategoryProducts' =>  $publishedCategoryProducts,
        ]);
    }

    public function singleProduct ($id) {
        $selectedProduct = Product::where('id', $id)->first();

        return view('frontend.product.product_single', ['selectedProduct' => $selectedProduct]);
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
