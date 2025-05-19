<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Str;

class OrderService
{
    public function createOrder(array $data, array $cartItems): Order
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $data['total_amount'],
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $data['payment_method'],
            'shipping_address' => $data['shipping_address'],
            'shipping_city' => $data['shipping_city'],
            'shipping_state' => $data['shipping_state'],
            'shipping_country' => $data['shipping_country'],
            'shipping_zipcode' => $data['shipping_zipcode'],
            'shipping_phone' => $data['shipping_phone'],
            'notes' => $data['notes'] ?? null,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->final_price,
                'subtotal' => $item->subtotal
            ]);

            // Update product stock
            $product = Product::find($item->product_id);
            $product->stock -= $item->quantity;
            $product->save();
        }

        return $order;
    }

    public function updateOrderStatus(Order $order, string $status): bool
    {
        return $order->update(['status' => $status]);
    }

    public function updatePaymentStatus(Order $order, string $status): bool
    {
        return $order->update(['payment_status' => $status]);
    }

    public function getOrderDetails(Order $order)
    {
        return $order->load(['items.product', 'user']);
    }

    public function getUserOrders(int $userId)
    {
        return Order::with(['items.product'])
            ->where('user_id', $userId)
            ->latest()
            ->get();
    }
} 