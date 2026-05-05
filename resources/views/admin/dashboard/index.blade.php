@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h3 class="fw-bold">Dashboard</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Total Brands -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                        <i class="fa-solid fa-copyright text-primary fs-4"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success">+12%</span>
                </div>
                <h6 class="text-muted fw-semibold mb-1">Total Brands</h6>
                <h3 class="fw-bold mb-0">{{ $brandsCount }}</h3>
            </div>
        </div>
    </div>
    <!-- Total Categories -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-info bg-opacity-10 p-3">
                        <i class="fa-solid fa-layer-group text-info fs-4"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success">+5%</span>
                </div>
                <h6 class="text-muted fw-semibold mb-1">Total Categories</h6>
                <h3 class="fw-bold mb-0">{{ $categoriesCount }}</h3>
            </div>
        </div>
    </div>
    <!-- Total Subcategories -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                        <i class="fa-solid fa-list-ul text-warning fs-4"></i>
                    </div>
                    <span class="badge bg-danger bg-opacity-10 text-danger">-2%</span>
                </div>
                <h6 class="text-muted fw-semibold mb-1">Total Subcategories</h6>
                <h3 class="fw-bold mb-0">{{ $subcategoriesCount }}</h3>
            </div>
        </div>
    </div>
    <!-- Total Products -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-success bg-opacity-10 p-3">
                        <i class="fa-solid fa-box text-success fs-4"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success">+18%</span>
                </div>
                <h6 class="text-muted fw-semibold mb-1">Total Products</h6>
                <h3 class="fw-bold mb-0">{{ $productsCount }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Latest Products -->
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-white">
                <h5 class="mb-0">Latest Products</h5>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Product</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProducts as $product)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        @if($product->thumbnail)
                                            <img src="{{ asset('uploads/products/'.$product->thumbnail) }}" width="40" height="40" class="rounded-3 object-fit-cover me-3">
                                        @else
                                            <div class="bg-light rounded-3 me-3 d-flex align-items-center justify-content-center text-muted" style="width:40px; height:40px;">
                                                <i class="fa-solid fa-image"></i>
                                            </div>
                                        @endif
                                        <span class="fw-medium">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td>
                                    @if($product->status == '1')
                                        <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4 text-muted small">{{ $product->created_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No products found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>
@endsection
