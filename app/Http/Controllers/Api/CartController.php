<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getCartItems(auth()->id());
        $total = $this->cartService->getCartTotal(auth()->id());

        return response()->json([
            'items' => $cartItems,
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $cartItem = $this->cartService->addToCart($product, $request->quantity, auth()->id());

        return response()->json($cartItem);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $this->cartService->updateQuantity($id, $request->quantity);
        return response()->json(['message' => 'Cart updated successfully']);
    }

    public function destroy($id)
    {
        $this->cartService->removeFromCart($id);
        return response()->json(['message' => 'Item removed from cart']);
    }

    public function clear()
    {
        $this->cartService->clearCart(auth()->id());
        return response()->json(['message' => 'Cart cleared successfully']);
    }
} 