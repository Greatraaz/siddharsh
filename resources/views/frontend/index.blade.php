@extends('frontend.layouts.master')

@section('title', ($settings->site_title ?? 'Siddharsh') . ' — Enterprise IT Infrastructure & Networking')
@section('meta_description', 'Explore our comprehensive catalog of enterprise IT infrastructure products. Shop top brands, categories and networking solutions.')

@section('content')

{{-- ══════════════════════════════════════════
     1. HERO
══════════════════════════════════════════ --}}
{{-- ══════════════════════════════════════════
     1. HERO (SWIPER SLIDER)
     ══════════════════════════════════════════ --}}
<section class="hero-swiper-container">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
           
            {{-- Slide 2 --}}
            <div class="swiper-slide">
                <div class="hero-slide-bg" style="background-image:url('https://images.unsplash.com/photo-1563770660941-20978e870e26?auto=format&fit=crop&w=1920&q=80');"></div>
                <div class="hero-overlay"></div>
                <div class="container hero-content">
                    <div class="row">
                        <div class="col-lg-10">
                            <p class="hero-eyebrow">Next-Gen Networking</p>
                            <h1 class="hero-title" style="line-height: 1.1; font-weight: 900;">High Performance <br><span class="hero-highlight">Data Center</span></h1>
                            <p class="hero-sub">Deploy scalable and secure networking solutions from industry leaders like Cisco and HPE.</p>
                            <div class="hero-actions">
                                <a href="{{ route('categories') }}" class="btn btn-primary btn-lg">Explore Solutions</a>
                                <a href="#contact-section" class="btn btn-hero-outline btn-lg">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Slide 3 --}}
            <div class="swiper-slide">
                <div class="hero-slide-bg" style="background-image:url('https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1920&q=80');"></div>
                <div class="hero-overlay"></div>
                <div class="container hero-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="hero-eyebrow">Unmatched Reliability</p>
                            <h1 class="hero-title" style="line-height: 1.1; font-weight: 900;">Secure & Scalable <br><span class="hero-highlight">Cloud Foundations</span></h1>
                            <p class="hero-sub">The backbone of your business deserves the best-in-class hardware and support.</p>
                            <div class="hero-actions">
                                <a href="{{ route('search') }}" class="btn btn-primary btn-lg">View Products</a>
                                <a href="{{ route('brands') }}" class="btn btn-hero-outline btn-lg">Global Brands</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     2. STATS BAR
══════════════════════════════════════════ --}}
<section class="stats-bar section-py-sm">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @foreach([['500+','Global Clients','users'],['15k+','Products Delivered','box-open'],['24/7','Technical Support','headset'],['100%','Uptime Goal','shield-alt']] as $stat)
            <div class="col-lg-3 col-6">
                <div class="stat-card reveal">
                    <div class="stat-icon"><i class="fas fa-{{ $stat[2] }}"></i></div>
                    <div class="stat-info">
                        <h2 class="stat-num">{{ $stat[0] }}</h2>
                        <p class="stat-label">{{ $stat[1] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     3. CATEGORIES
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand" aria-labelledby="cats-heading">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <span class="section-label">Browse</span>
                <h2 class="section-title" id="cats-heading">Categories</h2>
            </div>
            <a href="{{ route('categories') }}" class="section-view-all">View All Categories <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="row g-4 mt-2">
            @foreach($latestCategories->take(4) as $i => $cat)
            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                @include('frontend.components.category-card', ['category' => $cat])
            </div>
            @endforeach
        </div>
    </div>
</section>



{{-- ══════════════════════════════════════════
     6. BRANDS
══════════════════════════════════════════ --}}
<section class="section-py bg-white" aria-labelledby="brands-heading">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <span class="section-label">Partners</span>
                <h2 class="section-title" id="brands-heading">Brands</h2>
            </div>
            <a href="{{ route('brands') }}" class="section-view-all">View All Brands <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="row g-4 mt-2">
            @foreach($latestBrands as $i => $brand)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                @include('frontend.components.brand-card', ['brand' => $brand])
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     7. FEATURED PRODUCTS
══════════════════════════════════════════ --}}
@if($featuredProducts->count())
<section class="section-py bg-light-brand" aria-labelledby="products-heading">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <span class="section-label">Spotlight</span>
                <h2 class="section-title" id="products-heading">Featured Products</h2>
            </div>
            <a href="{{ route('search') }}" class="section-view-all">View All Products <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="row g-4 mt-2">
            @foreach($featuredProducts as $i => $product)
            <div class="col-xl-3 col-lg-3 col-md-6 reveal reveal-delay-{{ min($i%3+1,3) }}">
                @include('frontend.components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif



@endsection

@push('styles')
<style>
/* ─── HERO SWIPER ────────────────────────────────────── */
.hero-swiper-container {
    position: relative;
    width: 100%;
    height: 85vh;
    min-height: 600px;
    overflow: hidden;
}
.heroSwiper {
    width: 100%;
    height: 100%;
}
.hero-slide-bg {
    position: absolute; inset: 0;
    background-size: cover;
    background-position: center;
    transform: scale(1.1);
    transition: transform 8s ease;
}
.swiper-slide-active .hero-slide-bg {
    transform: scale(1);
}
.hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(12,26,20,0.85) 0%, rgba(3,138,107,0.3) 60%, rgba(12,26,20,0.6) 100%);
    z-index: 1;
}
.hero-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: center;
}
.hero-title {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease 0.3s;
}
.swiper-slide-active .hero-title {
    opacity: 1;
    transform: translateY(0);
}
.hero-sub {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease 0.5s;
}
.swiper-slide-active .hero-sub {
    opacity: 1;
    transform: translateY(0);
}
.hero-actions {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease 0.7s;
}
.swiper-slide-active .hero-actions {
    opacity: 1;
    transform: translateY(0);
}

