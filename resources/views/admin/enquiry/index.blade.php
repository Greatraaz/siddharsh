@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h3 mb-0 text-gray-800">All Customer Enquiries</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Status</th>
                            <th class="py-3">Type</th>
                            <th class="py-3">Date</th>
                            <th class="py-3">Name</th>
                            <th class="py-3">Details</th>
                            <th class="py-3 text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($enquiries as $enquiry)
                        <tr class="{{ $enquiry->is_read ? 'text-muted' : 'fw-bold' }}">
                            <td class="px-4">
                                @if($enquiry->is_read)
                                    <span class="badge bg-light text-muted border">Read</span>
                                @else
                                    <span class="badge bg-primary">New</span>
                                @endif
                            </td>
                            <td>
                                @if($enquiry->product_id)
                                    <span class="badge bg-info-subtle text-info border border-info-subtle">Product</span>
                                @elseif($enquiry->brand_id)
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Brand</span>
                                @else
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">Contact</span>
                                @endif
                            </td>
                            <td>{{ $enquiry->created_at->format('d M, Y') }}</td>
                            <td>
                                <div class="fw-bold">{{ $enquiry->name }}</div>
                                <div class="small text-muted">{{ $enquiry->email }}</div>
                            </td>
                            <td>
                                @if($enquiry->product)
                                    <div class="small fw-bold text-dark">Prod: {{ Str::limit($enquiry->product->name, 25) }}</div>
                                @elseif($enquiry->brand)
                                    <div class="small fw-bold text-dark">Brand: {{ $enquiry->brand->name }}</div>
                                @elseif($enquiry->subject)
                                    <div class="small fw-bold text-dark">Sub: {{ Str::limit($enquiry->subject, 25) }}</div>
                                @else
                                    <span class="text-muted small">No specific details</span>
                                @endif
                            </td>
                            <td class="text-end px-4">
                                <div class="btn-group shadow-sm rounded">
                                    <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-sm btn-white border" title="View Detail">
                                        <i class="fa-solid fa-eye text-primary"></i>
                                    </a>
                                    @if(!$enquiry->is_read)
                                    <form action="{{ route('admin.enquiries.mark-as-read', $enquiry->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-white border" title="Mark as Read">
                                            <i class="fa-solid fa-check text-success"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this enquiry?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white border" title="Delete">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fa-solid fa-envelope-open fa-3x mb-3 opacity-25"></i>
                                    <p class="mb-0">No enquiries found yet.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($enquiries->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            {{ $enquiries->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn-white { background: #fff; }
    .btn-white:hover { background: #f8f9fa; }
    .fw-bold { font-weight: 600 !important; }
</style>
@endpush
