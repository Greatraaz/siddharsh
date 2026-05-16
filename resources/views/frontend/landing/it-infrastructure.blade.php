@extends('frontend.layouts.master')

@section('title', 'IT Infrastructure Solutions India | Enterprise Networking | Panduit Legrand Cisco HPE')
@section('meta_description', 'Complete IT infrastructure solutions in India. Enterprise networking, datacenter solutions, structured cabling from Panduit, Legrand, Cisco, HPE. Expert consultation & implementation services.')
@section('meta_keywords', 'it infrastructure solutions india, enterprise networking india, datacenter solutions india, structured cabling india, panduit distributor india, legrand distributor india, cisco solutions india, hpe solutions india')

@section('content')
{{-- ══════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════ --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="section-label">Complete Solutions</span>
                    <h1 class="hero-title">IT Infrastructure <span class="text-primary">Solutions India</span></h1>
                    <p class="hero-description">Comprehensive IT infrastructure solutions for modern enterprises. From networking and datacenter to smart building technology, we deliver complete infrastructure solutions using premium brands like Panduit, Legrand, Cisco, and HPE across India.</p>

                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>End-to-End Solutions</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Premium Brands</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Expert Consultation</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Pan-India Support</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="#contact-section" class="btn btn-primary btn-lg">Get Infrastructure Quote</a>
                        <a href="{{ route('categories') }}" class="btn btn-outline-primary btn-lg">Explore Solutions</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=80"
                         alt="IT Infrastructure Solutions India - Complete Enterprise Networking"
                         class="img-fluid rounded shadow"
                         loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CORE SOLUTIONS
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Our Expertise</span>
            <h2 class="section-title">Core IT Infrastructure Solutions</h2>
            <p class="section-subtitle">Comprehensive infrastructure services for enterprise digital transformation</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-3">
                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4>Structured Cabling</h4>
                    <p>Complete network cabling infrastructure including copper, fiber optic, and cable management solutions from Panduit and industry leaders.</p>
                    <a href="{{ route('structured.cabling') }}" class="btn btn-sm-pill">Learn More</a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <h4>Datacenter Solutions</h4>
                    <p>Enterprise-grade datacenter infrastructure including racks, power distribution, environmental monitoring, and management systems.</p>
                    <a href="{{ route('datacenter.solutions') }}" class="btn btn-sm-pill">Learn More</a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-router"></i>
                    </div>
                    <h4>Enterprise Networking</h4>
                    <p>Advanced networking solutions from Cisco and HPE including switches, routers, wireless systems, and network security appliances.</p>
                    <a href="{{ route('search') }}?query=networking" class="btn btn-sm-pill">Learn More</a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Smart Buildings</h4>
                    <p>Intelligent building infrastructure from Legrand including lighting controls, energy management, security, and building automation.</p>
                    <a href="{{ route('legrand.distributor') }}" class="btn btn-sm-pill">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     FEATURED PRODUCTS
══════════════════════════════════════════ --}}
@if($infrastructureProducts->count())
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Premium Products</span>
            <h2 class="section-title">Featured Infrastructure Solutions</h2>
            <a href="{{ route('search') }}" class="section-view-all">View All Products <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @foreach($infrastructureProducts->take(8) as $product)
            <div class="col-xl-3 col-lg-4 col-md-6">
                @include('frontend.components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════
     BRAND PARTNERSHIPS
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Trusted Partners</span>
            <h2 class="section-title">Authorized Distributor Network</h2>
            <p class="section-subtitle">Official partnerships with global technology leaders</p>
        </div>

        <div class="brands-showcase">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-4">
                    <div class="brand-partner-card">
                        <div class="brand-logo-placeholder">
                            <span>Panduit</span>
                        </div>
                        <h5>Authorized Distributor</h5>
                        <p>World's leading provider of electrical and network infrastructure solutions</p>
                        <a href="{{ route('panduit.distributor') }}" class="btn btn-sm-pill">Panduit Solutions</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="brand-partner-card">
                        <div class="brand-logo-placeholder">
                            <span>Legrand</span>
                        </div>
                        <h5>Authorized Distributor</h5>
                        <p>Global specialist in electrical and digital building infrastructures</p>
                        <a href="{{ route('legrand.distributor') }}" class="btn btn-sm-pill">Legrand Solutions</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="brand-partner-card">
                        <div class="brand-logo-placeholder">
                            <span>Cisco</span>
                        </div>
                        <h5>Authorized Partner</h5>
                        <p>Leading provider of networking hardware, telecommunications equipment</p>
                        <a href="{{ route('search') }}?query=cisco" class="btn btn-sm-pill">Cisco Products</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="brand-partner-card">
                        <div class="brand-logo-placeholder">
                            <span>HPE</span>
                        </div>
                        <h5>Authorized Partner</h5>
                        <p>Enterprise technology solutions including servers, storage, and networking</p>
                        <a href="{{ route('search') }}?query=hpe" class="btn btn-sm-pill">HPE Solutions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     INDUSTRY SOLUTIONS
══════════════════════════════════════════ --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Industry Focus</span>
            <h2 class="section-title">Solutions by Industry</h2>
            <p class="section-subtitle">Tailored infrastructure solutions for specific industry requirements</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <div class="industry-solution-card">
                    <div class="industry-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h4>Healthcare</h4>
                    <p>Reliable IT infrastructure critical for healthcare operations, including HIPAA-compliant networking and medical device connectivity.</p>
                    <ul class="industry-features">
                        <li>HIPAA Compliant Networks</li>
                        <li>Medical Device Integration</li>
                        <li>Emergency Communication</li>
                        <li>Patient Data Security</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="industry-solution-card">
                    <div class="industry-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4>Education</h4>
                    <p>Modern campus networking infrastructure supporting smart classrooms, digital learning platforms, and secure student information systems.</p>
                    <ul class="industry-features">
                        <li>Campus Wi-Fi Networks</li>
                        <li>Smart Classroom Technology</li>
                        <li>Digital Learning Platforms</li>
                        <li>Student Information Systems</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="industry-solution-card">
                    <div class="industry-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Commercial Real Estate</h4>
                    <p>Smart building infrastructure enhancing property value with integrated lighting controls, energy management, and tenant connectivity solutions.</p>
                    <ul class="industry-features">
                        <li>Building Automation</li>
                        <li>Tenant Wi-Fi Solutions</li>
                        <li>Energy Management</li>
                        <li>Security Integration</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="industry-solution-card">
                    <div class="industry-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h4>Manufacturing</h4>
                    <p>Industrial IoT and automation infrastructure with ruggedized networking solutions for factory automation and SCADA systems.</p>
                    <ul class="industry-features">
                        <li>Industrial Ethernet</li>
                        <li>SCADA Network Design</li>
                        <li>IoT Connectivity</li>
                        <li>Ruggedized Equipment</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="industry-solution-card">
                    <div class="industry-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h4>Financial Services</h4>
                    <p>Secure, high-availability infrastructure for banking and financial institutions with redundant systems and compliance requirements.</p>
                    <ul class="industry-features">
                        <li>High-Availability Networks</li>
                        <li>Financial Compliance</li>
                        <li>Secure Transactions</li>
                        <li>Disaster Recovery</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="industry-solution-card">
                    <div class="industry-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h4>Retail & Hospitality</h4>
                    <p>Customer-centric infrastructure including guest Wi-Fi, POS systems, digital signage, and smart building controls for enhanced experiences.</p>
                    <ul class="industry-features">
                        <li>Guest Wi-Fi Networks</li>
                        <li>POS System Integration</li>
                        <li>Digital Signage</li>
                        <li>Smart Building Controls</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     WHY CHOOSE US
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Why Siddharsh</span>
            <h2 class="section-title">Why Leading Enterprises Choose Siddharsh</h2>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Authorized Partnerships</h4>
                    <p>Official distributor partnerships with Panduit, Legrand, Cisco, and HPE ensuring genuine products and manufacturer support.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Expert Team</h4>
                    <p>Certified engineers with 15+ years of experience in enterprise IT infrastructure design and implementation.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h4>Pan-India Coverage</h4>
                    <p>Strategic warehousing and logistics network ensuring timely delivery and support across all major Indian cities.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>Complete Services</h4>
                    <p>End-to-end services from consultation and design to installation, testing, and ongoing maintenance and support.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Quality Assurance</h4>
                    <p>International quality standards, comprehensive testing, and performance guarantees on all implementations.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Round-the-clock technical support and emergency response services to keep your infrastructure running smoothly.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SUCCESS STORIES
══════════════════════════════════════════ --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Success Stories</span>
            <h2 class="section-title">Trusted by Industry Leaders</h2>
            <p class="section-subtitle">Real projects, real results across diverse industries</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <div class="success-story-card">
                    <div class="success-story-header">
                        <h4>Financial Hub Transformation</h4>
                        <span class="industry-tag">Banking & Finance</span>
                    </div>
                    <p class="success-story-description">Complete datacenter infrastructure upgrade for a leading private bank's headquarters with Panduit cabling and redundant power systems.</p>
                    <div class="success-metrics">
                        <div class="metric">
                            <span class="metric-value">99.9%</span>
                            <span class="metric-label">Uptime</span>
                        </div>
                        <div class="metric">
                            <span class="metric-value">40%</span>
                            <span class="metric-label">Cost Savings</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="success-story-card">
                    <div class="success-story-header">
                        <h4>Smart Campus Network</h4>
                        <span class="industry-tag">Education</span>
                    </div>
                    <p class="success-story-description">Campus-wide structured cabling and Wi-Fi infrastructure for a premier technical institute supporting 5000+ concurrent users.</p>
                    <div class="success-metrics">
                        <div class="metric">
                            <span class="metric-value">10Gbps</span>
                            <span class="metric-label">Network Speed</span>
                        </div>
                        <div class="metric">
                            <span class="metric-value">5000+</span>
                            <span class="metric-label">Users</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="success-story-card">
                    <div class="success-story-header">
                        <h4>Intelligent Building Complex</h4>
                        <span class="industry-tag">Commercial Real Estate</span>
                    </div>
                    <p class="success-story-description">Smart building infrastructure integration across 500,000 sq ft commercial complex with Legrand automation and energy management.</p>
                    <div class="success-metrics">
                        <div class="metric">
                            <span class="metric-value">35%</span>
                            <span class="metric-label">Energy Savings</span>
                        </div>
                        <div class="metric">
                            <span class="metric-value">24/7</span>
                            <span class="metric-label">Monitoring</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-py bg-white" aria-labelledby="faq-heading">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">FAQ</span>
            <h2 class="section-title" id="faq-heading">IT Infrastructure FAQs</h2>
            <p class="section-subtitle">Common questions about enterprise IT infrastructure, networking, datacenter, and smart building solutions.</p>
        </div>

        <div class="accordion" id="infrastructureFaq">
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                        What IT infrastructure solutions do you provide in India?
                    </button>
                </h3>
                <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faq-heading-1" data-bs-parent="#infrastructureFaq">
                    <div class="accordion-body">
                        We provide enterprise IT infrastructure solutions including structured cabling, datacenter systems, networking, security, and smart building technology from brands like Panduit, Legrand, Cisco, and HPE.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                        Can you manage end-to-end IT infrastructure implementation?
                    </button>
                </h3>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2" data-bs-parent="#infrastructureFaq">
                    <div class="accordion-body">
                        Yes, we manage end-to-end implementation including consulting, design, procurement, installation, commissioning, and ongoing support for enterprise IT projects.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                        Do you offer solutions for data centers and networking?
                    </button>
                </h3>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3" data-bs-parent="#infrastructureFaq">
                    <div class="accordion-body">
                        Absolutely. Our solutions cover datacenter infrastructure, enterprise networking, network security, and integrated smart building systems for modern enterprises.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                        How can I request a consultation for IT infrastructure?
                    </button>
                </h3>
                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4" data-bs-parent="#infrastructureFaq">
                    <div class="accordion-body">
                        Click the Request Consultation button, visit our <a href="{{ route('contact') }}">Contact Us</a> page, or message us on WhatsApp to schedule an enterprise IT infrastructure consultation.
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
                <h2 class="cta-title">Ready to Transform Your IT Infrastructure?</h2>
                <p class="cta-subtitle mb-4">Contact our infrastructure experts for comprehensive assessment, design consultation, and implementation. Get enterprise-grade solutions tailored to your business needs.</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-envelope me-2"></i>Request Consultation
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
    "name": "IT Infrastructure Solutions India",
    "description": "Complete IT infrastructure solutions in India including enterprise networking, datacenter solutions, structured cabling from Panduit, Legrand, Cisco, HPE with expert consultation and implementation services",
    "provider": {
        "@type": "Organization",
        "name": "Siddharsh"
    },
    "serviceType": "IT Infrastructure",
    "areaServed": {
        "@type": "Country",
        "name": "India"
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "IT Infrastructure Services",
        "itemListElement": [
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Structured Cabling Solutions"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Datacenter Infrastructure"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Enterprise Networking"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Smart Building Solutions"
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
            "name": "What IT infrastructure solutions do you provide in India?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We provide enterprise IT infrastructure solutions including structured cabling, datacenter systems, networking, security, and smart building technology from brands like Panduit, Legrand, Cisco, and HPE."
            }
        },
        {
            "@type": "Question",
            "name": "Can you manage end-to-end IT infrastructure implementation?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, we manage end-to-end implementation including consulting, design, procurement, installation, commissioning, and ongoing support for enterprise IT projects."
            }
        },
        {
            "@type": "Question",
            "name": "Do you offer solutions for data centers and networking?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Absolutely. Our solutions cover datacenter infrastructure, enterprise networking, network security, and integrated smart building systems for modern enterprises."
            }
        },
        {
            "@type": "Question",
            "name": "How can I request a consultation for IT infrastructure?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Click the Request Consultation button, visit our Contact Us page, or message us on WhatsApp to schedule an enterprise IT infrastructure consultation."
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
            "name": "IT Infrastructure Solutions India",
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

.solution-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.solution-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.solution-card .solution-icon {
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

.solution-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 16px;
}

.solution-card p {
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.solution-card .btn {
    margin-top: auto;
}

.brands-showcase {
    margin-top: 40px;
}

.brand-partner-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
}

.brand-partner-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.brand-logo-placeholder {
    width: 80px;
    height: 80px;
    background: var(--primary-soft);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--primary);
    font-size: 1.1rem;
    margin: 0 auto 16px;
}