.swiper-button-next, .swiper-button-prev {
    color: #fff;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(5px);
    width: 50px; height: 50px;
    border-radius: 50%;
}
.swiper-button-next::after, .swiper-button-prev::after { font-size: 1.2rem; font-weight: bold; }
.swiper-pagination-bullet { background: #fff; opacity: 0.5; width: 12px; height: 12px; }
.swiper-pagination-bullet-active { background: var(--primary-light); opacity: 1; width: 30px; border-radius: 10px; }

/* ─── HERO ───────────────────────────────────────────── */
.hero-section {
    position: relative;
    min-height: 88vh;
    display: flex;
    align-items: center;
    overflow: hidden;
}
.hero-bg {
    position: absolute; inset: 0;
    background-size: cover;
    background-position: center;
    z-index: 0;
}
.hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(12,26,20,0.88) 0%, rgba(3,138,107,0.3) 60%, rgba(12,26,20,0.6) 100%);
    z-index: 1;
}
.hero-particles {
    position: absolute; inset: 0; z-index: 1;
    pointer-events: none;
}
.hero-particles span {
    position: absolute;
    width: 2px; height: 2px;
    border-radius: 50%;
    background: rgba(3,181,143,0.5);
    animation: particleDrift 8s infinite alternate;
}
.hero-particles span:nth-child(1) { top:20%; left:15%; animation-delay:0s; width:3px;height:3px; }
.hero-particles span:nth-child(2) { top:60%; left:75%; animation-delay:1.5s; }
.hero-particles span:nth-child(3) { top:40%; left:50%; animation-delay:3s; width:4px;height:4px; }
.hero-particles span:nth-child(4) { top:80%; left:30%; animation-delay:2s; }
.hero-particles span:nth-child(5) { top:10%; left:85%; animation-delay:4s; width:3px;height:3px; }
@keyframes particleDrift {
    0%   { transform: translate(0,0) scale(1); opacity:0.4; }
    100% { transform: translate(20px,-30px) scale(1.5); opacity:0.8; }
}

.hero-content { position: relative; z-index: 2; padding: 100px 0 80px; }
.hero-eyebrow {
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: var(--primary-light);
    margin-bottom: 20px;
}
.hero-title {
    font-size: clamp(2.6rem, 7vw, 4.5rem);
    font-weight: 900;
    color: #fff;
    line-height: 1.05;
    letter-spacing: -0.04em;
    margin-bottom: 24px;
    text-shadow: 0 10px 30px rgba(0,0,0,0.3);
}
.hero-highlight {
    background: linear-gradient(90deg, #7fffd4, var(--primary-light), #7fffd4);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shine 3s linear infinite;
}
@keyframes shine {
    to { background-position: 200% center; }
}
.hero-sub {
    font-size: 1.15rem;
    color: rgba(255,255,255,0.8);
    max-width: 600px;
    line-height: 1.6;
    margin-bottom: 40px;
    font-weight: 400;
}
.hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }
.btn-hero-outline {
    border: 2px solid rgba(255,255,255,0.3);
    color: #fff !important;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(8px);
    padding: 12px 28px;
    border-radius: var(--radius-sm);
    font-weight: 600;
    transition: var(--transition);
    display: inline-flex; align-items: center; gap: 8px;
}
.btn-hero-outline:hover { border-color: var(--primary); background: var(--primary-soft); color: var(--primary-light) !important; }

.hero-scroll-indicator {
    position: absolute;
    bottom: 36px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2;
}
.hero-scroll-indicator span {
    display: block;
    width: 24px; height: 38px;
    border: 2px solid rgba(255,255,255,0.25);
    border-radius: 12px;
    position: relative;
}
.hero-scroll-indicator span::after {
    content: '';
    position: absolute;
    top: 6px; left: 50%; transform: translateX(-50%);
    width: 4px; height: 8px;
    background: var(--primary-light);
    border-radius: 2px;
    animation: scrollBounce 1.8s infinite;
}
@keyframes scrollBounce {
    0%,100% { top: 6px; opacity: 1; }
    50%      { top: 18px; opacity: 0.3; }
}

