<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate data received from the form
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        // Create a new product using the validated data
        Product::create($data);

        // Redirect to the product index page after successful save
        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }
    public function destroy(Product $product) // Fixed method declaration
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully'); // Fixed spelling
    }
}
