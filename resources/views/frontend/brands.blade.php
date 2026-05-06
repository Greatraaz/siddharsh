@extends('frontend.layouts.master')

@section('title', 'Brands — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Explore all our technology brands and manufacturer partners. Find products by your preferred brand.')

@section('content')

{{-- Page Banner --}}
<section class="page-banner">
    <div class="container position-relative" style="z-index:2;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Brands</li>
            </ol>
        </nav>
        <div class="d-flex align-items-end justify-content-between gap-4 flex-wrap">
            <div>
                <span class="section-label" style="background:rgba(3,138,107,0.2);color:var(--primary-light);">All Partners</span>
                <h1 class="section-title text-white mt-2">Brands</h1>
                <p class="page-banner-sub mt-2">{{ $brands->total() }} brands available</p>
            </div>
            {{-- Search --}}
            <div class="brands-search-wrap">
                <div class="brands-search-box">
                    <i class="fas fa-search brands-search-icon"></i>
                    <input type="text" id="brandSearch" class="brands-search-input" placeholder="Search brands...">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Brands Grid --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="row g-4" id="brandGrid">
            @forelse($brands as $brand)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 brand-item reveal" data-name="{{ strtolower($brand->name) }}">
                <a href="{{ route('brand.products', $brand->slug) }}" class="brand-card">
                    <div class="brand-card-logo">
                        @if($brand->image)
                            <img src="{{ asset('uploads/brands/'.$brand->image) }}"
                                 alt="{{ $brand->name }}"
                                 class="brand-card-img"
                                 loading="lazy">
                        @else
                            <div class="brand-card-initial">{{ strtoupper(substr($brand->name,0,2)) }}</div>
                        @endif
                    </div>
                    <h3 class="brand-card-name brand-name">{{ $brand->name }}</h3>
                    <span class="brand-card-cta">View Products <i class="fas fa-arrow-right"></i></span>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state-box">
                    <div class="icon-wrap"><i class="fas fa-store-slash"></i></div>
                    <h3 class="fw-700 mb-2">No Brands Found</h3>
                    <p class="text-muted">No brands are currently available.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- No results --}}
        <div id="noResults" class="d-none">
            <div class="empty-state-box">
                <div class="icon-wrap"><i class="fas fa-search"></i></div>
                <h3 class="fw-700 mb-2">No Brands Found</h3>
                <p class="text-muted">Try a different search term.</p>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $brands->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ─── BRANDS SEARCH ──────────────────────────────────── */
.brands-search-wrap { min-width: 280px; }
.brands-search-box {
    position: relative;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: var(--radius-sm);
    overflow: hidden;
    backdrop-filter: blur(8px);
}
.brands-search-icon {
    position: absolute;
    left: 16px; top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,0.5);
    font-size: 0.85rem;
    pointer-events: none;
}
.brands-search-input {
    background: transparent;
    border: none;
    padding: 14px 16px 14px 42px;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 0.88rem;
    width: 100%;
    outline: none;
}
.brands-search-input::placeholder { color: rgba(255,255,255,0.4); }

/* ─── BRAND CARD ─────────────────────────────────────── */
.brand-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    padding: 28px 16px 20px;
    transition: var(--transition);
    gap: 10px;
    height: 100%;
}
.brand-card:hover {
    border-color: var(--primary);
    box-shadow: var(--shadow-md);
    transform: translateY(-6px);
}
.brand-card-logo {
    height: 80px;
    display: flex; align-items: center; justify-content: center;
    width: 100%;
}
.brand-card-img {
    max-height: 56px;
    max-width: 110px;
    object-fit: contain;
    filter: grayscale(1);
    opacity: 0.5;
    transition: var(--transition);
}
.brand-card:hover .brand-card-img { filter: grayscale(0); opacity: 1; }
.brand-card-initial {
    width: 60px; height: 60px;
    border-radius: 14px;
    background: var(--primary-soft);
    color: var(--primary);
    font-weight: 800;
    font-size: 1.2rem;
    display: flex; align-items: center; justify-content: center;
}
.brand-card-name {
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--text-main);
    margin: 0;
    line-height: 1.3;
}
.brand-card-cta {
    font-size: 0.72rem;
    font-weight: 600;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    display: inline-flex; align-items: center; gap: 5px;
    transition: var(--transition-fast);
    margin-top: auto;
}
.brand-card:hover .brand-card-cta { color: var(--primary); gap: 8px; }
</style>
@endpush

@push('scripts')
<script>
document.getElementById('brandSearch').addEventListener('input', function () {
    const q = this.value.toLowerCase().trim();
    const items = document.querySelectorAll('.brand-item');
    let found = 0;
    items.forEach(item => {
        const match = item.dataset.name.includes(q);
        item.style.display = match ? '' : 'none';
        if (match) found++;
    });
    document.getElementById('noResults').classList.toggle('d-none', found > 0);
});
</script>
@endpush
