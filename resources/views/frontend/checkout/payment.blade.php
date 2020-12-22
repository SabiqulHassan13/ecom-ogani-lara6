@extends('frontend.master')

@section('page-title', 'Checkout')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset("frontend") }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4 class="font-weight-normal">Payment Details</h4>
                    <div class="row">
                <!-- <form action="#" method=""> -->
                        @csrf
                    
                        <div class="col-lg-4 col-md-6 border border-secondary px-0 ml-auto  mr-3">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Quantity</span> <span>Total</span></div>
                                <ul>
                                    @foreach($cartCollection as $item)
                                        <li>{{ $item->name }} (x {{ $item->quantity }}) <span>{{ Cart::get($item->id)->getPriceSum() }} BDT</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>{{ \Cart::getTotal() }} BDT</span></div>
                                <div class="checkout__order__total">Total <span>{{ \Cart::getTotal() }} BDT</span></div>

                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                <!-- </form> -->
                    </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection