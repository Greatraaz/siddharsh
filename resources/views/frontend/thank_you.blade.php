@extends('frontend.layouts.master')

@section('title', 'Thank You — ' . ($settings->site_title ?? 'Siddharsh'))

@section('content')

{{-- ── Thank You Hero ────────────────────────────────── --}}
<section class="thank-you-section section-py bg-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="ty-card reveal">
                    {{-- Success Icon --}}
                    <div class="ty-icon-box mb-4">
                        <div class="ty-icon-bg"></div>
                        <i class="fas fa-check"></i>
                    </div>

                    {{-- Main Message --}}
                    <h1 class="ty-title display-4 fw-800 mb-3">Submission Successful!</h1>
                    <p class="ty-lead lead text-muted mb-5">
                        Thank you for reaching out to <span class="text-primary fw-600">Siddharsh Systems and Solutions</span>. 
                        Your enquiry has been received and our team is already reviewing it.
                    </p>

                    {{-- Next Steps --}}
                    <div class="ty-next-steps mb-5">
                        <h5 class="ty-next-title text-uppercase mb-4">What's Next?</h5>
                        <div class="row g-4 text-start">
                            <div class="col-md-4">
                                <div class="ty-step">
                                    <div class="ty-step-num">01</div>
                                    <h6 class="fw-700 mb-2">Review</h6>
                                    <p class="small text-muted mb-0">Our experts analyze your specific requirements.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ty-step">
                                    <div class="ty-step-num">02</div>
                                    <h6 class="fw-700 mb-2">Connect</h6>
                                    <p class="small text-muted mb-0">A specialist will contact you within 24 hours.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ty-step">
                                    <div class="ty-step-num">03</div>
                                    <h6 class="fw-700 mb-2">Solution</h6>
                                    <p class="small text-muted mb-0">We provide a tailored technical proposal.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="ty-actions d-flex gap-3 justify-content-center">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5 py-3 fw-700">
                            Return to Home
                        </a>
                        <a href="{{ route('categories') }}" class="btn btn-outline-dark btn-lg px-5 py-3 fw-700">
                            Browse Solutions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .thank-you-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        background: radial-gradient(circle at top right, rgba(3, 138, 107, 0.05) 0%, transparent 40%),
                    radial-gradient(circle at bottom left, rgba(3, 138, 107, 0.05) 0%, transparent 40%);
    }

    .ty-card {
        padding: 60px 40px;
    }

    /* Success Icon Animation */
    .ty-icon-box {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .ty-icon-bg {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: var(--primary);
        border-radius: 50%;
        opacity: 0.1;
        animation: ty-pulse 2s infinite;
    }
    .ty-icon-box i {
        font-size: 2.5rem;
        color: var(--primary);
        z-index: 2;
        animation: ty-scale 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }

    @keyframes ty-pulse {
        0% { transform: scale(1); opacity: 0.1; }
        50% { transform: scale(1.4); opacity: 0; }
        100% { transform: scale(1); opacity: 0.1; }
    }
    @keyframes ty-scale {
        0% { transform: scale(0); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    .ty-title {
        color: var(--dark);
        letter-spacing: -0.03em;
    }
    .ty-lead {
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Next Steps */
    .ty-next-title {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.15em;
        color: var(--text-light);
    }
    .ty-step {
        background: #fff;
        padding: 24px;
        border-radius: var(--radius);
        border: 1px solid var(--border-light);
        transition: var(--transition);
        height: 100%;
    }
    .ty-step:hover {
        border-color: var(--primary);
        transform: translateY(-5px);
        box-shadow: var(--shadow-sm);
    }
    .ty-step-num {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 12px;
        font-family: monospace;
    }

    .ty-actions .btn {
        border-radius: 8px;
        transition: var(--transition);
    }
    .ty-actions .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(3, 138, 107, 0.3);
    }

    @media (max-width: 767px) {
        .ty-card { padding: 40px 20px; }
        .ty-actions { flex-direction: column; }
        .ty-actions .btn { width: 100%; }
    }
</style>
@endpush
