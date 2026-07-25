<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderStatusRequest;
use App\Models\Order;

class OrderManagementController extends Controller
{
    /**
     * Display a listing of orders in the admin dashboard.
     */
    public function index()
    {
        $orders = Order::with('user', 'orderItems.product')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the details of a specific order.
     */
    public function show(Order $order)
    {
        $order->load('user', 'orderItems.product');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the status of an order.
     */
    public function updateStatus(UpdateOrderStatusRequest $request, Order $order)
    {
        $order->update($request->validated());

        return back()->with('success', 'Order status updated successfully!');
    }
}
