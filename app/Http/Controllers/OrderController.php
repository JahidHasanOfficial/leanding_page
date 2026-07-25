<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
     * Display a listing of the user's orders.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        // Allow access to guest orders if session matches (using order number in session)
        // or if the authenticated user owns it.
        $canAccess = false;
        
        if (Auth::check() && $order->user_id === Auth::id()) {
            $canAccess = true;
        } elseif (session('last_order_number') === $order->order_number) {
            $canAccess = true;
        }

        if (!$canAccess) {
            abort(403, 'Unauthorized access.');
        }

        $order->load('orderItems.product');
        return view('orders.show', compact('order'));
    }

    /**
     * Show the checkout page for cart items.
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

        return view('orders.checkout', compact('cartItems', 'total'));
    }

    /**
     * Store a new order from cart.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $order = $this->orderService->placeCartOrder($request->validated(), Auth::id());
            
            // Store order number in session to allow guest success view access
            session(['last_order_number' => $order->order_number]);

            return redirect()->route('orders.show', $order)
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a direct Cash on Delivery order from the landing page.
     */
    public function storeDirect(StoreDirectOrderRequest $request)
    {
        try {
            $order = $this->orderService->placeDirectOrder(
                $request->validated(),
                Auth::id() // Will be null if guest
            );

            // Store order number in session to display order details on the success page
            session(['last_order_number' => $order->order_number]);

            return redirect()->route('orders.success', ['order_number' => $order->order_number])
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

        return view('orders.success', compact('order'));
    }
}
