<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.products.productCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $file = $request->file('productImage');
        $products = new Product;
        $products->name = $request->productName;
        $products->description = $request->productDescription;
        $products->price = $request->productPrice;
        $products->category = $request->productCategory;
        $products->image = $file->getClientOriginalName();

        $destinationPath = 'storage'; //upload path
        $file->move($destinationPath,$file->getClientOriginalName());

        $products->save();
        return redirect('admin/product/create')->with('success', 'New Product Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::all();
        return view('admin/products/productList', compact('products'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.productEdit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Product $product)
    {
        // Validate the request data as needed
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        // Update the product with the new data
        $product->update($request->all());

        // Redirect back to the product list or wherever you want
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(Product $product)
     {
         // Delete the product
         $product->delete();

         // Redirect back to the product list or wherever you want
         return redirect()->back()->with('success', 'Product deleted successfully!');
     }
}
