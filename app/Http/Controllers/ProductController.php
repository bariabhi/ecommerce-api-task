<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        return Cache::remember('products', 60, function () {
            return Product::all();
        });
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::create($validated);
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return Cache::remember("product_{$id}", 60, function () use ($id) {
            return Product::findOrFail($id);
        });
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer',
        ]);

        $product = Product::findOrFail($id);
        $updatedProduct = $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $updatedProduct,
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'],200);
    }
}

