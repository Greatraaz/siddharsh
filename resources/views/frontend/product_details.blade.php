@extends('frontend.layouts.master')

@php $settings = \App\Models\Setting::first(); @endphp
@section('title', ($product->meta_title ?: $product->name) . ' — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', $product->meta_description ?: strip_tags($product->short_description ?? 'View detailed specifications and information for ' . $product->name))
@section('meta_keywords', $product->meta_keywords ?: $product->tags)

@section('content')

{{-- ── Breadcrumb Banner ─────────────────────────────── --}}
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @if($product->category)
                <li class="breadcrumb-item"><a href="{{ route('category.products', $product->category->slug) }}">{{ $product->category->name }}</a></li>
                @endif
                <li class="breadcrumb-item active fw-700">Product Details</li>
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">{{ $product->name }}</h1>
        </div>
    </div>
</section>

{{-- ── Product Profile ──────────────────────────────── --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row g-5 align-items-start">

            {{-- Left: Gallery --}}
            <div class="col-lg-6">
                <div class="pd-gallery">
                    {{-- Main Image --}}
                    <div class="pd-gallery-main" id="galleryMain">
                        @php
                            $mainImg = $product->thumbnail
                                ? asset('uploads/products/'.$product->thumbnail)
                                : 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=900&q=80';
                        @endphp
                        <img src="{{ $mainImg }}" alt="{{ $product->name }}" id="mainProductImg" loading="lazy">
                        @if($product->brand)
                        <div class="pd-gallery-brand-badge">{{ $product->brand->name }}</div>
                        @endif
                    </div>

                    {{-- Thumbnails --}}
                    @php $thumbs = collect(); @endphp
                    @if($product->thumbnail)
                        @php $thumbs->push(['src' => asset('uploads/products/'.$product->thumbnail), 'alt' => $product->name]); @endphp
                    @endif
                    @foreach($product->images as $img)
                        @php 
                            $galleryPath = 'uploads/products/gallery/' . $img->image;
                            $thumbs->push(['src' => asset($galleryPath), 'alt' => $product->name]); 
                        @endphp
                    @endforeach

                    @if($thumbs->count() > 1)
                    <div class="pd-gallery-thumbs" id="galleryThumbs">
                        @foreach($thumbs as $i => $thumb)
                        <div class="pd-thumb {{ $i===0 ? 'active' : '' }}"
                             onclick="switchGalleryImage('{{ $thumb['src'] }}', this)"
                             role="button"
                             tabindex="0"
                             aria-label="View image {{ $i+1 }}">
                            <img src="{{ $thumb['src'] }}" alt="{{ $thumb['alt'] }}" loading="lazy">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right: Info --}}
            <div class="col-lg-6">
                <div class="pd-info-sticky" style="position:sticky;top:100px;">

                    {{-- Brand --}}
                    @if($product->brand)
                    <div class="pd-brand">
                        <span class="pd-brand-label">Brand</span>
                        <a href="{{ route('brand.products', $product->brand->slug) }}" class="pd-brand-name">
                            {{ $product->brand->name }}
                        </a>
                    </div>
                    @endif

                    {{-- Title --}}
                    <h1 class="pd-title">{{ $product->name }}</h1>

                    {{-- Category Path --}}
                    <div class="pd-cat-path">
                        @if($product->category)
                        <a href="{{ route('category.products', $product->category->slug) }}" class="pd-cat-crumb">{{ $product->category->name }}</a>
                        @endif
                        @if($product->subcategory)
                        <span class="pd-cat-sep"><i class="fas fa-chevron-right"></i></span>
                        <a href="{{ route('subcategory.products', $product->subcategory->slug) }}" class="pd-cat-crumb">{{ $product->subcategory->name }}</a>
                        @endif
                        @if($product->childCategory)
                        <span class="pd-cat-sep"><i class="fas fa-chevron-right"></i></span>
                        <a href="{{ route('childcategory.products', $product->childCategory->slug) }}" class="pd-cat-crumb">{{ $product->childCategory->name }}</a>
                        @endif
                    </div>


                    {{-- Short Description --}}
                    @if($product->short_description)
                    <div class="pd-short-desc">
                        {!! $product->short_description !!}
                    </div>
                    @endif

                    {{-- Quick Specs Box --}}
                    <div class="pd-quick-specs mb-4">
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="pd-qs-item">
                                    <span class="pd-qs-label">Part No.</span>
                                    <span class="pd-qs-val">{{ strtoupper(substr($product->slug, 0, 8)) }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pd-qs-item">
                                    <span class="pd-qs-label">Status</span>
                                    <span class="pd-qs-val text-primary">In Stock</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Inquiry CTA --}}
                    <div class="pd-cta-box shadow-sm">
                        <p class="pd-cta-label">Direct Corporate Inquiry</p>
                        <button type="button" 
                                class="btn btn-primary w-100 justify-content-center pd-inquiry-btn"
                                data-bs-toggle="modal" 
                                data-bs-target="#enquiryModal">
                            <i class="fas fa-paper-plane"></i> Get a Business Quote
                        </button>
                        <p class="pd-cta-note"><i class="fas fa-bolt"></i> Fast Response Guarantee</p>
                    </div>

                    {{-- Trust badges --}}
                    <div class="pd-trust-row">
                        <div class="pd-trust-item"><i class="fas fa-certificate"></i><span>Certified</span></div>
                        <div class="pd-trust-item"><i class="fas fa-shield-alt"></i><span>Secure</span></div>
                        <div class="pd-trust-item"><i class="fas fa-globe"></i><span>Global</span></div>
                        <div class="pd-trust-item"><i class="fas fa-headset"></i><span>Support</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── Tabs: Specs / Packaging / Additional Info ───── --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="pd-tabs-wrap">
            {{-- Tab Nav --}}
            <div class="pd-tab-nav" role="tablist">
                <button class="pd-tab-btn active" data-target="tabSpecs" role="tab" aria-selected="true">
                    <i class="fas fa-list-check"></i> Specifications
                </button>
                <button class="pd-tab-btn" data-target="tabPackaging" role="tab" aria-selected="false">
                    <i class="fas fa-box"></i> Packaging
                </button>
                <button class="pd-tab-btn" data-target="tabAdditional" role="tab" aria-selected="false">
                    <i class="fas fa-info-circle"></i> Additional Info
                </button>
            </div>

            {{-- Tab Content --}}
            <div class="pd-tab-content">
                {{-- Specifications --}}
                <div class="pd-tab-pane active" id="tabSpecs">
                    @if($product->specifications)
                    <div class="pd-specs-table">
                        {!! $product->specifications !!}
                    </div>
                    @else
                    <div class="pd-tab-empty">
                        <i class="fas fa-list-check"></i>
                        <p>No specifications available for this product.</p>
                    </div>
                    @endif
                </div>

                {{-- Packaging --}}
                <div class="pd-tab-pane" id="tabPackaging">
                    @if($product->packaging)
                    <div class="pd-tab-prose">
                        {!! $product->packaging !!}
                    </div>
                    @else
                    <div class="pd-tab-empty">
                        <i class="fas fa-box"></i>
                        <p>No packaging information available.</p>
                    </div>
                    @endif
                </div>

                {{-- Additional Info --}}
                <div class="pd-tab-pane" id="tabAdditional">
                    @if($product->additional_info ?? false)
                    <div class="pd-tab-prose">
                        {!! $product->additional_info !!}
                    </div>
                    @else
                    <div class="pd-tab-empty">
                        <i class="fas fa-info-circle"></i>
                        <p>No additional information available.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── Related Products ─────────────────────────────── --}}
