<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomCraftController extends Controller

{
    public function index()
    {
        
        $categories = Category::all();
        $products = Product::where('is_customizable', true)->latest()->take(12)->get();

        return view('customcraftcorner', compact('categories', 'products'));

    }
}
