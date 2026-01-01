<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products with search and pagination.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search by product name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category (HP or Laptop)
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(12);
        $totalProducts = Product::count();

        return view('products.index', compact('products', 'totalProducts'));
    }

    /**
     * Display the specified product by slug.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            abort(404, 'Product not found.');
        }

        return view('products.show', compact('product'));
    }
}
