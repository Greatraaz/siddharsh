@extends('admin.layouts.app')

@section('title', 'Products Management')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="fw-bold text-dark mb-1">Products Management</h3>
            <p class="text-muted">Catalogue of all products, inventory, and specifications.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="d-flex justify-content-md-end gap-2 flex-wrap">
                @can('import-products')
                <a href="{{ route('admin.products.import') }}" class="btn btn-outline-primary rounded-pill px-3 shadow-sm">
                    <i class="fa-solid fa-file-import me-1"></i> Import
                </a>
                @endcan
                @can('export-products')
                <a href="{{ route('admin.products.export') }}" class="btn btn-outline-success rounded-pill px-3 shadow-sm">
                    <i class="fa-solid fa-file-excel me-1"></i> Export
                </a>
                @endcan
                @can('create-products')
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
                    <i class="fa-solid fa-plus me-2"></i>Add Product
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="productTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 border-0 text-uppercase small fw-bold text-muted">#</th>
                                    <th class="border-0 text-uppercase small fw-bold text-muted">Product</th>
                                    <th class="border-0 text-uppercase small fw-bold text-muted">Brand / Code</th>
                                    <th class="border-0 text-uppercase small fw-bold text-muted">Category</th>
                                    <th class="border-0 text-uppercase small fw-bold text-muted">Status</th>
                                    <th class="text-end pe-4 border-0 text-uppercase small fw-bold text-muted">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($product->thumbnail)
                                                <img src="{{ asset('uploads/products/'.$product->thumbnail) }}" width="45" height="45" class="rounded-3 shadow-sm object-fit-cover border me-3">
                                            @else
                                                <div class="rounded-3 bg-light d-flex align-items-center justify-content-center text-muted border me-3" style="width: 45px; height: 45px;">
                                                    <i class="fa-solid fa-box small"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-bold text-dark">{{ $product->name }}</div>
                                                <div class="small text-muted">{{ Str::limit($product->short_description, 30) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $product->brand->name ?? 'No Brand' }}</div>
                                        <code class="small text-primary bg-primary bg-opacity-10 px-2 py-0 rounded">{{ $product->part_code }}</code>
                                    </td>
                                    <td>
                                        <div class="small">{{ $product->category->name ?? 'N/A' }}</div>
                                        <div class="smaller text-muted">{{ $product->subcategory->name ?? '' }}</div>
                                    </td>
                                    <td>
                                        @if($product->status == '1')
                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Active</span>
                                        @else
                                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group shadow-sm rounded-3 overflow-hidden">
                                            @can('edit-products')
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-white btn-sm px-3" title="Edit Product">
                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                            </a>
                                            @endcan
                                            
                                            @can('delete-products')
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-white btn-sm px-3 btn-delete" title="Delete Product">
                                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">No products found in the catalogue.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            "pageLength": 10,
            "ordering": true,
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Filter products..."
            }
        });

        $(document).on('click', '.btn-delete', function() {
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Delete Product?',
                text: "This product and all its related data will be permanently removed!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, Delete',
                borderRadius: '15px'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
</script>
@endpush

<style>
    .btn-white {
        background: #fff;
        border: 1px solid #e2e8f0;
    }
    .btn-white:hover {
        background: #f8fafc;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(99, 102, 241, 0.02);
    }
    .smaller { font-size: 0.75rem; }
</style>
@endsection
