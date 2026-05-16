@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 bg-primary text-white shadow-lg overflow-hidden" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-2">Administrator Console 👋</h2>
                            <p class="lead opacity-75 mb-0">Total system oversight. You have full control over users, roles, settings, and all catalog modules.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Metrics -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-primary bg-opacity-10 p-3"><i class="fa-solid fa-users text-primary fs-4"></i></div>
                        <span class="text-success small fw-bold">Active</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">Total Users</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $usersCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-success bg-opacity-10 p-3"><i class="fa-solid fa-box text-success fs-4"></i></div>
                        <span class="text-muted small">Catalog</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">Products</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $productsCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-warning bg-opacity-10 p-3"><i class="fa-solid fa-envelope text-warning fs-4"></i></div>
                        <span class="badge bg-danger rounded-pill">New</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">Enquiries</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $enquiriesCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="rounded-3 bg-info bg-opacity-10 p-3"><i class="fa-solid fa-shield-halved text-info fs-4"></i></div>
                        <span class="text-muted small">Access</span>
                    </div>
                    <h6 class="text-muted fw-semibold mb-1">System Roles</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $rolesCount }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Users -->
        <div class="col-xl-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-transparent border-0 p-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Latest Users</h5>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light rounded-pill px-3">Manage</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 border-0">User</th>
                                    <th class="border-0">Role</th>
                                    <th class="text-end pe-4 border-0">Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $u)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-dark">{{ $u->name }}</div>
                                        <div class="small text-muted">{{ $u->email }}</div>
                                    </td>
                                    <td>
                                        @foreach($u->roles as $role)
                                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-2">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-end pe-4 small text-muted">{{ $u->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="col-xl-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-transparent border-0 p-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Recent Products</h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light rounded-pill px-3">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 border-0">Product</th>
                                    <th class="border-0">Category</th>
                                    <th class="text-end pe-4 border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentProducts as $p)
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">{{ Str::limit($p->name, 30) }}</td>
                                    <td><span class="small text-muted">{{ $p->category->name ?? 'N/A' }}</span></td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm btn-light-primary"><i class="fa-solid fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
