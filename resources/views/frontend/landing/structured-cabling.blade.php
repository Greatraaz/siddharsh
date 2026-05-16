@extends('frontend.layouts.master')

@section('title', 'Structured Cabling Solutions India | Network Infrastructure | Panduit & Legrand')
@section('meta_description', 'Professional structured cabling solutions in India. Complete network infrastructure including copper cabling, fiber optics, cable management from Panduit, Legrand & leading brands. Expert installation & certification.')
@section('meta_keywords', 'structured cabling solutions india, network cabling india, copper cabling, fiber optic cabling, cable management, panduit cabling, legrand cabling, network infrastructure india')

@section('content')
{{-- ══════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════ --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="section-label">Professional Services</span>
                    <h1 class="hero-title">Structured Cabling <span class="text-primary">Solutions India</span></h1>
                    <p class="hero-description">Complete structured cabling infrastructure for modern enterprises. From design to installation and certification, we deliver reliable network foundations using premium brands like Panduit, Legrand, and industry-leading solutions.</p>

                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>End-to-End Solutions</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Certified Installation</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Future-Proof Design</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>25-Year Warranty</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="#contact-section" class="btn btn-primary btn-lg">Get Cabling Quote</a>
                        <a href="{{ route('categories') }}" class="btn btn-outline-primary btn-lg">Browse Solutions</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=80"
                         alt="Structured Cabling Solutions India - Professional Network Infrastructure"
                         class="img-fluid rounded shadow"
                         loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CABLING TYPES
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Our Expertise</span>
            <h2 class="section-title">Complete Cabling Infrastructure Solutions</h2>
            <p class="section-subtitle">Professional structured cabling services for copper, fiber optic, and hybrid network systems</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <div class="cabling-type-card">
                    <div class="cabling-icon">
                        <i class="fas fa-ethernet"></i>
                    </div>
                    <h4>Copper Cabling</h4>
                    <p>High-performance copper cabling solutions including Category 6A, Category 6, and Category 5e systems for reliable data transmission up to 10Gbps.</p>
                    <ul class="cabling-features">
                        <li>Category 6A Solutions</li>
                        <li>25-Year Warranty</li>
                        <li>10Gbps Performance</li>
                        <li>Future-Proof Design</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cabling-type-card">
                    <div class="cabling-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h4>Fiber Optic Cabling</h4>
                    <p>Advanced fiber optic infrastructure for high-speed, long-distance data transmission with immunity to electromagnetic interference.</p>
                    <ul class="cabling-features">
                        <li>Single-Mode & Multi-Mode</li>
                        <li>High-Speed Transmission</li>
                        <li>EMI Immunity</li>
                        <li>Long-Distance Support</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cabling-type-card">
                    <div class="cabling-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4>Cable Management</h4>
                    <p>Comprehensive cable management solutions including racks, trays, patch panels, and accessories for organized, maintainable infrastructure.</p>
                    <ul class="cabling-features">
                        <li>Rack & Cabinet Systems</li>
                        <li>Cable Trays & Trunks</li>
                        <li>Patch Panel Solutions</li>
                        <li>Labeling Systems</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     FEATURED PRODUCTS
══════════════════════════════════════════ --}}
@if($cablingProducts->count())
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Premium Products</span>
            <h2 class="section-title">Featured Cabling Solutions</h2>
            <a href="{{ route('search') }}?query=cabling" class="section-view-all">View All Cabling Products <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @foreach($cablingProducts as $product)
            <div class="col-xl-3 col-lg-4 col-md-6">
                @include('frontend.components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════
     WHY STRUCTURED CABLING
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Why Choose</span>
            <h2 class="section-title">Why Structured Cabling Matters</h2>
            <p class="section-subtitle">Structured cabling is the foundation of modern network infrastructure</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="cabling-benefits">
                    <h3>Benefits of Professional Structured Cabling</h3>

                    <div class="benefit-list">
                        <div class="benefit-item">
                            <i class="fas fa-tachometer-alt text-primary"></i>
                            <div>
                                <strong>High Performance:</strong> Support for current and future network speeds up to 100Gbps
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-shield-alt text-primary"></i>
                            <div>
                                <strong>Reliability:</strong> Redundant pathways and professional installation ensure uptime
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-tools text-primary"></i>
                            <div>
                                <strong>Easy Maintenance:</strong> Standardized design simplifies troubleshooting and upgrades
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-leaf text-primary"></i>
                            <div>
                                <strong>Cost Effective:</strong> Lower long-term costs compared to point-to-point cabling
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-expand-arrows-alt text-primary"></i>
                            <div>
                                <strong>Scalability:</strong> Easy to add new connections without major infrastructure changes
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-award text-primary"></i>
                            <div>
                                <strong>Standards Compliant:</strong> TIA/EIA and ISO/IEC standards ensure compatibility
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="cabling-standards">
                    <h3>Industry Standards & Certifications</h3>
                    <p>Our structured cabling solutions comply with international standards and include comprehensive testing and certification.</p>

                    <div class="standards-grid">
                        <div class="standard-item">
                            <h5>TIA-568</h5>
                            <p>Commercial Building Telecommunications Cabling Standard</p>
                        </div>

                        <div class="standard-item">
                            <h5>ISO/IEC 11801</h5>
                            <p>International Standard for Generic Cabling</p>
                        </div>

                        <div class="standard-item">
                            <h5>Category 6A</h5>
                            <p>10Gbps performance up to 100 meters</p>
                        </div>

                        <div class="standard-item">
                            <h5>Fiber Certification</h5>
                            <p>OTDR testing and certification services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     OUR PROCESS
══════════════════════════════════════════ --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Our Process</span>
            <h2 class="section-title">Professional Cabling Implementation</h2>
            <p class="section-subtitle">Systematic approach from design to certification</p>
        </div>

        <div class="process-steps">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h4>Site Survey</h4>
                        <p>Comprehensive assessment of your facility, requirements analysis, and infrastructure planning.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h4>Design & Planning</h4>
                        <p>Custom network design based on your requirements, industry standards, and future scalability.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h4>Installation</h4>
                        <p>Professional installation by certified technicians using premium quality materials and tools.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h4>Testing & Certification</h4>
                        <p>Complete testing, certification, and documentation with performance guarantees.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     BRANDS WE CARRY
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Trusted Brands</span>
            <h2 class="section-title">Leading Cabling Brands</h2>
            <p class="section-subtitle">Authorized distributor for industry-leading cabling manufacturers</p>
        </div>

        <div class="brands-grid">
            @foreach($brands->take(8) as $brand)
            <div class="brand-item">
                @if($brand->logo)
                    <img src="{{ asset('uploads/brands/'.$brand->logo) }}" alt="{{ $brand->name }}" class="brand-logo">
                @else
                    <div class="brand-name">{{ $brand->name }}</div>
                @endif
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('brands') }}" class="btn btn-primary">View All Brands</a>
        </div>
    </div>
