@extends('frontend.layouts.master')

@section('title', 'Sub Categories — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Browse all sub categories in our enterprise IT infrastructure catalog.')

@section('content')

{{-- Page Banner --}}
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                @if(isset($category))
                <li class="breadcrumb-item active fw-700">{{ $category->name }}</li>
                @else
                <li class="breadcrumb-item active fw-700">Sub Categories</li>
                @endif
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">
                {{ isset($category) ? $category->name : 'Sub Categories' }}
            </h1>
        </div>
    </div>
</section>{{-- Sub Categories Grid --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header reveal mb-5 text-center">
            <span class="section-label mx-auto">Available Sub-Solutions</span>
            <h2 class="section-title">Select a Specialized Category</h2>
            <p class="text-muted mt-3 max-w-600 mx-auto">Explore our diverse range of specialized IT infrastructure and networking sub-categories tailored for your specific business needs.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($subcategories as $i => $sub)
            @php 
                $subImg = $sub->image ? asset('uploads/subcategories/'.$sub->image) : 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80'; 
            @endphp
            <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-stretch reveal reveal-delay-{{ min(($i % 4) + 1, 4) }}">
                <div class="sub-premium-card w-100">
                    <div class="sub-card-image">
                        <img src="{{ $subImg }}" alt="{{ $sub->name }}" loading="lazy">
                        <div class="sub-card-overlay">
                            <span class="category-tag">{{ $sub->category->name ?? 'Category' }}</span>
                        </div>
                    </div>
                    <div class="sub-card-body p-4">
                        <h3 class="sub-card-title mb-3">{{ $sub->name }}</h3>
                        <div class="mt-auto">
                            <a href="{{ route('subcategory.products', $sub->slug) }}" class="btn btn-primary w-100 justify-content-center rounded-pill">
                                View Products <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state-box">
                    <div class="icon-wrap"><i class="fas fa-folder-open"></i></div>
                    <h3 class="fw-700 mb-2">No Sub Categories Found</h3>
                    <p class="text-muted">No sub categories are currently available for this category.</p>
                    <a href="{{ route('categories') }}" class="btn btn-primary mt-3">Browse All Categories</a>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($subcategories->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $subcategories->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</section>

@endsection

@push('styles')
<style>
.max-w-600 { max-width: 600px; }

.sub-premium-card {
    background: #fff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(0,0,0,0.04);
}
.sub-premium-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(0,126,94,0.15);
    border-color: rgba(0,126,94,0.2);
}

.sub-card-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}
.sub-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.sub-premium-card:hover .sub-card-image img {
    transform: scale(1.1);
}

.sub-card-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 2;
}
.category-tag {
    background: rgba(255, 255, 255, 0.95);
    color: #007e5e;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.sub-card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}
.sub-card-title {
    font-size: 1.2rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.3;
}

/* Custom button hover for sub-card */
.sub-premium-card .btn-primary {
    padding: 12px 20px;
    font-size: 0.85rem;
}
</style>
@endpush
