<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;

class CartService
{
    public function addToCart(Product $product, int $quantity = 1, ?int $userId = null): Cart
    {
        $sessionId = session()->getId();

        $cartItem = Cart::updateOrCreate(
            [
                'product_id' => $product->id,
                'session_id' => $sessionId,
                'user_id' => $userId
            ],
            [
                'quantity' => $quantity
            ]
        );

        return $cartItem;
    }

    public function removeFromCart(int $cartId): bool
    {
        return Cart::where('id', $cartId)->delete();
    }

    public function updateQuantity(int $cartId, int $quantity): bool
    {
        return Cart::where('id', $cartId)->update(['quantity' => $quantity]);
    }

    public function getCartItems(?int $userId = null)
    {
        $sessionId = session()->getId();
        
        return Cart::with('product')
            ->where('session_id', $sessionId)
            ->when($userId, function ($query) use ($userId) {
                return $query->orWhere('user_id', $userId);
            })
            ->get();
    }

    public function getCartTotal(?int $userId = null)
    {
        return $this->getCartItems($userId)->sum('subtotal');
    }

    public function clearCart(?int $userId = null): bool
    {
        $sessionId = session()->getId();
        
        return Cart::where('session_id', $sessionId)
            ->when($userId, function ($query) use ($userId) {
                return $query->orWhere('user_id', $userId);
            })
            ->delete();
    }
} 