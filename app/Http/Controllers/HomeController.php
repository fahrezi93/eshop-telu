<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display the homepage with latest products.
     */
    public function index()
    {
        $products = Product::latest()
            ->take(8)
            ->get();

        return view('home', compact('products'));
    }
}
