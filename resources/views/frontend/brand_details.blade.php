@extends('frontend.layouts.master')

@section('title', $brand->name . ' — Authorized Distributor & Solutions')

@section('content')

{{-- ── Page Banner ─────────────────────────────────────── --}}
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('brands') }}">Brands</a></li>
                <li class="breadcrumb-item active fw-700">{{ $brand->name }}</li>
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">{{ $brand->name }}</h1>
        </div>
    </div>
</section>

{{-- ─── 2. ABOUT BRAND ───────────────────────────────────── --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <span class="section-label">Reliable Partner</span>
                <h2 class="section-title mb-4">About {{ $brand->name }}</h2>
                <div class="brand-about-text">
                    <p>{{ $brand->name }} is a global leader in innovative infrastructure and connectivity solutions. From high-speed data centers to industrial automation, {{ $brand->name }} provides the backbone for modern business operations.</p>
                    <p>At Siddharsh, we are proud to be an authorized partner, bringing you the complete portfolio of {{ $brand->name }} products with expert technical support and seamless procurement.</p>
                </div>
                <div class="d-flex gap-4 mt-4">
                    <div class="brand-stat">
                        <span class="stat-num">500+</span>
                        <span class="stat-lbl">Products</span>
                    </div>
                    <div class="brand-stat">
                        <span class="stat-num">15+</span>
                        <span class="stat-lbl">Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 reveal reveal-delay-2">
                <div class="brand-about-img-wrap">
                    <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=800&q=80" alt="Technology" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ─── 3. INQUIRY & INFO ──────────────────────────────────── --}}
<section class="section-py bg-light-brand overflow-hidden">
    <div class="container">
        <div class="row g-5 mt-2">
            <div class="col-lg-5 reveal pt-4">
                <div class="inquiry-card shadow-xl rounded-4 overflow-hidden border-0">
                    <div class="inquiry-header p-4 text-white" style="background: var(--primary);">
                        <h4 class="mb-0 fw-800 text-light mb-1">Send Enquiry</h4>
                        <p class="small mb-0 opacity-75">Get a customized quote for {{ $brand->name }} solutions.</p>
                    </div>
                    <div class="p-4 bg-white">
                        <form action="{{ route('enquiry.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                            <div class="mb-3">
                                <label class="form-label small fw-700">Full Name</label>
                                <input type="text" name="name" class="form-control rounded-3" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-700">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-3" placeholder="john@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-700">Phone Number</label>
                                <input type="tel" name="phone" class="form-control rounded-3" placeholder="+91 98765 43210" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-700">Message</label>
                                <textarea name="message" class="form-control rounded-3" rows="3" placeholder="Describe your requirement..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-800 rounded-3 text-center"> <i class="fas fa-paper-plane"></i>Submit Inquiry </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 reveal reveal-delay-2">
                <div class="ps-lg-4">
                    <span class="section-label">Solutions</span>
                    <h2 class="section-title mb-4">{{ $brand->name }} India</h2>
                    <p class="lead text-muted mb-4">Siddharsh provides end-to-end technical support and distribution for {{ $brand->name }}'s enterprise portfolio across the Indian market.</p>
                    <div class="row g-4 mt-2">
                        @foreach([['icon' => 'server', 'title' => 'Data Center'], ['icon' => 'network-wired', 'title' => 'Enterprise Network'], ['icon' => 'industry', 'title' => 'Industrial Automation'], ['icon' => 'bolt', 'title' => 'Power & Connectivity']] as $feat)
                        <div class="col-sm-6">
                            <div class="feat-box d-flex align-items-start gap-3">
                                <div class="feat-icon-sm"><i class="fas fa-{{ $feat['icon'] }}"></i></div>
                                <div>
                                    <h5 class="fw-700 mb-1" style="font-size: 1rem;">{{ $feat['title'] }}</h5>
                                    <p class="small text-muted mb-0">Scalable and future-ready infrastructure.</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ─── 4. PRODUCTS LISTING ────────────────────────────────── --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <span class="section-label">Catalogue</span>
                <h2 class="section-title">Popular {{ $brand->name }} Products</h2>
            </div>
            <a href="{{ route('brand.products', $brand->slug) }}" class="section-view-all">View All Products <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row g-4 mt-2">
            @forelse($brandProducts as $i => $product)
            <div class="col-xl-3 col-lg-4 col-md-6 reveal reveal-delay-{{ min($i+1,4) }}">
                @include('frontend.components.product-card', ['product' => $product])
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted italic">No products currently listed for this brand.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ─── 6. CTA BANNER ──────────────────────────────────────── --}}
<section class="section-py-sm bg-primary text-white text-center">
    <div class="container reveal">
        <h3 class="fw-800 mb-3 text-light">Powering Connections, Enabling Growth</h3>
        <p class="opacity-75 mb-4">Discover how {{ $brand->name }} solutions can transform your business infrastructure.</p>
        <a href="#contact-section" class="btn btn-light btn-lg px-5 py-3 fw-800 text-primary">Get Started Now</a>
    </div>
</section>

<style>
/* ─── BRAND DETAILS SPECIFIC ─────────────────────────── */
.brand-hero-subtitle { font-weight: 500; }
.brand-stat { border-left: 3px solid var(--primary); padding-left: 15px; }
.stat-num { display: block; font-size: 2rem; font-weight: 900; color: var(--dark); line-height: 1; }
.stat-lbl { font-size: 0.8rem; font-weight: 700; color: var(--text-light); text-transform: uppercase; letter-spacing: 0.05em; }

.feat-icon-sm {
    width: 45px; height: 45px;
    background: #fff;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    color: var(--primary);
    font-size: 1.2rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    flex-shrink: 0;
}

.inquiry-card { margin-top: -80px; position: relative; z-index: 10; }
@media (max-width: 991px) { .inquiry-card { margin-top: 0; } }

/* Fix master.blade style for this page */
.section-view-all {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    color: var(--primary);
    font-size: 0.9rem;
    transition: var(--transition-fast);
}
.section-view-all:hover { transform: translateX(5px); }
.customer-logo-box {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    transition: var(--transition);
}
.customer-logo-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}
.customer-logo-img {
    max-height: 60px;
    filter: grayscale(1);
    opacity: 0.6;
    transition: var(--transition);
}
.customer-logo-box:hover .customer-logo-img {
    filter: grayscale(0);
    opacity: 1;
}
</style>

@endsection
