@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Our Products</h1>
</div>

@if($categories->count() > 0)
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Filter by Category</h5>
            <div class="btn-group" role="group">
                <a href="{{ route('products.index') }}" 
                   class="btn {{ !$selectedCategory ? 'btn-primary' : 'btn-outline-primary' }}">
                    All Products
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                       class="btn {{ $selectedCategory == $category->id ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if($products->count() > 0)
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-white">No Image</span>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        @if($product->category)
                            <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
                        @endif
                        <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                        <div class="mt-auto">
                            <p class="card-text">
                                <strong class="text-primary">${{ number_format($product->price, 2) }}</strong>
                            </p>
                            <p class="text-muted small">
                                Stock: {{ $product->stock }}
                            </p>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary w-100">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@else
    <div class="alert alert-info">
        No products available at the moment.
    </div>
@endif
@endsection

