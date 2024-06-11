<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use \App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'sale' => 'nullable|numeric',
            'description' => 'nullable|string',
            'detail' => 'nullable|string',
            'status' => 'required|integer',
            'is_hot' => 'required|integer',
            'sale_rate' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/img/product'), $imageName);
            $request->merge(['image' => $imageName]);
        }
        // End handle image upload
        // $request->merge(['user_id' => auth()->user()->id]);


        Product::create($request->all());

        return redirect()->route('admin.product')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $product = Product::where('id', $id)->first('*');
        return view('product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'sale' => 'nullable|numeric',
            'description' => 'nullable|string',
            'detail' => 'nullable|string',
            'status' => 'required|integer',
            'is_hot' => 'required|integer',
            'sale_rate' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all());

        $product->delete();
        $image_path = storage_path('app/public/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        return redirect()->route('admin.product')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $image_path = storage_path('app/public/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        return redirect()->route('admin.product')->with('deleted_message', 'Product deleted successfully');
    }
}