</section>

<section class="section-py bg-white" aria-labelledby="faq-heading">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">FAQ</span>
            <h2 class="section-title" id="faq-heading">Structured Cabling FAQs</h2>
            <p class="section-subtitle">Find the answers to common questions about structured cabling design, installation, and certification for enterprise networks.</p>
        </div>

        <div class="accordion" id="cablingFaq">
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                        What structured cabling services do you provide in India?
                    </button>
                </h3>
                <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faq-heading-1" data-bs-parent="#cablingFaq">
                    <div class="accordion-body">
                        We provide structured cabling services for copper, fiber optic, and hybrid network systems, including design, installation, testing, certification, and maintenance.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                        Do you support Panduit and Legrand cabling systems?
                    </button>
                </h3>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2" data-bs-parent="#cablingFaq">
                    <div class="accordion-body">
                        Yes. We support structured cabling systems from Panduit, Legrand, and other leading brands for enterprise networking infrastructure across India.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                        Can you handle installation and certification for enterprise networks?
                    </button>
                </h3>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3" data-bs-parent="#cablingFaq">
                    <div class="accordion-body">
                        Absolutely. Our certified team manages installation, testing, and certification to ensure your structured cabling infrastructure meets industry standards.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                        How can I get a structured cabling quote?
                    </button>
                </h3>
                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4" data-bs-parent="#cablingFaq">
                    <div class="accordion-body">
                        Click the Get Cabling Quote button, visit our <a href="{{ route('contact') }}">Contact Us</a> page, or message us on WhatsApp for a custom structured cabling estimate.
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
                <h2 class="cta-title">Get Your Cabling Project Started Today</h2>
                <p class="cta-subtitle mb-4">Contact our structured cabling experts for site survey, design consultation, and competitive quotations. Pan-India service coverage.</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-envelope me-2"></i>Request Survey
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
    "@type": "Service",
    "name": "Structured Cabling Solutions India",
    "description": "Professional structured cabling services in India including copper cabling, fiber optics, cable management, and network infrastructure from Panduit, Legrand & leading brands",
    "provider": {
        "@type": "Organization",
        "name": "Siddharsh"
    },
    "serviceType": "Network Infrastructure",
    "areaServed": {
        "@type": "Country",
        "name": "India"
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Cabling Services",
        "itemListElement": [
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Copper Cabling Installation"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Fiber Optic Cabling"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Cable Management Solutions"
                }
            }
        ]
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
            "name": "What structured cabling services do you provide in India?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We provide structured cabling services for copper, fiber optic, and hybrid network systems, including design, installation, testing, certification, and maintenance."
            }
        },
        {
            "@type": "Question",
            "name": "Do you support Panduit and Legrand cabling systems?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. We support structured cabling systems from Panduit, Legrand, and other leading brands for enterprise networking infrastructure across India."
            }
        },
        {
            "@type": "Question",
            "name": "Can you handle installation and certification for enterprise networks?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Absolutely. Our certified team manages installation, testing, and certification to ensure your structured cabling infrastructure meets industry standards."
            }
        },
        {
            "@type": "Question",
            "name": "How can I get a structured cabling quote?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Click the Get Cabling Quote button, visit our Contact Us page, or message us on WhatsApp for a custom structured cabling estimate."
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
            "name": "Structured Cabling Solutions India",
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

.cabling-type-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
}

