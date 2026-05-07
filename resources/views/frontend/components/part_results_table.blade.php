<div class="table-responsive">
    <table class="table table-hover align-middle mb-0" id="part-results-table">
        <thead class="bg-light">
            <tr>
                <th class="ps-4">QTY</th>
                <th>Manufacturer</th>
                <th>Part Number</th>
                <th>Spec Sheet</th>
                <th>Part Drawing</th>
                <th>Obsolete</th>
                <th>Product Image</th>
                <th>Minimum</th>
                <th class="text-center">Link to product</th>
                <th class="pe-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                @php 
                    $pImg = $product->thumbnail ? asset('uploads/products/'.$product->thumbnail) : 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=100&q=80'; 
                @endphp
                <tr>
                    <td class="ps-4" style="width: 100px;">
                        <input type="number" class="form-control form-control-sm part-qty" value="1" min="1">
                    </td>
                    <td>
                        <span class="fw-600">{{ $product->brand->name ?? 'Enterprise' }}</span>
                    </td>
                    <td>
                        <span class="badge bg-primary-soft text-primary px-2 py-1 fs-xs fw-700 rounded-pill">{{ $product->part_code }}</span>
                    </td>
                    <td>
                        <a href="#" class="text-muted fs-xs"><i class="fas fa-file-pdf me-1"></i> Download</a>
                    </td>
                    <td>
                        <a href="#" class="text-muted fs-xs"><i class="fas fa-file-image me-1"></i> View</a>
                    </td>
                    <td>
                        <span class="badge bg-success-soft text-success px-2 py-1 fs-xs fw-700 rounded-pill">No</span>
                    </td>
                    <td>
                        <div class="part-thumb">
                            <img src="{{ $pImg }}" alt="{{ $product->name }}" style="width: 40px; height: 40px; object-fit: contain; border-radius: 4px; background: #f8fafc;">
                        </div>
                    </td>
                    <td>
                        <span class="fs-xs fw-600">1 unit</span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('product.details', $product->slug) }}" class="btn btn-sm btn-link text-primary p-0 fw-700">View Details</a>
                    </td>
                    <td class="pe-4 text-center">
                        <button class="btn btn-primary btn-sm fw-700 px-3 add-to-list-btn" 
                                data-id="{{ $product->id }}" 
                                data-name="{{ $product->name }}" 
                                data-code="{{ $product->part_code }}" 
                                data-brand="{{ $product->brand->name ?? 'Enterprise' }}"
                                data-image="{{ $pImg }}"
                                data-url="{{ route('product.details', $product->slug) }}">
                            Add
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center py-5">
                        <div class="empty-state-box">
                            <div class="icon-wrap mb-3"><i class="fas fa-search fa-2x text-muted"></i></div>
                            <h5 class="fw-700 mb-2">No matching parts found</h5>
                            <p class="text-muted fs-sm mb-0">Try searching for a different part number or SKU.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($products instanceof \Illuminate\Contracts\Pagination\Paginator && $products->hasPages())
<div class="p-4 border-top">
    <div class="d-flex justify-content-center ajax-pagination">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endif
