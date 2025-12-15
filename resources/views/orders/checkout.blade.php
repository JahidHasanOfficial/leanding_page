@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<h1 class="mb-4">Checkout</h1>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Shipping Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('shipping_address') is-invalid @enderror" 
                               id="shipping_address" name="shipping_address" 
                               value="{{ old('shipping_address') }}" required>
                        @error('shipping_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="shipping_city" class="form-label">City</label>
                            <input type="text" class="form-control @error('shipping_city') is-invalid @enderror" 
                                   id="shipping_city" name="shipping_city" 
                                   value="{{ old('shipping_city') }}" required>
                            @error('shipping_city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="shipping_postal_code" class="form-label">Postal Code</label>
                            <input type="text" class="form-control @error('shipping_postal_code') is-invalid @enderror" 
                                   id="shipping_postal_code" name="shipping_postal_code" 
                                   value="{{ old('shipping_postal_code') }}" required>
                            @error('shipping_postal_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="shipping_country" class="form-label">Country</label>
                        <input type="text" class="form-control @error('shipping_country') is-invalid @enderror" 
                               id="shipping_country" name="shipping_country" 
                               value="{{ old('shipping_country') }}" required>
                        @error('shipping_country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">Order Items</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>${{ number_format($item->product->price, 2) }}</td>
                                            <td>${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cart.index') }}" class="btn btn-secondary">Back to Cart</a>
                        <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Order Summary</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span>Subtotal:</span>
                    <strong>${{ number_format($total, 2) }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Shipping:</span>
                    <strong>Free</strong>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span><strong>Total:</strong></span>
                    <strong class="text-primary fs-5">${{ number_format($total, 2) }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

