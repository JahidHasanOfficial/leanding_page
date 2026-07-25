<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $orderService;

    /**
     * Inject OrderService.
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Show the checkout page.
     */
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('frontend.checkout.index', compact('cartItems', 'total'));
    }

    /**
     * Place an order from the user's cart.
     */
    public function store(CheckoutRequest $request)
    {
        try {
            $order = $this->orderService->placeCartOrder($request->validated(), Auth::id());
            
            // Store order number in session to allow guest success view access
            session(['last_order_number' => $order->order_number]);

            $redirectRoute = $request->routeIs('orders.*') ? 'orders.show' : 'checkout.orders.show';

            return redirect()->route($redirectRoute, $order)
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Place a direct Cash on Delivery order from the landing page.
     */
    public function storeDirect(CheckoutRequest $request)
    {
        try {
            $order = $this->orderService->placeDirectOrder(
                $request->validated(),
                Auth::id() // Will be null if guest
            );

            // Store order number in session to display order details on the success page
            session(['last_order_number' => $order->order_number]);

            $redirectRoute = $request->routeIs('orders.*') ? 'orders.success' : 'checkout.success';

            return redirect()->route($redirectRoute, ['order_number' => $order->order_number])
                ->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the order success/thank-you page.
     */
    public function success(Request $request)
    {
        $orderNumber = $request->query('order_number');

        if (!$orderNumber || session('last_order_number') !== $orderNumber) {
            return redirect()->route('home');
        }

        $order = Order::where('order_number', $orderNumber)
            ->with('orderItems.product')
            ->firstOrFail();

        return view('frontend.checkout.success', compact('order'));
    }

    /**
     * Show list of customer's orders.
     */
    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('frontend.user.orders', compact('orders'));
    }

    /**
     * Show detailed view of a customer order.
     */
    public function orderDetail(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        $order->load('orderItems.product');
        return view('frontend.user.order-detail', compact('order'));
    }
}