.brand-partner-card h5 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 12px;
}

.brand-partner-card p {
    color: var(--text-muted);
    line-height: 1.6;
    font-size: 0.9rem;
    margin-bottom: 16px;
}

.industry-solution-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    transition: var(--transition);
    height: 100%;
    border: 1px solid var(--border-light);
}

.industry-solution-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.industry-icon {
    width: 56px;
    height: 56px;
    background: var(--primary-soft);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: 1.5rem;
    margin-bottom: 16px;
}

.industry-solution-card h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 16px;
}

.industry-solution-card p {
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 20px;
}

.industry-features {
    list-style: none;
    padding: 0;
    margin: 0;
}

.industry-features li {
    position: relative;
    padding-left: 20px;
    color: var(--text-main);
    font-size: 0.9rem;
    margin-bottom: 8px;
}

.industry-features li::before {
    content: '•';
    position: absolute;
    left: 0;
    color: var(--primary);
    font-weight: bold;
}

.advantage-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
}

.advantage-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.advantage-card .advantage-icon {
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

.advantage-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 12px;
}

.advantage-card p {
    color: var(--text-muted);
    line-height: 1.6;
    font-size: 0.9rem;
}

.success-story-card {
    background: #fff;
    padding: 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border-left: 4px solid var(--primary);
    transition: var(--transition);
}

.success-story-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.success-story-header {
    margin-bottom: 16px;
}

.success-story-header h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 8px;
}

.industry-tag {
    display: inline-block;
    background: var(--primary-soft);
    color: var(--primary);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.success-story-description {
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 0.9rem;
}

.success-metrics {
    display: flex;
    gap: 20px;
}

.metric {
    text-align: center;
}

.metric-value {
    display: block;
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--primary);
}

.metric-label {
    font-size: 0.8rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
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

    .success-metrics {
        flex-direction: column;
        gap: 16px;
    }
}
</style>
@endpush