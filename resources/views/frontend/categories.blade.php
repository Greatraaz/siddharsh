@extends('frontend.layouts.master')

@section('title', 'Solutions Directory — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Browse our complete enterprise IT infrastructure solutions directory. Explore networking, security, and data center categories.')

@section('content')

{{-- ── Page Banner ─────────────────────────────────────── --}}
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active fw-700">Solutions Directory</li>
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">Solutions Directory</h1>
        </div>
    </div>
</section>

{{-- ── Solutions Directory ──────────────────────────────── --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="row g-4">
            @forelse($categories as $i => $category)
            <div class="col-xl-3 col-lg-3 col-md-6 reveal reveal-delay-{{ min($i%3+1, 3) }}">
                @include('frontend.components.category-card', ['category' => $category])
            </div>
            @empty 
            <div class="col-12">
                <div class="empty-state-box py-5">
                    <div class="icon-wrap"><i class="fas fa-layer-group"></i></div>
                    <h3 class="fw-700 mb-2">No Categories Found</h3>
                    <p class="text-muted">Our product directory is currently being updated.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($categories->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</section>

{{-- ── Support Section ────────────────────────────────── --}}
<section class="section-py bg-white border-top">
    <div class="container text-center">
        <div class="reveal">
            <span class="section-label mx-auto">Expert Guidance</span>
            <h2 class="section-title">Can't find what you're looking for?</h2>
            <p class="lead text-muted mx-auto mt-3" style="max-width: 700px;">
                Our technical consultants are ready to assist you in designing the perfect infrastructure architecture for your specific business requirements.
            </p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="#contact-section" class="btn btn-primary px-4 py-2 fw-700">Get Expert Help</a>
                <a href="tel:{{ $settings->phone ?? '' }}" class="btn btn-outline-dark px-4 py-2 fw-700">Call Us Directly</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ─── DIRECTORY NAV ──────────────────────────────────── */
.directory-nav-card {
    background: #fff;
    border-radius: 20px;
    padding: 24px;
    border: 1px solid var(--border-light);
}
.directory-nav-title {
    font-size: 0.85rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--primary);
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary-soft);
}
.directory-nav-list { list-style: none; padding: 0; margin: 0; }
.directory-nav-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--text-main);
    border-bottom: 1px solid #f8f8f8;
    transition: var(--transition-fast);
}
.directory-nav-link:hover {
    color: var(--primary);
    padding-left: 5px;
}
.directory-nav-count {
    font-size: 0.7rem;
    background: var(--bg-light-2);
    color: var(--text-muted);
    padding: 2px 8px;
    border-radius: 50px;
    font-weight: 700;
}

/* ─── CATEGORY SECTION ────────────────────────────────── */
.category-dir-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--dark);
    letter-spacing: -0.02em;
}
.category-dir-view-all {
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: var(--transition-fast);
}
.category-dir-view-all:hover { gap: 10px; opacity: 0.8; }

/* ─── SUB DIR CARD ───────────────────────────────────── */
.sub-dir-card {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #fff;
    padding: 16px;
    border-radius: 12px;
    border: 1px solid var(--border-light);
    transition: var(--transition);
    height: 100%;
}
.sub-dir-card:hover {
    border-color: var(--primary);
    box-shadow: 0 10px 25px rgba(3,138,107,0.08);
    transform: translateY(-3px);
}
.sub-dir-icon {
    width: 38px; height: 38px;
    background: var(--primary-soft);
    color: var(--primary);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem;
    flex-shrink: 0;
}
.sub-dir-info { flex: 1; min-width: 0; }
.sub-dir-name {
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--text-main);
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.sub-dir-meta {
    font-size: 0.68rem;
    color: var(--text-light);
    margin: 0;
}
.sub-dir-arr {
    font-size: 0.65rem;
    color: var(--border);
    transition: var(--transition-fast);
}
.sub-dir-card:hover .sub-dir-arr { color: var(--primary); transform: translateX(3px); }

/* Custom reveal for directory */
.category-directory-section.reveal { opacity: 1; transform: none; } /* Override if needed or use JS */
</style>
@endpush


