<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Stripe;

class StripePaymentController extends Controller
{
    public function paymentStripe()
    {
        return view('stripe');
    }

    public function postPaymentStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stripeToken' => 'required',
        ]);

        if ($validator->passes()) {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            try {
                $charge = $stripe->charges->create([
                    'source' => $request->stripeToken,
                    'currency' => 'USD',
                    'amount' => $request->grandPrice*100, // Amount in cents
                    'description' => 'wallet',
                ]);

                if($charge['status'] == 'succeeded') {
                    // Here you can redirect to the desired route with a success message
                    return redirect()->route('cart.index')->with('success', 'Payment successful!');
                } else {
                    return redirect()->route('addmoney.paymentstripe')->with('error', 'Money not added to wallet!');
                }
            } catch (\Exception $e) {
                return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('addmoney.paymentstripe')->withErrors($validator);
        }
    }
}
