<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use App\Shipping;
use Session;

class CheckoutController extends Controller
{
    public function checkoutBillingInfo(Request $request) {
        $customer_id = Session::get('customer_id');
        $customer_info = Customer::where('id', $customer_id)->first();

        return view('frontend.checkout.checkout', ['customer_info' => $customer_info]);
    }

    public function checkoutUpdateBillingInfo(Request $request) {
        $customer = Customer::where('id', $request->customer_id)->first();

        $customer->name     = $request->name;
        $customer->phone    = $request->phone;
        $customer->email    = $request->email;
        $customer->address  = $request->address;
        $customer->city     = $request->city;
        $customer->country   = $request->country;
        $customer->zip_code = $request->zip_code;
        $customer->save();

        return redirect()->route('site.checkout.shipping')->with('message', 'Billing address updated');
    }

    public function checkoutShippingInfo() {

        return view('frontend.checkout.shipping');
    }

    public function checkoutSaveShippingInfo(Request $request) {
        $shipping = new Shipping();

        $shipping->shipping_name = $request->shipping_name;
        $shipping->company_name  = $request->company_name;
        $shipping->phone         = $request->phone;
        $shipping->email         = $request->email;
        $shipping->address       = $request->address;
        $shipping->city          = $request->city;
        $shipping->country       = $request->country;
        $shipping->zip_code      = $request->zip_code;
        $shipping->save();

        Session::put('shipping_id', $shipping->id);

        
    }

    //  Request $request
    public function checkoutLoginForm () {
        return view('frontend.customer.login');
    }

    public function checkoutRegisterForm () {
        return view('frontend.customer.register');
    }
    
    public function checkoutRegistrationProcess (Request $request) {
        // validate the register request
        $this->validate($request, [
            'name'      => 'required|min:3|max:255',
            'phone'     => 'required|min:11',
            'email'     => 'required|email',
            'password'  => 'required|string|min:6',
        ]);

        $customer = Customer::create([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);

        return redirect()->route('site.checkout.billing');

        // return view('frontend.customer.register');
    }
}
