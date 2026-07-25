<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $cartCount = 0;
        $cartItems = collect();
        $cartTotal = 0;

        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
            $cartCount = $cartItems->sum('quantity');
            $cartTotal = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
        }

        $view->with([
            'cartCount' => $cartCount,
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }
}
