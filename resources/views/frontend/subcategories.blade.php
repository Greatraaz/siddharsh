@extends('frontend.layouts.master')

@section('title', 'Sub Categories — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Browse all sub categories in our enterprise IT infrastructure catalog.')

@section('content')

{{-- Page Banner --}}
<section class="page-banner">
    <div class="container position-relative" style="z-index:2;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                <li class="breadcrumb-item active">Sub Categories</li>
            </ol>
        </nav>
        <span class="section-label" style="background:rgba(3,138,107,0.2);color:var(--primary-light);">Full Catalog</span>
        <h1 class="section-title text-white mt-2">Sub Categories</h1>
        <p class="page-banner-sub mt-2">Explore our specialized product sub-groups</p>
    </div>
</section>

{{-- Sub Categories Grid --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row g-4">
            @forelse($subcategories as $i => $sub)
            @php $subImg = $sub->image ? asset('uploads/subcategories/'.$sub->image) : 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80'; @endphp
            <div class="col-xl-3 col-lg-4 col-md-6 reveal reveal-delay-{{ min(($i % 4) + 1, 4) }}">
                <div class="sub-cat-card">
                    <a href="{{ route('subcategory.products', $sub->slug) }}" class="sub-cat-img-wrap img-zoom-wrap">
                        <img src="{{ $subImg }}" alt="{{ $sub->name }}" loading="lazy">
                    </a>
                    <div class="sub-cat-body">
                        <div class="mb-1">
                            <span class="badge bg-primary-soft text-primary border-0 fw-600" style="font-size: 0.65rem;">
                                {{ $sub->category->name ?? 'Category' }}
                            </span>
                        </div>
                        <a href="{{ route('subcategory.products', $sub->slug) }}" class="sub-cat-title">{{ $sub->name }}</a>

                        @if($sub->childCategories->count())
                        <div class="child-tag-row">
                            @foreach($sub->childCategories->take(3) as $child)
                            <a href="{{ route('childcategory.products', $child->slug) }}" class="child-tag">{{ $child->name }}</a>
                            @endforeach
                            @if($sub->childCategories->count() > 3)
                            <span class="child-tag-more">+{{ $sub->childCategories->count() - 3 }}</span>
                            @endif
                        </div>
                        @endif

                        <a href="{{ route('subcategory.products', $sub->slug) }}" class="sub-cat-link">
                            <i class="fas fa-paper-plane"></i> Browse Products
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state-box">
                    <div class="icon-wrap"><i class="fas fa-folder-open"></i></div>
                    <h3 class="fw-700 mb-2">No Sub Categories Found</h3>
                    <p class="text-muted">No sub categories are currently available.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $subcategories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* Reusing styles from categories page or adding specific ones if needed */
.bg-primary-soft { background-color: var(--primary-soft) !important; }
.fw-600 { font-weight: 600; }

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
