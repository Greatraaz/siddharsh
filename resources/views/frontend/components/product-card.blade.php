@props(['product'])

@php
    $thumb = $product->thumbnail;
    if ($thumb && !filter_var($thumb, FILTER_VALIDATE_URL)) {
        $thumb = asset('uploads/products/' . $thumb);
    }
@endphp

<div class="product-modern-card reveal h-100 shadow-sm">
    <div class="product-card-upper">
        @if($thumb)
            <img src="{{ $thumb }}" alt="{{ $product->name }}" class="product-card-img-main" loading="lazy" decoding="async">
        @else
            <div class="product-card-placeholder">
                <i class="fas fa-box-open"></i>
            </div>
        @endif
        
        @if($product->brand)
        <div class="prod-badge-brand">
            {{ $product->brand->name }}
        </div>
        @endif
    </div>
    <div class="product-card-lower">
        <div class="product-card-info">
            <h3 class="product-card-title">{{ $product->name }}</h3>
            <p class="product-card-text">{{ $product->short_description ?? 'High-quality industrial networking solution.' }}</p>
        </div>
        
        <div class="product-card-footer">
            <a href="{{ route('product.details', $product->slug) }}" class="product-card-action-full">
                Send Inquiry <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

<style>
/* ─── MODERN PRODUCT CARD ───────────────────────────── */
.product-modern-card {
    background: #fff;
    border-radius: 10px; /* Subtle border radius */
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    border: 1px solid #f0f0f0;
}

.product-modern-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.product-card-upper {
    height: 260px; /* Large image area */
    background: #fdfdfd; 
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px; /* Reduced padding for larger image */
    position: relative;
    overflow: hidden;
}

.product-card-img-main {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Keeps entire product visible */
    /* padding: 15px; Subtle breathing room */
    transition: transform 0.6s ease;
}

.product-modern-card:hover .product-card-img-main {
    transform: scale(1.1);
}

.prod-badge-brand {
    position: absolute;
    top: 12px; right: 12px;
    background: var(--primary);
    color: #fff;
    padding: 3px 10px;
    border-radius: 4px;
    font-size: 0.6rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    z-index: 2;
}

.product-card-lower {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    text-align: center;
    background: #fff;
}

.product-card-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 12px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 2.8rem;
}

.product-card-text {
    font-size: 0.8rem;
    color: #666;
    line-height: 1.5;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 2.4rem;
}

.product-card-footer {
    margin-top: auto;
    padding-top: 15px;
}

.product-card-action-full {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--primary);
    color: #fff !important;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s ease;
    width: 100%;
    text-decoration: none;
}

.product-card-action-full:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(3, 138, 107, 0.3);
}

.product-card-placeholder {
    font-size: 3.5rem;
    color: #eee;
}
</style>
