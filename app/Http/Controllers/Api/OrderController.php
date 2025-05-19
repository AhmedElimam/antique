<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    protected $cartService;

    public function __construct(OrderService $orderService, CartService $cartService)
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    public function index()
    {
        $orders = $this->orderService->getUserOrders(auth()->id());
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string',
            'shipping_state' => 'required|string',
            'shipping_country' => 'required|string',
            'shipping_zipcode' => 'required|string',
            'shipping_phone' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $cartItems = $this->cartService->getCartItems(auth()->id());
        
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        $total = $this->cartService->getCartTotal(auth()->id());
        
        $order = $this->orderService->createOrder([
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_state' => $request->shipping_state,
            'shipping_country' => $request->shipping_country,
            'shipping_zipcode' => $request->shipping_zipcode,
            'shipping_phone' => $request->shipping_phone,
            'notes' => $request->notes
        ], $cartItems);

        // Clear the cart after successful order
        $this->cartService->clearCart(auth()->id());

        return response()->json($order->load('items.product'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($this->orderService->getOrderDetails($order));
    }
} 