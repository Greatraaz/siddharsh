@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 bg-primary text-white shadow-lg overflow-hidden" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5 position-relative">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-2">Welcome back, {{ auth()->user()->name }}! 👋</h2>
                            <p class="lead opacity-75 mb-0">Here's what's happening with your store today. You have {{ $enquiriesCount }} new enquiries to review.</p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="row g-4 mb-4">
        @can('view-brands')
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-primary-soft p-3">
                            <i class="fa-solid fa-copyright text-primary fs-4"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">+{{ rand(2, 8) }}%</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">Total Brands</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $brandsCount }}</h3>
                </div>
            </div>
        </div>
        @endcan

        @can('view-products')
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-success bg-opacity-10 p-3">
                            <i class="fa-solid fa-box text-success fs-4"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">+{{ rand(5, 15) }}%</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">Total Products</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $productsCount }}</h3>
                </div>
            </div>
        </div>
        @endcan

        @can('view-enquiries')
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-warning bg-opacity-10 p-3">
                            <i class="fa-solid fa-envelope-open-text text-warning fs-4"></i>
                        </div>
                        <span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3">New</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">Enquiries</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $enquiriesCount }}</h3>
                </div>
            </div>
        </div>
        @endcan

        @can('view-users')
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-info bg-opacity-10 p-3">
                            <i class="fa-solid fa-users text-info fs-4"></i>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Active</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">Total Users</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $usersCount }}</h3>
                </div>
            </div>
        </div>
        @endcan
    </div>

    <div class="row g-4">
        <!-- Recent Enquiries -->
        @can('view-enquiries')
        <div class="col-12 col-xl-7">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-header bg-transparent border-0 p-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-dark">Recent Enquiries</h5>
                    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm btn-light rounded-pill px-3">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 border-0">Name</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Date</th>
                                    <th class="text-end pe-4 border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentEnquiries as $enquiry)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-medium">{{ $enquiry->name }}</div>
                                        <div class="small text-muted">{{ Str::limit($enquiry->subject, 30) }}</div>
                                    </td>
                                    <td>{{ $enquiry->email }}</td>
                                    <td>{{ $enquiry->created_at->format('M d, Y') }}</td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-icon btn-sm btn-light rounded-circle">
                                            <i class="fa-solid fa-eye text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <img src="https://illustrations.popsy.co/white/data-analysis.svg" height="100" class="mb-3 opacity-50">
                                        <p class="mb-0">No enquiries found</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        <!-- Recent Products -->
        @can('view-products')
        <div class="col-12 col-xl-5">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-header bg-transparent border-0 p-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-dark">Recently Added</h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light rounded-pill px-3">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="px-4 pb-4">
                        @forelse($recentProducts as $product)
                        <div class="d-flex align-items-center mb-3 p-2 rounded-3 hover-bg-light transition-all">
                            <div class="flex-shrink-0">
                                @if($product->thumbnail)
                                    <img src="{{ asset('uploads/products/'.$product->thumbnail) }}" width="48" height="48" class="rounded-3 object-fit-cover">
                                @else
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted" style="width:48px; height:48px;">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0 fw-semibold text-dark">{{ $product->name }}</h6>
                                <span class="small text-muted">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <span class="badge {{ $product->status == 1 ? 'bg-success' : 'bg-danger' }} bg-opacity-10 {{ $product->status == 1 ? 'text-success' : 'text-danger' }} rounded-pill px-2">
                                    {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-5 text-muted">
                            <p class="mb-0">No products found</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
</div>

<style>
    .transition-all {
        transition: all 0.2s ease-in-out;
    }
    .hover-bg-light:hover {
        background-color: #f8fafc;
        transform: translateX(5px);
    }
    .btn-icon {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .bg-primary-soft {
        background-color: rgba(99, 102, 241, 0.1);
    }
</style>
@endsection