@if($relatedProducts->count())
<section class="section-py bg-white" aria-labelledby="related-heading">
    <div class="container">
        <div class="section-header reveal mb-4">
            <div>
                <span class="section-label">More Like This</span>
                <h2 class="section-title" id="related-heading">Related Products</h2>
            </div>
            @if($product->category)
            <a href="{{ route('category.products', $product->category->slug) }}" class="section-view-all">
                View All <i class="fas fa-arrow-right"></i>
            </a>
            @endif
        </div>
        <div class="row g-4">
            @foreach($relatedProducts as $i => $related)
            <div class="col-lg-3 col-md-6 reveal reveal-delay-{{ min($i+1,4) }}">
                @include('frontend.components.product-card', ['product' => $related])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ── Enquiry Modal ────────────────────────────────── --}}
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title fw-bold" id="enquiryModalLabel">Product Enquiry</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('enquiry.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-600">Your Name *</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-600">Email Address *</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-600">Phone Number *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required 
                               pattern="[0-9]{10}" maxlength="10" 
                               placeholder="10-digit mobile number"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                        <div class="form-text">Example: 9876543210</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label fw-600">Message *</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required placeholder="I am interested in this product. Please provide more details."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Submit Enquiry</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* ─── GALLERY ─────────────────────────────────────────── */
