<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display the landing/home page.
     */
    public function index()
    {
        $products = Product::where('is_active', true)->get();
        
        // Find a smartwatch or headphones as featured, or default to the first active product
        $featuredProduct = Product::where('is_active', true)
            ->where('name', 'like', '%Smart Watch%')
            ->first();

        if (!$featuredProduct) {
            $featuredProduct = Product::where('is_active', true)->first();
        }

        return view('frontend.home.index', compact('products', 'featuredProduct'));
    }
}
