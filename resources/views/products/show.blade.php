@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        @else
            <div class="bg-secondary d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                <span class="text-white fs-4">No Image</span>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">{{ $product->description }}</p>
        
        <div class="mb-3">
            <h3 class="text-primary">${{ number_format($product->price, 2) }}</h3>
        </div>

        <div class="mb-3">
            <p><strong>Stock:</strong> {{ $product->stock }} available</p>
        </div>

        @auth
            @if($product->stock > 0)
                <form action="{{ route('cart.store', $product) }}" method="POST" class="mb-3">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-auto">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" 
                                   value="1" min="1" max="{{ $product->stock }}" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-warning">
                    This product is currently out of stock.
                </div>
            @endif
        @else
            <div class="alert alert-info">
                <a href="{{ route('login') }}">Login</a> to add this product to your cart.
            </div>
        @endauth

        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>
</div>
@endsection

