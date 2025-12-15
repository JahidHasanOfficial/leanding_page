@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Category Details</h1>
    <div>
        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">{{ $category->name }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Slug:</strong> <code>{{ $category->slug }}</code>
                </div>
                
                @if($category->description)
                    <div class="mb-3">
                        <strong>Description:</strong>
                        <p>{{ $category->description }}</p>
                    </div>
                @endif
                
                <div class="mb-3">
                    <strong>Status:</strong> 
                    @if($category->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <strong>Total Products:</strong> 
                    <span class="badge bg-info">{{ $category->products->count() }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Created:</strong> {{ $category->created_at->format('F d, Y') }}
                </div>
                
                <div class="mb-3">
                    <strong>Last Updated:</strong> {{ $category->updated_at->format('F d, Y') }}
                </div>
            </div>
        </div>

        @if($category->products->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Products in this Category</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>${{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            @if($product->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                No products in this category yet.
            </div>
        @endif
    </div>
</div>
@endsection

