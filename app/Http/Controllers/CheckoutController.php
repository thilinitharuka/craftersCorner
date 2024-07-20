<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Method to show the checkout page
    public function index(Request $request)
    {
        // Retrieve the cart from the session
        $cart = $request->session()->get('cart', []);
        $grandPrice = 0;
        foreach ($cart as $item) {
            // Fetch the product from the database using the Product model
            $product = Product::find($item['product_id']);

            // Check if the product exists
            if ($product) {
                $grandPrice += $product->price * $item['quantity'];
            }
        }
        return view('stripe',compact('grandPrice'));
    }

    // Method to handle the checkout process
    public function process(Request $request)
    {
        // Your checkout logic here

        return redirect()->route('stripe.success'); // Example redirection
    }
}
