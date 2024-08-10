<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Method to show the checkout page
    public function index(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $customer = Customer::where('user_id', Auth::id())->first();
        $grandPrice = Cart::where('user_id', Auth::id())
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->selectRaw('SUM(carts.quantity * products.price) as total')
            ->value('total');
        return view('stripe',compact('grandPrice','user','customer'));
    }

    // Method to handle the checkout process
    public function process(Request $request)
    {
        // Your checkout logic here

        return redirect()->route('stripe.success'); // Example redirection
    }
}