.pd-gallery {}
.pd-gallery-main {
    background: var(--bg-light);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    height: 440px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
    margin-bottom: 16px;
}
.pd-gallery-main img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    padding: 24px;
    transition: opacity 0.3s ease;
}
.pd-gallery-brand-badge {
    position: absolute;
    top: 16px; left: 16px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(6px);
    border: 1px solid var(--border);
    border-radius: 50px;
    padding: 5px 14px;
    font-size: 0.72rem;
    font-weight: 700;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    box-shadow: var(--shadow-sm);
}

.pd-gallery-thumbs {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
.pd-thumb {
    width: 80px; height: 80px;
    border: 2px solid var(--border);
    border-radius: var(--radius-sm);
    overflow: hidden;
    cursor: pointer;
    background: var(--bg-light);
    transition: var(--transition-fast);
    display: flex; align-items: center; justify-content: center;
}
.pd-thumb img { width:100%;height:100%;object-fit:contain;padding:6px; }
.pd-thumb:hover { border-color: var(--primary); }
.pd-thumb.active { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-glow); }

/* ─── PRODUCT INFO ────────────────────────────────────── */
.pd-brand {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 14px;
}
.pd-brand-label {
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--text-light);
    background: var(--bg-light-2);
    padding: 3px 10px;
    border-radius: 50px;
}
.pd-brand-name {
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--primary);
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.pd-brand-name:hover { text-decoration: underline; }

.pd-title {
    font-size: clamp(1.4rem, 3vw, 2.2rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    margin-bottom: 16px;
    line-height: 1.2;
}

.pd-cat-path {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
    margin-bottom: 16px;
}
.pd-cat-crumb {
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--text-muted);
    background: var(--bg-light-2);
    padding: 4px 12px;
    border-radius: 50px;
    transition: var(--transition-fast);
}
.pd-cat-crumb:hover { color: var(--primary); background: var(--primary-soft); }
.pd-cat-sep { color: var(--text-light); font-size: 0.65rem; }

.pd-sku {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}
.pd-sku-label { font-size: 0.78rem; font-weight: 600; color: var(--text-light); }
.pd-sku-val { font-size: 0.88rem; font-weight: 700; color: var(--text-main); font-family: monospace; }
.pd-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: rgba(3,138,107,0.1);
    color: var(--primary);
    font-size: 0.72rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 50px;
}
.pd-status-badge i { font-size: 0.45rem; }

.pd-short-desc {
    font-size: 0.9rem;
    color: var(--text-muted);
    line-height: 1.8;
    margin-bottom: 28px;
    padding-bottom: 28px;
    border-bottom: 1px solid var(--border-light);
}

.pd-cta-box {
    background: var(--bg-light);
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    padding: 20px;
    margin-bottom: 20px;
}
.pd-cta-label {
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--text-muted);
    margin-bottom: 12px;
}
.pd-inquiry-btn {
    padding: 14px 24px;
    font-size: 0.9rem;
    font-weight: 700;
    border-radius: var(--radius-sm);
    margin-bottom: 10px;
}
.pd-cta-note {
    font-size: 0.72rem;
    color: var(--text-light);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 6px;
    justify-content: center;
}

.pd-trust-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}
.pd-trust-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.06em;
}
.pd-trust-item i { color: var(--primary); font-size: 0.85rem; }

