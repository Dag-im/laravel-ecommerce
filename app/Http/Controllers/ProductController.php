<?php

namespace App\Http\Controllers;

use App\Models\Product; // Ensure Product model is imported
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.products.index', compact('products'));
    }
    public function show(Product $product)
    {
        return view('user.products.show', compact('product'));
    }
}