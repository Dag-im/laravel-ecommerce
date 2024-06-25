<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();
        return view('user.dashboard', compact('cartItems'));
    }


    public function addToCart(Request $request, Product $product)
    {
        // Check if the product is already in the user's cart
        $cartItem = CartItem::where('user_id', auth()->id())
                            ->where('product_id', $product->id)
                            ->first();

        if ($cartItem) {
            // If the product exists in the cart, increment its quantity
            $cartItem->update([
                'quantity' => $cartItem->quantity + 1,
            ]);
        } else {
            // If the product doesn't exist in the cart, create a new cart item
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        // Respond with JSON if requested via AJAX
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Product added to cart.']);
        }

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Product added to cart.');
    }

    public function removeFromCart(Request $request, CartItem $cartItem)
    {
        // Ensure the user owns the cart item before deleting
        if ($cartItem->user_id == auth()->id()) {
            $cartItem->delete();
        }

        // Respond with JSON if requested via AJAX
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Product removed from cart.']);
        }

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Product removed from cart.');
    }
}