/* ─── TABS ────────────────────────────────────────────── */
.pd-tabs-wrap {
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    overflow: hidden;
}
.pd-tab-nav {
    display: flex;
    background: var(--dark);
    padding: 8px;
    gap: 4px;
    flex-wrap: wrap;
}
.pd-tab-btn {
    flex: 1;
    background: transparent;
    border: none;
    color: rgba(255,255,255,0.45);
    font-family: 'Poppins', sans-serif;
    font-size: 0.82rem;
    font-weight: 600;
    padding: 12px 16px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: var(--transition-fast);
    white-space: nowrap;
}
.pd-tab-btn:hover { color: rgba(255,255,255,0.8); background: rgba(255,255,255,0.05); }
.pd-tab-btn.active { background: var(--primary); color: #fff; }

.pd-tab-content { padding: 32px; }
.pd-tab-pane { display: none; }
.pd-tab-pane.active { display: block; }

.pd-specs-table table { width: 100%; border-collapse: separate; border-spacing: 0; }
.pd-specs-table tr { background: #fff; transition: background 0.2s; }
.pd-specs-table tr:nth-child(even) { background: #fbfcfc; }
.pd-specs-table tr:hover { background: var(--primary-soft); }
.pd-specs-table td { padding: 16px 20px; font-size: 0.88rem; color: var(--text-muted); border-bottom: 1px solid var(--border-light); vertical-align: middle; }
.pd-specs-table td:first-child { width: 35%; font-weight: 700; color: var(--dark); border-right: 1px solid var(--border-light); }
.pd-specs-table tr:last-child td { border-bottom: none; }

.pd-tab-prose { font-size: 0.95rem; color: var(--text-muted); line-height: 1.9; }

.pd-quick-specs { background: #fff; border: 1px solid var(--border-light); border-radius: 12px; padding: 12px; }
.pd-qs-item { display: flex; flex-direction: column; gap: 2px; padding: 8px 12px; background: var(--bg-light); border-radius: 8px; }
.pd-qs-label { font-size: 0.65rem; font-weight: 700; text-transform: uppercase; color: var(--text-light); letter-spacing: 0.05em; }
.pd-qs-val { font-size: 0.85rem; font-weight: 800; color: var(--dark); }

.pd-tab-empty {
    text-align: center;
    padding: 48px 20px;
    color: var(--text-light);
}
.pd-tab-empty i { font-size: 2rem; margin-bottom: 12px; display: block; }
.pd-tab-empty p { font-size: 0.88rem; margin: 0; }

@media (max-width: 767px) {
    .pd-gallery-main { height: 280px; }
    .pd-tab-content { padding: 20px; }
    .pd-tab-btn { font-size: 0.75rem; padding: 10px 10px; }
}

/* ─── MODAL CUSTOM ────────────────────────────────────── */
.fw-600 { font-weight: 600; }
#enquiryModal .form-control {
    border: 1px solid #e1e1e1;
    padding: 12px;
    font-size: 0.9rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}
#enquiryModal .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px var(--primary-glow);
}
#enquiryModal .modal-content {
    border-radius: 16px;
    overflow: hidden;
}
#enquiryModal .btn-primary {
    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 600;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Gallery image switch ─────────────────────────────
    window.switchGalleryImage = function(src, thumbEl) {
        var mainImg = document.getElementById('mainProductImg');
        if (!mainImg) return;
        mainImg.style.opacity = '0';
        setTimeout(function() {
            mainImg.src = src;
            mainImg.style.opacity = '1';
        }, 200);
        document.querySelectorAll('.pd-thumb').forEach(function(t) {
            t.classList.remove('active');
        });
        thumbEl.classList.add('active');
    };

    // ── Tab switching ─────────────────────────────────────
    var tabBtns  = document.querySelectorAll('.pd-tab-btn');
    var tabPanes = document.querySelectorAll('.pd-tab-pane');

    tabBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            // Remove active from all buttons
            tabBtns.forEach(function(b) {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });
            // Hide all panes
            tabPanes.forEach(function(p) {
                p.classList.remove('active');
                p.style.display = 'none';
            });
            // Activate clicked button
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');
            // Show target pane
            var targetId = this.getAttribute('data-target');
            var targetPane = document.getElementById(targetId);
            if (targetPane) {
                targetPane.classList.add('active');
                targetPane.style.display = 'block';
            }
        });
    });

    // Ensure first pane is visible on load
    var firstPane = document.querySelector('.pd-tab-pane.active');
    if (firstPane) firstPane.style.display = 'block';

});
</script>
@endpush
