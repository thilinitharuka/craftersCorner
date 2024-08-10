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
        if (auth()->check()) {
            $product = Product::find($request->productId);

            if ($product) {
                $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $product->id)
                    ->first();

                $qty = $request->quantity ? $request->quantity : 1;

                if ($cart) {
                    $cart->quantity += $qty;
                    $cart->save();
                    return response()->json([
                        'success' => true,
                        'message' => 'Product added to cart successfully.',
                        'cart' => $cart
                    ]);
                } else {
                    $cart = Cart::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product->id,
                        'quantity' => $qty,
                    ]);
                    return response()->json([
                        'success' => true,
                        'message' => 'Product added to cart.',
                        'cart' => $cart
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found.',
                ], 404);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Please login before add item.',
            ], 401);
        }
    }

    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'productId' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
        ]);

        // Find the cart item for the authenticated user
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->productId)
            ->first();

        if ($cartItem) {
            // Update the quantity of the cart item
            $cartItem->quantity = $request->qty;
            $cartItem->save();

            // Return a JSON response indicating success
            return response()->json([
                'success' => true,
                'message' => 'Cart item updated successfully.',
                'cartItem' => $cartItem
            ]);
        } else {
            // Return an error JSON response if the cart item is not found
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.',
            ], 404);
        }
    }

    public function destroy(Request $request)
    {
        // Find the cart item by product ID and user ID
        $cartItem = Cart::where('product_id', $request->productId)
            ->where('user_id', Auth::id())
            ->first();

        if ($cartItem) {
            // Delete the cart item
            $cartItem->delete();

            // Return a success JSON response
            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart.',
            ]);
        } else {
            // Return an error JSON response if item not found
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.',
            ], 404);
        }
    }

    public function cartCount()
    {
        if (Auth::check()) {
            // Get the total count of items in the cart
            $totItemCount = Cart::where(['user_id'=> Auth::id(),'status'=>0])->sum('quantity');

            // Return a JSON response with the total count
            return response()->json([
                'success' => true,
                'totalItemCount' => $totItemCount,
            ]);
        } else {
            // If the user is not authenticated, return a count of 0
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated.',
                'totalItemCount' => 0,
            ], 401);
        }
    }


}
