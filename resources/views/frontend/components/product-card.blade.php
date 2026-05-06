@props(['product'])

@php
    $thumb = $product->thumbnail;
    if ($thumb && !filter_var($thumb, FILTER_VALIDATE_URL)) {
        $thumb = asset('uploads/products/' . $thumb);
    }
@endphp

<div class="prod-card h-100">
    <div class="prod-card-img-wrap">
        <a href="{{ route('product.details', $product->slug) }}" class="prod-card-img-link">
            @if($thumb)
                <img src="{{ $thumb }}"
                     alt="{{ $product->name }}"
                     class="prod-card-img"
                     loading="lazy">
            @else
                <div class="prod-card-no-img">
                    <i class="fas fa-box-open"></i>
                </div>
            @endif
        </a>

        {{-- Brand badge --}}
        @if($product->brand)
        <div class="prod-card-brand-badge">
            {{ $product->brand->name }}
        </div>
        @endif
    </div>

    <div class="prod-card-body">
        {{-- Category path --}}
        <div class="prod-card-cat">
            @if($product->category)
                <a href="{{ route('category.products', $product->category->slug) }}" class="prod-card-cat-link">
                    {{ $product->category->name }}
                </a>
                @if($product->subcategory)
                    <span class="prod-card-cat-sep">›</span>
                    <span class="prod-card-cat-link">{{ $product->subcategory->name }}</span>
                @endif
            @endif
        </div>

        {{-- Product name --}}
        <h3 class="prod-card-title">
            <a href="{{ route('product.details', $product->slug) }}" class="prod-card-title-link">
                {{ $product->name }}
            </a>
        </h3>

        {{-- Actions --}}
        <div class="prod-card-footer">
            <a href="{{ route('product.details', $product->slug) }}" class="btn-inquiry btn-sm-pill prod-card-inquiry">
                <i class="fas fa-paper-plane"></i> Send Inquiry
            </a>
            <a href="{{ route('product.details', $product->slug) }}" class="prod-card-details-link" aria-label="View details">
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<style>
/* ─── PRODUCT CARD ───────────────────────────────────── */
.prod-card {
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    overflow: hidden;
    transition: var(--transition);
    display: flex;
    flex-direction: column;
}
.prod-card:hover {
    border-color: var(--primary);
    box-shadow: 0 12px 40px rgba(3,138,107,0.12);
    transform: translateY(-6px);
}

/* Image */
.prod-card-img-wrap {
    position: relative;
    background: var(--bg-light);
    height: 220px;
    overflow: hidden;
}
.prod-card-img-link {
    display: block;
    width: 100%; height: 100%;
}
.prod-card-img {
    width: 100%; height: 100%;
    object-fit: contain;
    padding: 16px;
    transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
}
.prod-card:hover .prod-card-img { transform: scale(1.06); }

.prod-card-no-img {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: var(--bg-light-2);
    color: var(--text-light);
    font-size: 2.5rem;
}

/* Brand badge */
.prod-card-brand-badge {
    position: absolute;
    top: 12px; left: 12px;
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(6px);
    border: 1px solid var(--border);
    border-radius: 50px;
    padding: 4px 12px;
    font-size: 0.68rem;
    font-weight: 700;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    box-shadow: var(--shadow-sm);
}

/* Body */
.prod-card-body {
    padding: 18px 20px 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: 6px;
}

/* Category path */
.prod-card-cat {
    display: flex;
    align-items: center;
    gap: 5px;
    flex-wrap: wrap;
}
.prod-card-cat-link {
    font-size: 0.72rem;
    font-weight: 600;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.06em;
    transition: var(--transition-fast);
}
.prod-card-cat-link:hover { color: var(--primary); }
.prod-card-cat-sep { color: var(--text-light); font-size: 0.72rem; }

/* Title */
.prod-card-title {
    font-size: 0.95rem;
    font-weight: 700;
    line-height: 1.4;
    margin: 4px 0 0;
    flex: 1;
}
.prod-card-title-link {
    color: var(--text-main);
    transition: var(--transition-fast);
}
.prod-card-title-link:hover { color: var(--primary); }

/* SKU */
.prod-card-sku {
    font-size: 0.72rem;
    color: var(--text-light);
    font-weight: 500;
    margin: 0;
}

/* Footer actions */
.prod-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 14px;
    padding-top: 14px;
    border-top: 1px solid var(--border-light);
    gap: 10px;
}

.prod-card-inquiry { flex: 1; justify-content: center; font-size: 0.78rem; }

.prod-card-details-link {
    width: 36px; height: 36px;
    border-radius: 50%;
    border: 1.5px solid var(--border);
    display: inline-flex; align-items: center; justify-content: center;
    color: var(--text-muted);
    font-size: 0.8rem;
    flex-shrink: 0;
    transition: var(--transition-fast);
}
.prod-card-details-link:hover {
    border-color: var(--primary);
    color: var(--primary);
    background: var(--primary-soft);
}
</style>
