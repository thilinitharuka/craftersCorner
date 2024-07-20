<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Method to show the checkout page
    public function index()
    {
        return view('stripe');
    }

    // Method to handle the checkout process
    public function process(Request $request)
    {
        // Your checkout logic here

        return redirect()->route('stripe.success'); // Example redirection
    }
}
