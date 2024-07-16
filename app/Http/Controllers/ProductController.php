<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        $categories = Category::all(); // Fetch all categories
        return view('admin.products.productCreate', ['categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//
//        $file = $request->file('productImage');
//        $products = new Product;
//        $products->name = $request->productName;
//        $products->description = $request->productDescription;
//        $products->price = $request->productPrice;
//        $products->category = $request->productCategory;
//        $products->image = $file->getClientOriginalName();
//
//        $destinationPath = 'storage'; //upload path
//        $file->move($destinationPath,$file->getClientOriginalName());
//
//        $products->save();
//        return redirect('admin/product/create')->with('success', 'New Product Created Successfully');
//    }
    public function store(Request $request)
    {
        // Validate the request data as needed
        $request->validate([
            'productName' => 'required|string|max:255',
            'productDescription' => 'required|string',
            'productPrice' => 'required|numeric',
            'productCategory' => 'required|exists:categories,id', // Ensure the category exists in categories table
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation as needed
        ]);

        // Handle file upload
        $file = $request->file('productImage');
        $fileName = $file->getClientOriginalName(); // You might want to change how you handle filenames to avoid collisions

        // Move the uploaded file to storage path
        $destinationPath = 'storage';
        $file->move($destinationPath, $fileName);

        // Create new Product instance and store data
        $product = new Product;
        $product->name = $request->productName;
        $product->description = $request->productDescription;
        $product->price = $request->productPrice;

        // Fetch category id based on category_name
        $category = Category::where('id', $request->productCategory)->first();
        if (!$category) {
            return redirect()->back()->withErrors(['productCategory' => 'Invalid category selected']);
        }

        $product->category = $category->id; // Assuming 'category_id' is the foreign key in products table

        $product->image = $fileName; // Store the filename, adjust as needed

        $product->save();

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
