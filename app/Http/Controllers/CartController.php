<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        // Get cart items for the authenticated user
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($item) {
                return [
                    'product_id' => $item->product->id,
                    'name' => $item->product->name,
                    'image' => $item->product->image,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'subTotal' => $item->product->price * $item->quantity,
                ];
            });
        // Pass the product details and total count to the view
        return view('cart', ['cartItems' => $cartItems]);
    }
    public function store(Request $request)
    {
//        var_dump($request->productId);
       /* $productId = $request->productId;
        session(['productId' => $request->productId]);
        // Retrieve the cart from the session or create an empty array if it doesn't exist
        $cart = $request->session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // Update the quantity
            $cart[$productId]['quantity'] += 1;
        } else {
            // Add the product with a quantity of 1
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => 1,
            ];
        }*/


            $product = Product::find($request->productId);
            if ($product) {
                $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $product->id)
                    ->first();
                $qty = $request->quantity ? $request->quantity  : 1;
                if ($cart) {
                    $cart->quantity += $qty;
                    $cart->save();
                } else {
                    Cart::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product->id,
                        'quantity' => $qty,
                    ]);
                }
                return 'Product added to cart.';
//                return redirect()->route('cart.index')->with('success', 'Product added to cart.');
            }
            return "Product not found.";
//            return redirect()->back()->with('error', 'Product not found.');


        // Store the updated cart in the session
//        $request->session()->put('cart', $cart);

//        return 'Product added to cart';
    }
}
