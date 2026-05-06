@extends('frontend.layouts.master')

@section('title', 'Child Categories — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Browse all child categories in our enterprise IT infrastructure catalog.')

@section('content')

{{-- Page Banner --}}
<section class="page-banner">
    <div class="container position-relative" style="z-index:2;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                <li class="breadcrumb-item"><a href="{{ route('subcategories') }}">Sub Categories</a></li>
                <li class="breadcrumb-item active">Child Categories</li>
            </ol>
        </nav>
        <span class="section-label" style="background:rgba(3,138,107,0.2);color:var(--primary-light);">Detailed Hierarchy</span>
        <h1 class="section-title text-white mt-2">Child Categories</h1>
        <p class="page-banner-sub mt-2">Find precise product classifications</p>
    </div>
</section>

{{-- Child Categories Grid --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row g-4">
            @forelse($childCategories as $i => $child)
            <div class="col-xl-3 col-lg-4 col-md-6 reveal reveal-delay-{{ min(($i % 4) + 1, 4) }}">
                @php 
                    $childImg = $child->image;
                    if (!filter_var($childImg, FILTER_VALIDATE_URL)) {
                        $childImg = $childImg ? asset('uploads/childcategories/'.$childImg) : 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=400&q=80';
                    }
                @endphp
                <div class="child-cat-card">
                    <div class="child-cat-img-wrap">
                        <img src="{{ $childImg }}" alt="{{ $child->name }}" class="child-cat-img">
                        <div class="child-cat-overlay">
                            <span class="badge bg-primary text-white border-0 fw-500" style="font-size: 0.6rem;">
                                {{ $child->subcategory->name ?? '...' }}
                            </span>
                        </div>
                    </div>
                    <div class="child-cat-body">
                        <h3 class="child-cat-name mt-2">
                            <a href="{{ route('childcategory.products', $child->slug) }}">{{ $child->name }}</a>
                        </h3>
                        <p class="child-cat-desc text-muted mb-3" style="font-size: 0.8rem;">
                            View all products under the {{ $child->name }} classification.
                        </p>
                        <a href="{{ route('childcategory.products', $child->slug) }}" class="child-cat-btn">
                            Browse Products <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state-box">
                    <div class="icon-wrap"><i class="fas fa-folder-open"></i></div>
                    <h3 class="fw-700 mb-2">No Child Categories Found</h3>
                    <p class="text-muted">No child categories are currently available.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $childCategories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.fw-500 { font-weight: 500; }

.child-cat-card {
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    height: 100%;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}
.child-cat-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 4px;
    background: var(--primary);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}
.child-cat-card:hover {
    border-color: var(--primary);
    box-shadow: var(--shadow-md);
    transform: translateY(-4px);
}
.child-cat-card:hover::before {
    transform: scaleX(1);
}
.child-cat-body {
    padding: 20px 24px 24px;
    display: flex;
    flex-direction: column;
}
.child-cat-img-wrap {
    height: 180px;
    width: 100%;
    position: relative;
    overflow: hidden;
}
.child-cat-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.child-cat-card:hover .child-cat-img {
    transform: scale(1.1);
}
.child-cat-overlay {
    position: absolute;
    bottom: 10px;
    left: 10px;
    z-index: 2;
}
.child-cat-name {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: 8px;
}
.child-cat-name a { color: var(--text-main); transition: var(--transition-fast); }
.child-cat-name a:hover { color: var(--primary); }

.child-cat-btn {
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--primary);
    display: inline-flex; align-items: center; gap: 8px;
    margin-top: auto;
    transition: var(--transition-fast);
}
.child-cat-btn:hover { gap: 12px; }
</style>
@endpush
