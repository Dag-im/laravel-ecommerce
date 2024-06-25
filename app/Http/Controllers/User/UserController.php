<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartItem; // Assuming CartItem model exists
use App\Models\Product; // Assuming Product model exists
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch cart items for the authenticated user
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

        // Fetch products to display on the dashboard (example)
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();

        // Example of promotional banners (can be fetched from a Banner model if available)
        $banners = [
            (object) [
                'title' => 'Summer Sale!',
                'description' => 'Save big on our summer collection.',
            ],
            (object) [
                'title' => 'Limited Time Offer',
                'description' => 'Explore our new arrivals before they sell out.',
            ],
        ];

        return view('user.dashboard', [
            'cartItems' => $cartItems,
            'products' => $products,
            'banners' => $banners,
        ]);
    }
}
