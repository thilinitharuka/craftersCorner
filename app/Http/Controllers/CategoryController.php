<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
//        dd($users);
        return view('admin.categories.categoryList', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.categoryCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new Category;
        $categories->name = $request->categoryName;
        $categories->description = $request->categoryDescription;

        $categories->save();
        return redirect('admin/category/create')->with('success', 'New Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.categoryEdit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the request data as needed
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',

        ]);

        // Update the category with the new data
        $category->update($request->all());

        // Redirect back to the category list or wherever you want
        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
//        $category = Category::find($id);
        // Delete the category
        $category->delete();

        // Redirect back to the category list or wherever you want
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
