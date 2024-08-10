<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Stripe;

class StripePaymentController extends Controller
{
    public function paymentStripe()
    {
        $user = User::where('id', Auth::id())->first();
        $customer = Customer::where('user_id', Auth::id())->first();
        $grandPrice = Cart::where('user_id', Auth::id())
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->selectRaw('SUM(carts.quantity * products.price) as total')
            ->value('total');
        return view('stripe',compact('grandPrice','user','customer'));
    }

    public function postPaymentStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stripeToken' => 'required',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'zipCode' => 'required|string',
            'phone_number' => 'required|string',
            'password' => 'nullable|string',
            'newPassword' => 'nullable|string|min:8|confirmed',
        ]);

        // Manually check if validation passes
        if ($validator->fails()) {
            return redirect()->route('addmoney.paymentstripe')->withErrors($validator);
        }

        $validatedData = $validator->validated(); // Now validated data is available

        $order = Order::create([
            'name' => $validatedData['firstName'] . ' ' . $validatedData['lastName'], // Corrected to use both first and last name
            'order_address' => $validatedData['address'],
            'phone_number' => $validatedData['phone_number'],
//            'product_id' => $validatedData['product_id'] ?? null, // Replace with correct ID source
//            'payment_status' => 1,
            'status' => 1,
            'user_id' => Auth::id(),
        ]);

        $orderId = $order->id;

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $cartItem) {
            OrderDetails::create([
                'order_id' => $orderId,
                'quantity' => $cartItem['quantity'],
                'product_id' => $cartItem['product_id'],
            ]);
            Cart::where('id', $cartItem->id)->delete();
        }

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $orders = Order::with('order_details.product')->where('user_id', Auth::id())->get();

        try {
            $charge = $stripe->charges->create([
                'source' => $request->stripeToken,
                'currency' => 'USD',
                'amount' => $request->grandPrice * 100, // Amount in cents
                'description' => 'wallet',
            ]);

            if ($charge['status'] == 'succeeded') {
                // Here you can redirect to the desired route with a success message
                $request->session()->forget('cart');
//                dd($orders);
//                return redirect()->route('cart.index')->with('success', 'Payment successful!');
                return redirect()->route('user.order')->with(['orders'=>$orders,'success'=>'Payment successful!']);
            } else {
                return redirect()->route('addmoney.paymentstripe')->with('error', 'Money not added to wallet!');
            }
        } catch (\Exception $e) {
            return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
        }
    }

}
