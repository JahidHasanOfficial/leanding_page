<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display the product catalog.
     */
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');

        // Filter by category if provided
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Filter by search query if provided
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);
        $selectedCategory = $request->category;

        return view('frontend.shop.index', compact('products', 'selectedCategory'));
    }
}
