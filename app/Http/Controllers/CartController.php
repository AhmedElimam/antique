<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        $cart = session('cart', []);
        $found = false;

        foreach ($cart as &$item) {
            if ($item['product']->id === $product->id) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        unset($item); // break reference

        if (!$found) {
            $cart[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'product' => $product
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('cart')->with('success', 'Product added to cart successfully.');
    }

    public function index()
    {
        $cartItems = session('cart', []);
        $subtotal = 0;
        $total = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item['product']->price * $item['quantity'];
        }

        $total = $subtotal; // Add any additional costs like shipping or taxes if needed

        return view('shop.cart', compact('cartItems', 'subtotal', 'total'));
    }

    public function remove(Request $request)
    {
        $id = $request->product_id;
        $cart = session('cart', []);
        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['product_id'] != $id;
        });
        session(['cart' => array_values($cart)]);
        return redirect()->route('cart')->with('success', 'Product removed from cart.');
    }
} 