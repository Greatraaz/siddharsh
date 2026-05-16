@extends('frontend.layouts.master')

@section('title', 'Authorized Legrand Distributor India | Electrical Solutions | Smart Building Technology')
@section('meta_description', 'Leading authorized Legrand distributor in India. Get genuine Legrand electrical solutions, smart building technology, lighting controls, and energy management systems. Pan-India delivery & expert support.')
@section('meta_keywords', 'legrand distributor india, authorized legrand dealer, legrand electrical solutions, legrand smart home, legrand lighting controls, legrand india price, legrand switches sockets')

@section('content')
{{-- ══════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════ --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="section-label">Authorized Legrand Distributor</span>
                    <h1 class="hero-title">Legrand Solutions <span class="text-primary">Across India</span></h1>
                    <p class="hero-description">As India's leading authorized Legrand distributor, we deliver genuine Legrand electrical solutions, smart building technology, and innovative electrical infrastructure. Trusted by architects, contractors, and enterprises for quality and innovation.</p>

                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Genuine Legrand Products</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Smart Building Solutions</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Energy Efficiency</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Technical Expertise</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="#contact-section" class="btn btn-primary btn-lg">Get Legrand Quote</a>
                        <a href="{{ route('categories') }}" class="btn btn-outline-primary btn-lg">Browse Products</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=600&q=80"
                         alt="Legrand Electrical Solutions - Authorized Distributor India"
                         class="img-fluid rounded shadow"
                         loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     WHY CHOOSE LEGRAND
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Why Legrand</span>
            <h2 class="section-title">Global Leader in Electrical & Digital Building Infrastructure</h2>
            <p class="section-subtitle">Legrand is a world leader in electrical and digital building infrastructures, offering innovative solutions for residential, commercial, and industrial applications.</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <div class="legrand-feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h4>Residential Solutions</h4>
                    <p>Complete range of switches, sockets, wiring accessories, and smart home solutions designed for modern residential applications.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="legrand-feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Commercial Buildings</h4>
                    <p>Professional-grade electrical solutions for offices, retail spaces, and commercial establishments with focus on safety and efficiency.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="legrand-feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h4>Industrial Applications</h4>
                    <p>Rugged electrical components and systems designed for industrial environments with high safety and reliability standards.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="legrand-feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Lighting Controls</h4>
                    <p>Advanced lighting control systems including dimmers, sensors, and smart lighting solutions for energy-efficient illumination.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="legrand-feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4>Power Distribution</h4>
                    <p>Comprehensive power distribution solutions including MCBs, RCCBs, distribution boards, and protection devices.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="legrand-feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h4>Smart Technology</h4>
                    <p>IoT-enabled smart building solutions for energy management, security, and building automation systems.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     LEGRAND PRODUCTS
══════════════════════════════════════════ --}}
@if($legrandProducts->count())
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Legrand Products</span>
            <h2 class="section-title">Featured Legrand Solutions</h2>
            <a href="{{ route('search') }}?query=legrand" class="section-view-all">View All Legrand Products <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @foreach($legrandProducts as $product)
            <div class="col-xl-3 col-lg-4 col-md-6">
                @include('frontend.components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════
     ELECTRICAL SOLUTIONS
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Complete Solutions</span>
            <h2 class="section-title">Electrical Solutions India</h2>
            <p class="section-subtitle">Comprehensive electrical infrastructure for modern buildings and smart cities</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="solution-overview">
                    <h3>Why Choose Legrand for Electrical Solutions?</h3>
                    <p>As an authorized Legrand distributor in India, we provide complete electrical solutions that combine safety, efficiency, and innovation. Legrand's commitment to quality and technological advancement makes them the preferred choice for electrical infrastructure worldwide.</p>

                    <div class="solution-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-shield-alt text-primary"></i>
                            <div>
                                <strong>Safety First:</strong> Advanced protection devices and safety mechanisms
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-leaf text-primary"></i>
                            <div>
                                <strong>Energy Efficient:</strong> Solutions that reduce energy consumption and costs
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-brain text-primary"></i>
                            <div>
                                <strong>Smart Technology:</strong> IoT-enabled devices for intelligent control
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-award text-primary"></i>
                            <div>
                                <strong>Quality Assured:</strong> International standards and certifications
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="solution-image">
                    <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=600&q=80"
                         alt="Legrand Electrical Installation Services"
                         class="img-fluid rounded shadow">
                </div>
            </div>
        </div>

        @if($electricalProducts->count())
        <div class="mt-5">
            <h3 class="text-center mb-4">Popular Electrical Products</h3>
            <div class="row g-4">
                @foreach($electricalProducts->take(4) as $product)
                <div class="col-lg-3 col-md-6">
                    @include('frontend.components.product-card', ['product' => $product])
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

{{-- ══════════════════════════════════════════
     SMART BUILDING SOLUTIONS
══════════════════════════════════════════ --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Smart Technology</span>
            <h2 class="section-title">Legrand Smart Building Solutions</h2>
            <p class="section-subtitle">Transform your building into an intelligent, energy-efficient, and connected space</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="smart-building-content">
                    <h3>Intelligent Building Management</h3>
                    <p>Legrand's smart building solutions integrate lighting controls, energy management, security systems, and building automation to create efficient, sustainable, and user-friendly environments.</p>

                    <div class="smart-features">
                        <div class="smart-feature">
                            <i class="fas fa-lightbulb text-primary"></i>
                            <div>
                                <h5>Lighting Control</h5>
                                <p>Automated lighting systems that adjust based on occupancy and natural light</p>
                            </div>
                        </div>

                        <div class="smart-feature">
                            <i class="fas fa-thermometer-half text-primary"></i>
                            <div>
                                <h5>Climate Control</h5>
                                <p>Smart HVAC integration for optimal comfort and energy savings</p>
                            </div>
                        </div>

                        <div class="smart-feature">
                            <i class="fas fa-shield-alt text-primary"></i>
                            <div>
                                <h5>Security Integration</h5>
                                <p>Connected security systems with remote monitoring and control</p>
                            </div>
                        </div>

                        <div class="smart-feature">
                            <i class="fas fa-chart-line text-primary"></i>
                            <div>
                                <h5>Energy Monitoring</h5>
                                <p>Real-time energy consumption tracking and optimization</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="smart-building-image">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=600&q=80"
                         alt="Legrand Smart Building Technology"
                         class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SERVICES & SUPPORT
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Our Services</span>
            <h2 class="section-title">Complete Legrand Support & Services</h2>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-3 col-md-6">
                <div class="service-support-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h4>Electrical Design</h4>
                    <p>Professional electrical system design and planning services</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="service-support-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>Installation</h4>
                    <p>Certified installation services by trained Legrand technicians</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="service-support-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-vial"></i>
                    </div>
                    <h4>Testing & Commissioning</h4>
                    <p>Complete system testing and commissioning services</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="service-support-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Technical Support</h4>
                    <p>Ongoing technical support and maintenance services</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-py bg-white" aria-labelledby="faq-heading">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">FAQ</span>
            <h2 class="section-title" id="faq-heading">Legrand Distributor FAQs</h2>
            <p class="section-subtitle">Answers to common questions about authorized Legrand distribution, smart building solutions, and energy efficient electrical infrastructure.</p>
        </div>

        <div class="accordion" id="legrandFaq">
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                        Are you an authorized Legrand distributor in India?
                    </button>
                </h3>
                <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faq-heading-1" data-bs-parent="#legrandFaq">
                    <div class="accordion-body">
                        Yes. We are an authorized Legrand distributor in India supplying genuine Legrand electrical solutions, smart building systems, and energy management products to enterprises and builders.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                        What Legrand products do you offer for commercial projects?
                    </button>
                </h3>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2" data-bs-parent="#legrandFaq">
                    <div class="accordion-body">
                        We offer Legrand wiring accessories, lighting controls, building automation, power distribution systems, and smart home solutions for commercial, industrial, and residential projects.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                        Do you provide technical consultation for Legrand installations?
                    </button>
                </h3>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3" data-bs-parent="#legrandFaq">
                    <div class="accordion-body">
                        Yes. Our team provides design consultation, product selection assistance, site surveys, and post-installation support for Legrand electrical and smart building projects.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                        How do I request a Legrand project quote?
                    </button>
                </h3>
                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4" data-bs-parent="#legrandFaq">
                    <div class="accordion-body">
                        Use the Request Quote button, visit our <a href="{{ route('contact') }}">Contact Us</a> page, or send a WhatsApp message to receive a customized Legrand solution quote.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CONTACT CTA
══════════════════════════════════════════ --}}
<section class="cta-section section-py bg-dark text-white text-center" id="contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="cta-title">Get Your Legrand Solutions Quote Today</h2>
                <p class="cta-subtitle mb-4">Contact our Legrand specialists for expert consultation, competitive pricing, and genuine Legrand products delivered across India.</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-envelope me-2"></i>Request Quote
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings->phone ?? '919999999999') }}" class="btn btn-success btn-lg" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i>WhatsApp Us
                    </a>
                </div>
                <div class="cta-contact mt-4">
                    <p class="mb-2"><i class="fas fa-phone me-2"></i>Call: <a href="tel:+{{ preg_replace('/\D/', '', $settings->phone ?? '919999999999') }}" class="text-white text-decoration-none">{{ $settings->phone ?? '+91-XXXXXXXXXX' }}</a></p>
                    <p class="mb-0"><i class="fas fa-envelope me-2"></i>Email: {{ $settings->email ?? 'sales@siddharsh.com' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "Legrand Electrical Solutions",
    "description": "Authorized Legrand distributor in India offering genuine electrical solutions, smart building technology, lighting controls, and energy management systems",
    "brand": {
        "@type": "Brand",
        "name": "Legrand"
    },
    "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock",
        "priceCurrency": "INR",
        "seller": {
            "@type": "Organization",
            "name": "Siddharsh"
        }
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.7",
        "reviewCount": "200"
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "Are you an authorized Legrand distributor in India?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. We are an authorized Legrand distributor in India supplying genuine Legrand electrical solutions, smart building systems, and energy management products to enterprises and builders."
            }
        },
        {
            "@type": "Question",
            "name": "What Legrand products do you offer for commercial projects?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We offer Legrand wiring accessories, lighting controls, building automation, power distribution systems, and smart home solutions for commercial, industrial, and residential projects."
            }
        },
        {
            "@type": "Question",
            "name": "Do you provide technical consultation for Legrand installations?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. Our team provides design consultation, product selection assistance, site surveys, and post-installation support for Legrand electrical and smart building projects."
            }
        },
        {
            "@type": "Question",
            "name": "How do I request a Legrand project quote?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Use the Request Quote button, visit our Contact Us page, or send a WhatsApp message to receive a customized Legrand solution quote."
            }
        }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Authorized Legrand Distributor India",
            "item": "{{ url()->current() }}"
        }
    ]
}
</script>
@endsection

