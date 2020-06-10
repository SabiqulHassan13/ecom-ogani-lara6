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
                <h4 class="font-weight-normal">Shipping Details</h4>
                <!-- <form action="#" method=""> -->
                    <div class="row">

                        <div class="col-lg-6 col-md-6 card-body border border-secondary ml-3">
                            <form action="" method="POST">
                                @csrf 
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Shipping Name<span class="text-danger">*</span></p>
                                            <input type="text" class="form-control" name="shipping_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Company Name<span class="text-danger">*</span></p>
                                            <input type="text" class="form-control" name="company_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Phone<span class="text-danger">*</span></p>
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Email<span class="text-danger">*</span></p>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Address (in details)<span class="text-danger">*</span></p>
                                    <textarea class="form-control" name="address" rows="3"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>City/Town<span class="text-danger">*</span></p>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Country/State<span class="text-danger">*</span></p>
                                            <input type="text" class="form-control" name="country">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Postcode / ZIP<span class="text-danger">*</span></p>
                                            <input type="text" class="form-control" name="zip_code">
                                        </div>
                                    </div>
                                </div>                                
                                
                                <button type="submit" class="btn-block mt-3 site-btn">Save & Next</button>
                            </form>
                        </div>

                        <div class="col-lg-4 col-md-6 border border-secondary px-0 ml-auto  mr-3">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <li>Vegetable’s Package <span>$75.99</span></li>
                                    <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>
                                <div class="checkout__order__total">Total <span>$750.99</span></div>
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
                    </div>

                <!-- </form> -->
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection