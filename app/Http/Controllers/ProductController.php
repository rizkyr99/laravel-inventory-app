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
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'stock' => 'required|integer|min:0',
            'category' => 'required'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'stock' => 'required|integer|min:0',
            'category' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('product.trashed', compact('products'));
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.trashed')
            ->with('success', 'Product restored successfully');
    }

    public function forceDelete($id)
    {
        $barang = Product::withTrashed()->findOrFail($id);
        $barang->forceDelete();
        return redirect()->route('products.trashed')
            ->with('success', 'Product permanently deleted');
    }
}
