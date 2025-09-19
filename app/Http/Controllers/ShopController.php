<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        // Filter by price range
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // Sorting
        switch ($request->input('sort')) {
            case 'low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'latest':
                $query->latest();
                break;
            default:
                $query->orderBy('name', 'asc'); // fallback default
        }

        $products = $query->get();
        $categories = Category::all();

        return view('shop.index', compact('products', 'categories'));
    }
}

