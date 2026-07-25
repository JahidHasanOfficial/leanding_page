<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');

        // Filter by category if provided
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $products = $query->paginate(12);
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $selectedCategory = $request->category;

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function landing()
    {
        $products = Product::where('is_active', true)->get();
        
        // Find a smartwatch or headphones as featured, or default to the first active product
        $featuredProduct = Product::where('is_active', true)
            ->where('name', 'like', '%Smart Watch%')
            ->first();

        if (!$featuredProduct) {
            $featuredProduct = Product::where('is_active', true)->first();
        }

        return view('landing', compact('products', 'featuredProduct'));
    }
}
