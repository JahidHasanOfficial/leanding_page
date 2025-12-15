@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Product Details</h1>
    <div>
        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>

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
        <div class="card">
            <div class="card-body">
                <h2>{{ $product->name }}</h2>
                <p class="text-muted">{{ $product->description }}</p>
                
                <hr>
                
                <div class="mb-3">
                    <strong>Price:</strong> <span class="text-primary fs-4">${{ number_format($product->price, 2) }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Stock:</strong> 
                    <span class="badge {{ $product->stock < 10 ? 'bg-warning' : 'bg-success' }} fs-6">
                        {{ $product->stock }} units
                    </span>
                </div>
                
                <div class="mb-3">
                    <strong>Status:</strong> 
                    @if($product->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <strong>Created:</strong> {{ $product->created_at->format('F d, Y') }}
                </div>
                
                <div class="mb-3">
                    <strong>Last Updated:</strong> {{ $product->updated_at->format('F d, Y') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

