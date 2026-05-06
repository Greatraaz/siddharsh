@extends('frontend.layouts.master')

@section('title', 'Categories — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Browse all product categories, sub categories and child categories in our enterprise IT infrastructure catalog.')

@section('content')

{{-- Page Banner --}}
<section class="page-banner">
    <div class="container position-relative" style="z-index:2;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </nav>
        <span class="section-label" style="background:rgba(3,138,107,0.2);color:var(--primary-light);">Full Catalog</span>
        <h1 class="section-title text-white mt-2">Categories</h1>
        <p class="page-banner-sub mt-2">Browse our complete product hierarchy</p>
    </div>
</section>

{{-- Categories --}}
<section class="section-py bg-white">
    <div class="container">
        @forelse($categories as $category)
        <div class="cat-block reveal mb-5">
            {{-- Category Header --}}
            <div class="cat-block-header">
                <div class="cat-block-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="cat-block-info">
                    <h2 class="cat-block-name">{{ $category->name }}</h2>
                    <p class="cat-block-count">{{ $category->subcategories->count() }} Sub {{ Str::plural('Category', $category->subcategories->count()) }}</p>
                </div>
                <a href="{{ route('category.products', $category->slug) }}" class="cat-block-cta">
                    View Products <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            {{-- Sub Categories Grid --}}
            @if($category->subcategories->count())
            <div class="row g-3 mt-1">
                @foreach($category->subcategories as $i => $sub)
                @php $subImg = $sub->image ? asset('uploads/subcategories/'.$sub->image) : 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80'; @endphp
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="sub-cat-card">
                        <a href="{{ route('subcategory.products', $sub->slug) }}" class="sub-cat-img-wrap img-zoom-wrap">
                            <img src="{{ $subImg }}" alt="{{ $sub->name }}" loading="lazy">
                        </a>
                        <div class="sub-cat-body">
                            <a href="{{ route('subcategory.products', $sub->slug) }}" class="sub-cat-title">{{ $sub->name }}</a>

                            @if($sub->childCategories->count())
                            <div class="child-tag-row">
                                @foreach($sub->childCategories->take(3) as $child)
                                <a href="{{ route('childcategory.products', $child->slug) }}" class="child-tag">{{ $child->name }}</a>
                                @endforeach
                                @if($sub->childCategories->count() > 3)
                                <span class="child-tag-more">+{{ $sub->childCategories->count() - 3 }} more</span>
                                @endif
                            </div>
                            @endif

                            <a href="{{ route('subcategory.products', $sub->slug) }}" class="sub-cat-link">
                                <i class="fas fa-paper-plane"></i> Browse Products
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="cat-block-empty">
                <i class="fas fa-folder-open"></i>
                <span>No sub categories yet</span>
            </div>
            @endif
        </div>
        @empty
        <div class="empty-state-box">
            <div class="icon-wrap"><i class="fas fa-folder-open"></i></div>
            <h3 class="fw-700 mb-2">No Categories Found</h3>
            <p class="text-muted">No categories are currently available.</p>
        </div>
        @endforelse

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ─── CATEGORY BLOCK ─────────────────────────────────── */
.cat-block {
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    overflow: hidden;
    background: #fff;
}
.cat-block-header {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 20px 24px;
    background: var(--bg-light);
    border-bottom: 1px solid var(--border-light);
    flex-wrap: wrap;
}
.cat-block-icon {
    width: 48px; height: 48px;
    border-radius: 12px;
    background: var(--primary-soft);
    color: var(--primary);
    font-size: 1.1rem;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.cat-block-info { flex: 1; min-width: 0; }
.cat-block-name {
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--text-main);
    margin: 0 0 2px;
}
.cat-block-count {
    font-size: 0.75rem;
    color: var(--text-light);
    font-weight: 500;
    margin: 0;
}
.cat-block-cta {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--primary);
    display: inline-flex; align-items: center; gap: 6px;
    white-space: nowrap;
    transition: var(--transition-fast);
}
.cat-block-cta:hover { gap: 10px; }
.cat-block-empty {
    padding: 24px;
    display: flex; align-items: center; gap: 10px;
    color: var(--text-light);
    font-size: 0.85rem;
}

/* Sub cat body padding */
.cat-block .row { padding: 16px; }

/* ─── SUB CATEGORY CARD ──────────────────────────────── */
.sub-cat-card {
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: var(--transition);
}
.sub-cat-card:hover {
    border-color: var(--primary);
    box-shadow: var(--shadow-md);
    transform: translateY(-4px);
}
.sub-cat-img-wrap {
    display: block;
    height: 180px;
    overflow: hidden;
    background: var(--bg-light-2);
}
.sub-cat-img-wrap img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
}
.sub-cat-body {
    padding: 16px 18px 18px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    flex: 1;
}
.sub-cat-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--text-main);
    line-height: 1.3;
    transition: var(--transition-fast);
}
.sub-cat-title:hover { color: var(--primary); }

.child-tag-row { display: flex; flex-wrap: wrap; gap: 6px; }
.child-tag {
    display: inline-block;
    padding: 3px 10px;
    background: var(--bg-light-2);
    border: 1px solid var(--border);
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 500;
    color: var(--text-muted);
    transition: var(--transition-fast);
}
.child-tag:hover { border-color: var(--primary); color: var(--primary); background: var(--primary-soft); }
.child-tag-more {
    font-size: 0.7rem;
    font-weight: 600;
    color: var(--primary);
    align-self: center;
}

.sub-cat-link {
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--primary);
    display: inline-flex; align-items: center; gap: 6px;
    margin-top: auto;
    transition: var(--transition-fast);
}
.sub-cat-link:hover { gap: 10px; }
</style>
@endpush
