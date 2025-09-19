<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $customer = Customer::where('user_id', auth()->id())->first();

        // Prevent duplicate review
        $existing = Review::where('customer_id', $customer->id)
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You already reviewed this product.');
        }

        Review::create([
            'comment' => $request->comment,
            'rating' => $request->rating,
            'customer_id' => $customer->id,
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Review submitted!');
    }

}
