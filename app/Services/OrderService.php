<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderService
{
    /**
     * Place a direct Cash on Delivery order from the landing page.
     *
     * @param array $data
     * @param int|null $userId
     * @return Order
     * @throws Exception
     */
    public function placeDirectOrder(array $data, ?int $userId = null): Order
    {
        return Order::resolveConnection()->transaction(function () use ($data, $userId) {
            $product = Product::findOrFail($data['product_id']);

            if (!$product->is_active) {
                throw new Exception("The product '{$product->name}' is not currently available for purchase.");
            }

            if ($product->stock < $data['quantity']) {
                throw new Exception("Insufficient stock for '{$product->name}'. Available: {$product->stock}.");
            }

            $totalAmount = $product->price * $data['quantity'];

            // Create Order
            $order = Order::create([
                'user_id' => $userId,
                'customer_name' => $data['customer_name'],
                'customer_phone' => $data['customer_phone'],
                'customer_email' => $data['customer_email'] ?? null,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'shipping_address' => $data['shipping_address'],
                'shipping_city' => $data['shipping_city'] ?? null,
                'shipping_postal_code' => $data['shipping_postal_code'] ?? null,
                'shipping_country' => $data['shipping_country'] ?? 'Bangladesh',
                'note' => $data['note'] ?? null,
            ]);

            // Create Order Item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $data['quantity'],
                'price' => $product->price,
            ]);

            // Decrement Stock
            $product->decrement('stock', $data['quantity']);

            return $order;
        });
    }

    /**
     * Place an order from the user's shopping cart.
     *
     * @param array $data
     * @param int $userId
     * @return Order
     * @throws Exception
     */
    public function placeCartOrder(array $data, int $userId): Order
    {
        return Order::resolveConnection()->transaction(function () use ($data, $userId) {
            $user = User::findOrFail($userId);
            
            $cartItems = Cart::where('user_id', $userId)
                ->with('product')
                ->get();

            if ($cartItems->isEmpty()) {
                throw new Exception("Your shopping cart is empty.");
            }

            $total = 0;
            foreach ($cartItems as $item) {
                if (!$item->product->is_active) {
                    throw new Exception("Product '{$item->product->name}' is no longer active.");
                }
                if ($item->product->stock < $item->quantity) {
                    throw new Exception("Insufficient stock for product '{$item->product->name}'.");
                }
                $total += $item->quantity * $item->product->price;
            }

            // Create Order
            $order = Order::create([
                'user_id' => $userId,
                'customer_name' => $user->name,
                'customer_phone' => $data['customer_phone'] ?? 'N/A',
                'customer_email' => $user->email,
                'total_amount' => $total,
                'status' => 'pending',
                'shipping_address' => $data['shipping_address'],
                'shipping_city' => $data['shipping_city'] ?? null,
                'shipping_postal_code' => $data['shipping_postal_code'] ?? null,
                'shipping_country' => $data['shipping_country'] ?? 'Bangladesh',
                'note' => $data['note'] ?? null,
            ]);

            // Create Order Items & Decrement Stock
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                ]);

                $cartItem->product->decrement('stock', $cartItem->quantity);
            }

            // Clear Cart
            Cart::where('user_id', $userId)->delete();

            return $order;
        });
    }
}