@push('styles')
<style>
.hero-section {
    padding: 80px 0 60px;
    background: linear-gradient(135deg, #f8fafb 0%, #e2e8f0 100%);
}

.hero-content .section-label {
    background: var(--primary-soft);
    color: var(--primary);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
    margin-bottom: 20px;
}

.hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    color: var(--text-main);
    line-height: 1.1;
    margin-bottom: 24px;
}

.hero-description {
    font-size: 1.1rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 32px;
}

.hero-features {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 40px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 500;
    color: var(--text-main);
}

.hero-actions {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}

.legrand-feature-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
}

.legrand-feature-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.legrand-feature-card .feature-icon {
    width: 64px;
    height: 64px;
    background: var(--primary-soft);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: var(--primary);
    margin: 0 auto 20px;
}

.legrand-feature-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 16px;
}

.legrand-feature-card p {
    color: var(--text-muted);
    line-height: 1.6;
}

.solution-overview h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 20px;
}

.solution-overview p {
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 24px;
}

.solution-benefits {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.benefit-item i {
    margin-top: 2px;
    flex-shrink: 0;
}

.smart-building-content h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 20px;
}

.smart-building-content p {
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 24px;
}

.smart-features {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.smart-feature {
    display: flex;
    align-items: flex-start;
    gap: 16px;
}

.smart-feature i {
    font-size: 1.5rem;
    margin-top: 2px;
    flex-shrink: 0;
}

.smart-feature h5 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-main);
    margin-bottom: 8px;
}

.smart-feature p {
    color: var(--text-muted);
    line-height: 1.5;
    font-size: 0.9rem;
    margin: 0;
}

.service-support-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    transition: var(--transition);
    height: 100%;
}

.service-support-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.service-support-card .service-icon {
    width: 56px;
    height: 56px;
    background: var(--primary-soft);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--primary);
    margin: 0 auto 16px;
}

.service-support-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 12px;
}

.service-support-card p {
    color: var(--text-muted);
    line-height: 1.6;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .hero-features {
        grid-template-columns: 1fr;
    }

    .hero-actions {
        flex-direction: column;
    }

    .hero-actions .btn {
        width: 100%;
    }
}
</style>
@endpush