@extends('frontend.layouts.master')

@section('title', ($solution->name ?: 'Solution') . ' — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', strip_tags($solution->short_description ?: 'Explore our solution details.'))

@section('content')
{{-- ─── PAGE HERO ────────────────────────────────────────── --}}
<section class="solution-hero" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $solution->image ? asset('uploads/solutions/'.$solution->image) : asset('banner_11zon.webp') }}');">
    <div class="container text-center py-5">
        <h1 class="display-3 fw-800 text-white mb-3 reveal">{{ $solution->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-white-50">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('solutions.index') }}" class="text-white-50">Solutions</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $solution->name }}</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ─── ABOUT SECTION ─────────────────────────────────────── --}}
<section class="solution-about section-py-sm bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <div class="pe-lg-4">
                    <span class="text-primary fw-700 text-uppercase ls-wide fs-xs mb-2 d-block">Innovating IT, Empowering Business</span>
                    <h2 class="display-5 fw-800 mb-4">{{ $solution->name }}</h2>
                    <div class="solution-desc-rich text-muted mb-4 fs-base">
                        {!! $solution->description !!}
                    </div>
                    <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-2 rounded-pill">Inquire Now <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-6 reveal">
                <div class="solution-featured-image-wrap">
                    <img src="{{ $solution->image ? asset('uploads/solutions/'.$solution->image) : asset('banner_11zon.webp') }}" alt="{{ $solution->name }}" class="img-fluid rounded-4 shadow-xl">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ─── ALLIANCES BANNER ─────────────────────────────────── --}}
<section class="alliances-banner py-5" style="background: linear-gradient(135deg, #007e5e, #00b38a);">
    <div class="container text-center reveal">
        <h2 class="text-white fw-800 mb-0 px-md-5 mx-lg-5" style="line-height: 1.4;">
            Siddharsh specialize by working with a selection of established and emerging technology <span class="text-warning">Alliances.</span>
        </h2>
    </div>
</section>

{{-- ─── PRODUCT CATEGORIES GRID ───────────────────────────── --}}
@if($categories->count())
<section class="solution-categories section-py bg-light-brand">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="text-primary fw-700 text-uppercase ls-wide fs-xs d-block mb-2">Distribution Redefined</span>
            <h2 class="display-6 fw-800 mb-0">{{ $solution->name }} <span class="text-primary">Product Category</span></h2>
        </div>
        
        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 reveal">
                <a href="{{ route('category.products', $category->slug) }}" class="category-premium-card">
                    <div class="cat-card-icon">
                        @if($category->image)
                            <img src="{{ asset('uploads/categories/'.$category->image) }}" alt="{{ $category->name }}">
                        @else
                            <i class="fas fa-microchip"></i>
                        @endif
                    </div>
                    <div class="cat-card-body text-center">
                        <h4 class="fw-800 mb-3">{{ $category->name }}</h4>
                        <div class="cat-card-line"></div>
                        <p class="text-muted small mb-0 px-3">Explore our high-quality {{ strtolower($category->name) }} and related infrastructure solutions.</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ─── CUSTOMERS SECTION ────────────────────────────────── --}}
<section class="customers-section section-py bg-white">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="text-primary fw-700 text-uppercase ls-wide fs-xs d-block mb-2">Distribution Redefined</span>
            <h2 class="display-6 fw-800 mb-0">Some of Siddharsh <span class="text-primary">Major Customers</span></h2>
        </div>
        <div class="customer-marquee reveal">
            <div class="marquee-track">
                {{-- Mock logos as per design --}}
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/58/State_Bank_of_India_logo.svg/1200px-State_Bank_of_India_logo.svg.png" alt="SBI">
                <img src="https://logodownload.org/wp-content/uploads/2019/10/punjab-national-bank-logo.png" alt="PNB">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Union_Bank_of_India_Logo.svg" alt="Union Bank">
                <img src="https://seeklogo.com/images/S/state-bank-of-hyderabad-logo-4E38708C86-seeklogo.com.png" alt="SBH">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Bank_of_Baroda_logo.svg/2560px-Bank_of_Baroda_logo.svg.png" alt="Bank of Baroda">
                {{-- Duplicate for seamless loop --}}
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/58/State_Bank_of_India_logo.svg/1200px-State_Bank_of_India_logo.svg.png" alt="SBI">
                <img src="https://logodownload.org/wp-content/uploads/2019/10/punjab-national-bank-logo.png" alt="PNB">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Union_Bank_of_India_Logo.svg" alt="Union Bank">
                <img src="https://seeklogo.com/images/S/state-bank-of-hyderabad-logo-4E38708C86-seeklogo.com.png" alt="SBH">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Bank_of_Baroda_logo.svg/2560px-Bank_of_Baroda_logo.svg.png" alt="Bank of Baroda">
            </div>
        </div>
    </div>
</section>

{{-- ─── QUOTE BANNER ────────────────────────────────────── --}}
<section class="quote-banner py-5" style="background: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1920&q=80') center/cover fixed;">
    <div class="container text-center py-4">
        <div class="reveal">
            <h3 class="text-white display-6 fw-800 mb-0" style="text-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                “Innovation, efficiency, and growth – our pillars for transformation success.”
            </h3>
        </div>
    </div>
</section>



@endsection

@push('styles')
<style>
/* Solution Hero */
.solution-hero {
    padding: 60px 0 40px;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
    margin-top: 0;
}

/* Category Premium Cards */
.category-premium-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #fff;
    border-radius: 20px;
    padding: 40px 25px;
    height: 100%;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    border: 1px solid rgba(0,0,0,0.03);
    text-decoration: none !important;
}
.category-premium-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(0,126,94,0.12);
    border-color: #007e5e;
}
.cat-card-icon {
    width: 70px;
    height: 70px;
    background: #007e5e;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin-bottom: 25px;
    font-size: 1.8rem;
    transition: transform 0.4s ease;
}
.category-premium-card:hover .cat-card-icon {
    transform: scale(1.1) rotate(5deg);
    background: #004d39;
}
.cat-card-icon img {
    width: 35px;
    height: 35px;
    object-fit: contain;
    filter: brightness(0) invert(1);
}
.cat-card-body h4 {
    color: #1e293b;
    font-size: 1.25rem;
}
.cat-card-line {
    width: 40px;
    height: 3px;
    background: #007e5e;
    margin: 0 auto 20px;
    border-radius: 99px;
}

/* Customer Marquee */
.customer-marquee {
    overflow: hidden;
    padding: 20px 0;
    position: relative;
    width: 100%;
}
.marquee-track {
    display: flex;
    align-items: center;
    gap: 80px;
    width: max-content;
    animation: scroll-logos 30s linear infinite;
}
.customer-marquee img {
    height: 45px;
    max-width: 180px;
    object-fit: contain;
    filter: grayscale(0);
    opacity: 1;
    transition: all 0.3s ease;
}
.customer-marquee:hover .marquee-track {
    animation-play-state: paused;
}
@keyframes scroll-logos {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-50% - 40px)); }
}



/* Reveal Animation */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.reveal.active {
    opacity: 1;
    transform: translateY(0);
}
</style>
@endpush

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const reveals = document.querySelectorAll('.reveal');
    function checkReveal() {
        reveals.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.9) {
                el.classList.add('active');
            }
        });
    }
    window.addEventListener('scroll', checkReveal);
    checkReveal(); // Initial check
});
</script>
@endpush
