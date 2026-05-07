@extends('frontend.layouts.master')

@section('title', 'Brands — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Explore all our technology brands and manufacturer partners. Find products by your preferred brand.')

@section('content')

{{-- Page Banner --}}
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active fw-700">Brands</li>
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">Brands</h1>
        </div>

        <div class="brands-header-actions d-flex align-items-center justify-content-between gap-4 flex-wrap mt-5 pt-4 border-top border-white border-opacity-10">
            <div class="brand-count-info">
                <span class="fs-sm fw-600 text-white-50 ls-wide text-uppercase">Availability</span>
                <h2 class="h4 text-white mb-0 fw-700">{{ $brands->total() }} Brands Available</h2>
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
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 brand-item" data-name="{{ strtolower($brand->name) }}">
                @include('frontend.components.brand-card', ['brand' => $brand])
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
