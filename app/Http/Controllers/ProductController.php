<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        $favorites = Favorite::where('user_id', Auth::id())
                    ->pluck('product_id');

        return view('pharmacy-product', compact('products','favorites'));
    }

    // public function create()
    // {
    //     return view('products.create');
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|integer',
    //         'category_id' => 'required|exists:categories,id',
    //         'image' => 'nullable|image|max:2048',
    //     ]);

    //     Product::create($validated);

    //     return redirect()->route('products.index')->with('success', 'Product created successfully.');
    // }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
        $favorites = Favorite::where('user_id', Auth::id())
                    ->pluck('product_id');

        return view('pharmacy-details', compact('product' ,"favorites"));
    }


    // public function edit(Product $product)
    // {
    //     return view('products.edit', compact('product'));
    // }

    // public function update(Request $request, Product $product)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|integer',
    //         'category_id' => 'required|exists:categories,id',
    //         'image' => 'nullable|image|max:2048',
    //     ]);

    //     $product->update($validated);

    //     return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    // }

    // public function destroy(Product $product)
    // {
    //     $product->delete();

    //     return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    // }
}
