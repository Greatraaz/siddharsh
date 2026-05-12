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
</section>

{{-- Sub Categories Grid --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header reveal mb-5 text-center d-block">
            <span class="section-label mx-auto">Available Sub-Solutions</span>
            <h2 class="section-title">Select a Specialized Category</h2>
        </div>
        <div class="row g-4">
            @forelse($subcategories as $i => $sub)
            @php $subImg = $sub->image ? asset('uploads/subcategories/'.$sub->image) : 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80'; @endphp
            <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-stretch reveal reveal-delay-{{ min(($i % 4) + 1, 4) }}">
                <div class="brand-premium-card w-100 shadow-md d-flex flex-column" style="background: #fff; border-radius: 16px; overflow: hidden; border: 1px solid var(--border-light);">
                    <a href="{{ route('subcategory.products', $sub->slug) }}" class="brand-card-top" style="height: 200px; overflow: hidden; background: #fff; display: block;">
                        <img src="{{ $subImg }}" alt="{{ $sub->name }}" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                    </a>
                    <div class="brand-card-bottom-box p-3" style="background: var(--primary); text-align: left; border-radius: 0; margin: 0; flex-grow: 1; display: flex; flex-direction: column;">
                        <div class="mb-3">
                            <span class="badge bg-white text-primary fw-800" style="font-size: 0.65rem; text-transform: uppercase; white-space: normal; line-height: 1.4; display: inline-block; padding: 6px 10px; border-radius: 6px;">
                                {{ $sub->category->name ?? 'Category' }}
                            </span>
                        </div>
                        <h3 class="brand-card-heading text-white mb-2" style="font-size: 1.1rem; font-weight: 800; line-height: 1.3;">{{ $sub->name }}</h3>
                        


                        <div class="mt-4">
                            <a href="{{ route('subcategory.products', $sub->slug) }}" class="btn btn-white w-100 fw-800 py-2 d-flex align-items-center justify-content-center" style="font-size: 0.85rem; border-radius: 10px; background: #ffffff; color: var(--primary) !important; border: none; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
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
/* Reusing styles from categories page or adding specific ones if needed */
.bg-primary-soft { background-color: var(--primary-soft) !important; }
.fw-600 { font-weight: 600; }
.fw-700 { font-weight: 700; }
.fw-800 { font-weight: 800; }

.brand-premium-card {
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.brand-premium-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}
.btn-white {
    background-color: #ffffff !important;
    color: var(--primary) !important;
    transition: all 0.3s ease;
}
.btn-white:hover {
    background-color: #f8f9fa !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
}
</style>
@endpush