.cabling-type-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.cabling-type-card .cabling-icon {
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

.cabling-type-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 16px;
}

.cabling-type-card p {
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 20px;
}

.cabling-features {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: left;
}

.cabling-features li {
    position: relative;
    padding-left: 20px;
    color: var(--text-main);
    font-size: 0.9rem;
    margin-bottom: 8px;
}

.cabling-features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--primary);
    font-weight: bold;
}

.cabling-benefits h3,
.cabling-standards h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 20px;
}

.cabling-benefits p {
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 24px;
}

.benefit-list {
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

.standards-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.standard-item {
    background: #fff;
    padding: 20px;
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
}

.standard-item h5 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 8px;
}

.standard-item p {
    color: var(--text-muted);
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
}

.process-steps {
    margin-top: 40px;
}

.process-step {
    text-align: center;
    padding: 32px 24px;
    background: #fff;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    position: relative;
    transition: var(--transition);
}

.process-step:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.step-number {
    width: 50px;
    height: 50px;
    background: var(--primary);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: 700;
    margin: 0 auto 16px;
}

.process-step h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 12px;
}

.process-step p {
    color: var(--text-muted);
    line-height: 1.6;
    font-size: 0.9rem;
}

.brands-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
    margin-top: 40px;
}

.brand-item {
    background: #fff;
    padding: 20px;
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    text-align: center;
    transition: var(--transition);
}

.brand-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow);
}

.brand-logo {
    max-width: 100px;
    max-height: 60px;
    object-fit: contain;
}

.brand-name {
    font-weight: 600;
    color: var(--text-main);
    font-size: 1rem;
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

    .standards-grid {
        grid-template-columns: 1fr;
    }

    .brands-grid {
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    }
}
</style>
@endpush