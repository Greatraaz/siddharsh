@extends('frontend.layouts.master')

@section('title', 'Solutions — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Explore our complete portfolio of enterprise solutions. Browse solutions by use case and find matching products.')

@section('content')
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active fw-700">Solutions</li>
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">Solutions</h1>
            <p class="mt-3 text-muted">Discover solutions designed for data center, smart buildings, physical security, and enterprise infrastructure.</p>
        </div>
    </div>
</section>

<section class="section-py bg-white">
    <div class="container">
        <div class="row g-4">
            @forelse($solutions as $solution)
                <div class="col-lg-4 col-md-6">
                    <article class="solution-card shadow-sm rounded-4 overflow-hidden">
                        <a href="{{ route('solutions.show', $solution->slug) }}" class="text-decoration-none text-reset">
                            @if($solution->image)
                                <div class="solution-card-image" style="background-image:url('{{ asset('uploads/solutions/'.$solution->image) }}');"></div>
                            @endif
                            <div class="p-4">
                                <h3 class="mb-2">{{ $solution->name }}</h3>
                                <p class="text-muted mb-3">{{ Str::limit(strip_tags($solution->short_description), 120) }}</p>
                                <span class="text-primary fw-bold">View Solution <i class="fas fa-arrow-right ms-1"></i></span>
                            </div>
                        </a>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <h4 class="mb-3">No solutions available yet.</h4>
                        <p class="text-muted">Please check back soon or browse our products.</p>
                    </div>
                </div>
            @endforelse
        </div>
        @if($solutions instanceof \Illuminate\Contracts\Pagination\Paginator && $solutions->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $solutions->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
.solution-card { background: #fff; border: 1px solid rgba(15,23,42,0.06); transition: transform 0.25s ease, box-shadow 0.25s ease; }
.solution-card:hover { transform: translateY(-4px); box-shadow: 0 24px 60px rgba(15,23,42,0.08); }
.solution-card-image { min-height: 240px; background-size: cover; background-position: center; }
</style>
@endpush
