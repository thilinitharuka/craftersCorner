<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        // Retrieve the cart from the session
        $cart = $request->session()->get('cart', []);

        // Initialize an array to hold product details
        $productDetails = [];

        // Iterate through the cart items
        foreach ($cart as $item) {
            // Fetch the product from the database using the Product model
            $product = Product::find($item['product_id']);

            // Check if the product exists
            if ($product) {
                $productDetails[] = [
                    'image' => $product->image,
                    'name' => $product->name,
                    'quantity' => $item['quantity'],
                    'price' => $product->price, // assuming you have a price column
                    'total' => $product->price * $item['quantity']
                ];
            }
        }

        // Calculate the total count of items in the cart
        $totalCount = array_sum(array_column($cart, 'quantity'));

        // Pass the product details and total count to the view
        return view('cart', ['productDetails' => $productDetails, 'totalCount' => $totalCount]);
    }
    public function store(Request $request)
    {
//        var_dump($request->productId);
        $productId = $request->productId;
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
        }

        // Store the updated cart in the session
        $request->session()->put('cart', $cart);

        return 'Product added to cart';
    }
}