/* ─── STATS BAR ──────────────────────────────────────── */
.stats-bar { background: var(--dark); }
.stat-card {
    display: flex;
    align-items: center;
    gap: 18px;
}
.stat-icon {
    width: 52px; height: 52px;
    border-radius: 12px;
    background: var(--primary-soft);
    border: 1px solid rgba(3,138,107,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem;
    color: var(--primary-light);
    flex-shrink: 0;
}
.stat-num {
    font-size: 1.8rem;
    font-weight: 900;
    color: #fff;
    margin-bottom: 2px;
    letter-spacing: -0.02em;
}
.stat-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: rgba(255,255,255,0.4);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin: 0;
}

/* ─── SECTION HEADER ─────────────────────────────────── */
.section-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 8px;
    gap: 16px;
    flex-wrap: wrap;
}
.section-view-all {
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--primary);
    display: inline-flex; align-items: center; gap: 6px;
    padding-bottom: 2px;
    border-bottom: 2px solid var(--primary);
    transition: var(--transition-fast);
    white-space: nowrap;
}
.section-view-all:hover { gap: 10px; }

/* ─── CATEGORY MINI CARD ─────────────────────────────── */
.cat-mini-card {
    display: block;
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    overflow: hidden;
    transition: var(--transition);
}
.cat-mini-card:hover {
    border-color: var(--primary);
    box-shadow: var(--shadow-md);
    transform: translateY(-5px);
}
.cat-mini-img {
    height: 160px;
    background: var(--bg-light-2);
}
.cat-mini-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
}
.cat-mini-body {
    padding: 14px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}
.cat-mini-parent {
    font-size: 0.68rem;
    font-weight: 600;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin: 0 0 4px;
}
.cat-mini-name {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--text-main);
    margin: 0;
    line-height: 1.3;
}
.cat-mini-arrow {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: var(--primary-soft);
    color: var(--primary);
    font-size: 0.7rem;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: var(--transition-fast);
}
.cat-mini-card:hover .cat-mini-arrow {
    background: var(--primary);
    color: #fff;
}

/* ─── CHILD CATEGORY CARD ────────────────────────────── */
.child-cat-card {
    display: flex;
    align-items: center;
    gap: 14px;
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius-sm);
    padding: 16px 20px;
    transition: var(--transition);
}
.child-cat-card:hover {
    border-color: var(--primary);
    box-shadow: var(--shadow-sm);
    transform: translateY(-3px);
}
.child-cat-icon {
    width: 40px; height: 40px;
    border-radius: 10px;
    background: var(--primary-soft);
    color: var(--primary);
    font-size: 1rem;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.child-cat-info { flex: 1; min-width: 0; }
.child-cat-parent {
    font-size: 0.66rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--primary);
    margin: 0 0 3px;
}
.child-cat-name {
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--text-main);
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.child-cat-arr {
    font-size: 0.65rem;
    color: var(--text-light);
    flex-shrink: 0;
    transition: var(--transition-fast);
}
.child-cat-card:hover .child-cat-arr { color: var(--primary); transform: translateX(3px); }


/* ─── CTA SECTION ────────────────────────────────────── */
.cta-section {
    background: linear-gradient(135deg, var(--dark) 0%, var(--dark-3) 100%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}
.cta-section::before {
    content: '';
    position: absolute;
    top: -50%; right: -5%;
    width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(3,138,107,0.12) 0%, transparent 70%);
    pointer-events: none;
}
.cta-inner { position: relative; z-index: 1; }
.cta-eyebrow {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.18em;
    color: var(--primary-light);
    margin-bottom: 12px;
}
.cta-title {
    font-size: clamp(1.6rem, 3.5vw, 2.4rem);
    font-weight: 800;
    color: #fff;
    margin-bottom: 12px;
    letter-spacing: -0.02em;
}
.cta-sub {
    color: rgba(255,255,255,0.55);
    font-size: 0.95rem;
    max-width: 480px;
    margin-bottom: 0;
}
.btn-cta-outline {
    border: 2px solid rgba(255,255,255,0.2);
    color: rgba(255,255,255,0.75) !important;
    background: transparent;
    padding: 12px 28px;
    border-radius: var(--radius-sm);
    font-weight: 600;
    transition: var(--transition);
    display: inline-flex; align-items: center; gap: 8px;
}
.btn-cta-outline:hover { border-color: var(--primary); color: #fff !important; background: var(--primary-soft); }

/* Responsive 5-col */
@media (min-width: 1200px) {
    .col-xl { flex: 0 0 20%; max-width: 20%; }
}
@media (max-width: 576px) {
    .hero-section { min-height: 75vh; }
    .stat-card { flex-direction: column; text-align: center; gap: 10px; }
}
</style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ── HERO SWIPER ──────────────────────────────────────────
            const heroSwiper = new Swiper('.heroSwiper', {
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
            });
        });
    </script>
@endpush
