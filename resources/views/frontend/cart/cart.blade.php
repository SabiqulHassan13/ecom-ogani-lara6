@extends('frontend.master')

@section('page-title', 'Cart')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset("frontend") }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(\Cart::getTotalQuantity()>0)
                    <h4>Now, <b>{{ \Cart::getTotalQuantity() }}</b> products of <b>{{ Cart::getContent()->count() }}</b> types in your cart: </h4>
                    <hr class="mb-3">

                    <div class="shoping__cart__table">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>PID</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Price (BDT)</th>
                                    <th>Quantity</th>
                                    <th>Total (BDT)</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                    $products = $cartCollection;
                                    echo "<pre>";
                                    print_r($products);
                                ?> -->

                                <?php $i = 0; ?>
                                @foreach($cartCollection as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <img src="{{ asset($item->attributes['image']) }}" alt="{{ $item->name }}" width="100" height="70">
                                    </td>
                                    <td>
                                        <h5>{{ $item->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ $item->price }} {{ Cart::get($item->id)->price }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <!-- <div class="pro-qty"> -->
                                                <form action="{{ route('site.cart.update') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="text" min="1" name="product_qty" value="{{ $item->quantity }}" class="form-control form-control-sm"
                                                        style="width: 40px; margin-left: 60px;">
                                                        <!-- <input type="submit" class="btn btn-info btn-sm" value="update"> -->
                                                        <button class="btn btn-info btn-sm" style="margin-left: 15px;"> <i class="fa fa-edit"></i></button>
                                                    </div>
                                                </form>
                                            <!-- </div> -->
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ $item->quantity * $item->price}}/=  {{ Cart::get($item->id)->getPriceSum() }}/=
                                    </td>
                                    <td>
                                        <a href="{{ route('site.cart.delete', ['rowId' => $item->id ]) }}" class="btn btn-danger btn-sm">
                                            <span><i class="fa fa-trash"></i></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    @else
                        <h4>No Product(s) In Your Cart</h4><br>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('site.home') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        @if(\Cart::getTotalQuantity()>0)
                        <a href="{{ route('site.cart.clear') }}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Clear Your Cart</a>
                        @endif 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>0.00  BDT</span></li>
                            <li>Total <span>{{ \Cart::getTotal() }} BDT</span></li>
                        </ul>
                        <a href="{{ route('site.checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

@endsection