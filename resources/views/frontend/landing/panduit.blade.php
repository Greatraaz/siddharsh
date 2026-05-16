@extends('frontend.layouts.master')

@section('title', 'Authorized Panduit Distributor India | Structured Cabling Solutions India')
@section('canonical', url('/panduit-distributor-india/'))
@section('meta_description', 'Siddharsh is a leading Authorized Panduit Distributor India. We provide premium Structured Cabling Solutions India, Datacenter Solutions, and IT Infrastructure Solutions India. Authorized dealer for Panduit & Legrand products.')
@section('meta_keywords', 'authorized panduit distributor india, panduit distributor india, structured cabling solutions india, datacenter solutions india, it infrastructure solutions india, legrand distributor india, panduit dealer india')

@section('content')
{{-- ══════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════ --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hero-content">
                    <span class="section-label">Premium Network Infrastructure</span>
                    <h1 class="hero-title">Authorized Panduit Distributor India</h1>
                    <p class="hero-description">
                        Siddharsh is your trusted <strong>Authorized Panduit Distributor India</strong>, delivering world-class <strong>Structured Cabling Solutions India</strong> for modern enterprises. As a leading <strong>Legrand Distributor India</strong>, we provide end-to-end <strong>IT Infrastructure Solutions India</strong> and <strong>Datacenter Solutions India</strong> that ensure maximum reliability, scalability, and performance for your business network.
                    </p>
                    
                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>100% Genuine Panduit Products</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Authorized Legrand Distributor</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Pan-India Supply & Support</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Expert Technical Consultation</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="#contact-section" class="btn btn-primary btn-lg">Request Quote</a>
                        <a href="tel:+{{ preg_replace('/\D/', '', $settings->phone ?? '919999999999') }}" class="btn btn-outline-primary btn-lg">Talk to Expert</a>
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings->phone ?? '919999999999') }}" class="btn btn-success btn-lg" target="_blank">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp Us
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80"
                         alt="Authorized Panduit Distributor India - Structured Cabling Solutions"
                         class="img-fluid rounded-4 shadow-lg main-hero-img"
                         loading="lazy" decoding="async">
                    <div class="floating-badge">
                        <span class="badge-number">15+</span>
                        <span class="badge-text">Years Excellence</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     QUICK STATS
══════════════════════════════════════════ --}}
<section class="stats-bar bg-white border-bottom">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <h3 class="stat-count">500+</h3>
                    <p class="stat-label">Projects Completed</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <h3 class="stat-count">Authorized</h3>
                    <p class="stat-label">Panduit Distributor</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <h3 class="stat-count">Premium</h3>
                    <p class="stat-label">Legrand Partner</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <h3 class="stat-count">Pan-India</h3>
                    <p class="stat-label">Delivery Network</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SOLUTIONS OVERVIEW
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-label">What We Offer</span>
            <h2 class="section-title">Comprehensive IT Infrastructure Solutions India</h2>
            <p class="section-subtitle">We bridge the gap between complex technology and business needs with world-class products and expertise.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="solution-card">
                    <div class="card-icon"><i class="fas fa-network-wired"></i></div>
                    <h3>Structured Cabling Solutions India</h3>
                    <p>High-performance copper and fiber cabling systems from Panduit and Legrand designed to support your business applications now and in the future.</p>
                    <ul class="card-list">
                        <li>Cat 6A / Cat 6 Copper Systems</li>
                        <li>OM3 / OM4 / OM5 Fiber Optics</li>
                        <li>Network Racks & Cabinets</li>
                        <li>Intelligent Infrastructure</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="solution-card active">
                    <div class="card-icon"><i class="fas fa-server"></i></div>
                    <h3>Datacenter Solutions India</h3>
                    <p>Optimized physical infrastructure for modern data centers. We provide thermal management, power distribution, and high-density connectivity.</p>
                    <ul class="card-list">
                        <li>Hot/Cold Aisle Containment</li>
                        <li>High-Density Fiber Patching</li>
                        <li>Smart PDUs & Monitoring</li>
                        <li>Aisle Containment Systems</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="solution-card">
                    <div class="card-icon"><i class="fas fa-building"></i></div>
                    <h3>Enterprise IT Solutions</h3>
                    <p>Complete IT infrastructure for office buildings, industrial campuses, and smart cities. Reliable connectivity is the foundation of digital growth.</p>
                    <ul class="card-list">
                        <li>Wireless Access Solutions</li>
                        <li>Audio-Visual Infrastructure</li>
                        <li>Physical Security Systems</li>
                        <li>IP Security & Surveillance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     PANDUIT DEEP DIVE
══════════════════════════════════════════ --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="content-rich-text">
                    <span class="section-label">Authorized Panduit Distributor India</span>
                    <h2 class="mb-4">Why Choose Panduit for Your Network?</h2>
                    <p>As a premier <strong>Authorized Panduit Distributor India</strong>, we understand that your network is the backbone of your business. Panduit is globally recognized for its innovation in electrical and network infrastructure. By choosing Panduit, you invest in quality that reduces downtime and increases operational efficiency.</p>
                    <p>Our partnership with Panduit allows us to offer the latest <strong>Structured Cabling Solutions India</strong>, including the revolutionary Vari-MaTriX Copper Cable and high-density fiber solutions that save space while improving performance.</p>
                    
                    <div class="accordion custom-accordion mt-4" id="panduitFeatures">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#feat1">
                                    Unmatched Reliability & Performance
                                </button>
                            </h3>
                            <div id="feat1" class="accordion-collapse collapse show" data-bs-parent="#panduitFeatures">
                                <div class="accordion-body">
                                    Panduit components are engineered to exceed industry standards, ensuring that your <strong>IT Infrastructure Solutions India</strong> are future-proof and capable of handling high-speed data transfers up to 100G and beyond.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feat2">
                                    Innovative Research & Development
                                </button>
                            </h3>
                            <div id="feat2" class="accordion-collapse collapse" data-bs-parent="#panduitFeatures">
                                <div class="accordion-body">
                                    With thousands of patents, Panduit continues to lead the market in <strong>Datacenter Solutions India</strong>, offering specialized products like the Net-Access™ Cabinets and SynapSense® Wireless Monitoring.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-grid">
                    <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80" alt="Panduit Data Center Racks India" class="img-fluid rounded shadow mb-4" loading="lazy">
                    <img src="https://images.unsplash.com/photo-1563770660941-20978e870e9b?auto=format&fit=crop&w=600&q=80" alt="Authorized Panduit Distributor India Services" class="img-fluid rounded shadow" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     LEGRAND SECTION
══════════════════════════════════════════ --}}
<section class="section-py bg-dark text-white">
    <div class="container">
        <div class="row align-items-center flex-row-reverse g-5">
            <div class="col-lg-6">
                <div class="legrand-content">
                    <span class="section-label text-white border-white">Authorized Partner</span>
                    <h2 class="text-white mb-4">Trusted Legrand Distributor India</h2>
                    <p class="lead">Complementing our Panduit range, we are also a leading <strong>Legrand Distributor India</strong>, providing versatile power and data solutions for every environment.</p>
                    <p>Legrand’s commitment to simplicity and efficiency makes them an ideal partner for <strong>Structured Cabling Solutions India</strong>. From the Excel Life range to specialized Linkeo and LCS3 systems, we provide the full spectrum of Legrand products.</p>
                    
                    <div class="row g-3 mt-3">
                        <div class="col-6">
                            <div class="feature-box">
                                <i class="fas fa-plug"></i>
                                <span>Power Distribution</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="feature-box">
                                <i class="fas fa-hdd"></i>
                                <span>LCS3 Data Systems</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="feature-box">
                                <i class="fas fa-project-diagram"></i>
                                <span>Cable Management</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="feature-box">
                                <i class="fas fa-lightbulb"></i>
                                <span>Smart Building</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?auto=format&fit=crop&w=800&q=80" alt="Legrand Distributor India - Networking Solutions" class="img-fluid rounded shadow-lg" loading="lazy">
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     PRODUCT SHOWCASE
══════════════════════════════════════════ --}}
@if($panduitProducts->count())
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="section-label">Product Gallery</span>
                <h2 class="section-title">Genuine Panduit & Legrand Products</h2>
            </div>
            <a href="{{ route('categories') }}" class="btn btn-outline-primary">View All Products</a>
        </div>

        <div class="row g-4">
            @foreach($panduitProducts->take(8) as $product)
            <div class="col-xl-3 col-lg-4 col-md-6">
                @include('frontend.components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════
     SERVICE PROCESS
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-label">Expertise at Work</span>
            <h2 class="section-title">How We Deliver Excellence</h2>
            <p class="section-subtitle">Our approach to <strong>IT Infrastructure Solutions India</strong> is methodical and client-centric.</p>
        </div>

        <div class="row g-0 process-row">
            <div class="col-lg-3 col-md-6">
                <div class="process-card">
                    <span class="process-num">01</span>
                    <h4>Consultation</h4>
                    <p>Expert assessment of your current <strong>IT Infrastructure Solutions India</strong> needs.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-card">
                    <span class="process-num">02</span>
                    <h4>Design</h4>
                    <p>Custom <strong>Structured Cabling Solutions India</strong> designed for scalability.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-card">
                    <span class="process-num">03</span>
                    <h4>Supply</h4>
                    <p>Procurement of genuine products as an <strong>Authorized Panduit Distributor India</strong>.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-card">
                    <span class="process-num">04</span>
                    <h4>Support</h4>
                    <p>Ongoing maintenance and technical support for your <strong>Datacenter Solutions India</strong>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     FAQ SECTION
══════════════════════════════════════════ --}}
<section class="section-py bg-white" aria-labelledby="faq-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="faq-intro">
                    <span class="section-label">FAQ</span>
                    <h2 id="faq-heading" class="mb-4">Common Questions About Our Solutions</h2>
                    <p>As an <strong>Authorized Panduit Distributor India</strong>, we provide clear answers to help you make informed decisions for your network infrastructure.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary mt-3">Ask a Specific Question</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="accordion custom-faq" id="itInfraFaq">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Are you an Authorized Panduit Distributor India?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#itInfraFaq">
                            <div class="accordion-body">
                                Yes, Siddharsh is a certified <strong>Authorized Panduit Distributor India</strong>. We supply 100% genuine products including copper cabling, fiber optics, and industrial automation solutions directly sourced from Panduit.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you provide Structured Cabling Solutions India for small offices?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#itInfraFaq">
                            <div class="accordion-body">
                                Absolutely. Our <strong>Structured Cabling Solutions India</strong> are scalable. We provide infrastructure design and supply for everything from small corporate offices to large-scale multi-floor enterprise buildings.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What makes you a preferred Legrand Distributor India?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#itInfraFaq">
                            <div class="accordion-body">
                                As a leading <strong>Legrand Distributor India</strong>, we offer a complete portfolio of Legrand’s data and power solutions. Our technical team is trained on Legrand LCS3 systems, ensuring you get the best expert advice and support.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Can you help with Datacenter Solutions India in Mumbai or Bangalore?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#itInfraFaq">
                            <div class="accordion-body">
                                Yes, we provide <strong>Datacenter Solutions India</strong> across all major cities including Mumbai, Bangalore, Delhi, Pune, and Chennai. We specialize in high-density containment and intelligent power management for modern data centers.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                What is the warranty on Panduit Structured Cabling products?
                            </button>
                        </h3>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#itInfraFaq">
                            <div class="accordion-body">
                                When you source through an <strong>Authorized Panduit Distributor India</strong> like us, you are eligible for Panduit’s 25-year Certification Plus System Warranty on registered installations, ensuring long-term peace of mind.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CONTACT CTA
══════════════════════════════════════════ --}}
<section class="cta-section section-py bg-primary text-white text-center" id="contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h2 class="text-white mb-3">Upgrade Your Network Infrastructure Today</h2>
                <p class="lead mb-4">Get expert consultation for <strong>Structured Cabling Solutions India</strong> and genuine products from your <strong>Authorized Panduit Distributor India</strong>.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5">Contact Sales</a>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings->phone ?? '919999999999') }}" class="btn btn-success btn-lg px-5" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i>WhatsApp Us
                    </a>
                    <a href="mailto:{{ $settings->email ?? 'sales@siddharsh.com' }}" class="btn btn-outline-light btn-lg px-5">Email Expert</a>
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
    "@type": "LocalBusiness",
    "name": "Siddharsh - Authorized Panduit Distributor India",
    "image": "https://siddharsh.com/logo.png",
    "@id": "https://siddharsh.com",
    "url": "https://siddharsh.com/panduit-distributor-india",
    "telephone": "{{ $settings->phone ?? '+91-XXXXXXXXXX' }}",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "Address details here",
        "addressLocality": "City",
        "addressRegion": "State",
        "postalCode": "Pin",
        "addressCountry": "IN"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": 0,
        "longitude": 0
    },
    "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
        ],
        "opens": "09:00",
        "closes": "18:00"
    },
    "sameAs": [
        "https://www.linkedin.com/company/siddharsh",
        "https://twitter.com/siddharsh"
    ]
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Siddharsh",
    "alternateName": "Siddharsh IT Infrastructure Solutions",
    "url": "https://siddharsh.com",
    "logo": "https://siddharsh.com/logo.png",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "{{ $settings->phone ?? '+91-XXXXXXXXXX' }}",
        "contactType": "customer service",
        "areaServed": "IN",
        "availableLanguage": "en"
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
            "name": "Are you an Authorized Panduit Distributor India?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, Siddharsh is a certified Authorized Panduit Distributor India. We supply 100% genuine products including copper cabling, fiber optics, and industrial automation solutions directly sourced from Panduit."
            }
        },
        {
            "@type": "Question",
            "name": "Do you provide Structured Cabling Solutions India?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. We offer end-to-end Structured Cabling Solutions India including design, supply, and certification for copper and fiber optic systems using Panduit and Legrand products."
            }
        },
        {
            "@type": "Question",
            "name": "What is included in your Datacenter Solutions India?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Our Datacenter Solutions India include hot/cold aisle containment, high-density fiber patching, intelligent PDUs, and environmental monitoring systems."
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
            "name": "Panduit Distributor India",
            "item": "{{ url()->current() }}"
        }
    ]
}
</script>
@endsection

@push('styles')
<style>
:root {
    --primary-soft: #edf2ff;
    --light-brand: #f8fafc;
}

.hero-section {
    padding: 100px 0 80px;
    background: radial-gradient(circle at 10% 20%, rgba(216, 241, 230, 0.46) 0.1%, rgba(233, 226, 226, 0.28) 90.1%);
    position: relative;
    overflow: hidden;
}

.hero-title {
    font-size: clamp(2.5rem, 5vw, 3.8rem);
    font-weight: 850;
    color: #1a202c;
    line-height: 1.1;
    margin-bottom: 25px;
    background: linear-gradient(90deg, #1a202c, #2d3748);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    font-size: 1.15rem;
    line-height: 1.7;
    color: #4a5568;
    margin-bottom: 35px;
}

.hero-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 40px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
    color: #2d3748;
}

.hero-image-wrapper {
    position: relative;
}

.floating-badge {
    position: absolute;
    bottom: 30px;
    left: -20px;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.badge-number {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary);
}

.badge-text {
    font-size: 0.8rem;
    font-weight: 600;
    color: #718096;
}

.stats-bar {
    padding: 40px 0;
}

.stat-count {
    font-weight: 800;
    color: var(--primary);
    margin-bottom: 5px;
}

.stat-label {
    font-weight: 600;
    color: #718096;
    margin-bottom: 0;
    font-size: 0.9rem;
}

.solution-card {
    background: #fff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid #edf2f7;
}

.solution-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

.solution-card.active {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
}

.solution-card.active .card-icon,
.solution-card.active h3,
.solution-card.active p,
.solution-card.active li {
    color: #fff;
}

.card-icon {
    font-size: 2.5rem;
    color: var(--primary);
    margin-bottom: 25px;
}

.solution-card h3 {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.card-list {
    list-style: none;
    padding: 0;
    margin-top: 20px;
}

.card-list li {
    padding-left: 25px;
    position: relative;
    margin-bottom: 10px;
    font-size: 0.95rem;
}

.card-list li::before {
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    position: absolute;
    left: 0;
    color: inherit;
    opacity: 0.7;
}

.feature-box {
    background: rgba(255,255,255,0.05);
    padding: 15px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 12px;
    border: 1px solid rgba(255,255,255,0.1);
}

.feature-box i {
    color: var(--primary);
}

.process-row {
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    overflow: hidden;
}

.process-card {
    padding: 40px;
    background: #fff;
    border-right: 1px solid #e2e8f0;
    height: 100%;
    position: relative;
}

.process-card:last-child {
    border-right: none;
}

.process-num {
    font-size: 3rem;
    font-weight: 800;
    color: #f1f5f9;
    position: absolute;
    top: 20px;
    right: 30px;
}

.custom-faq .accordion-item {
    border: none;
    margin-bottom: 15px;
    border-radius: 12px !important;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.04);
}

.custom-faq .accordion-button {
    font-weight: 700;
    padding: 20px;
}

.custom-faq .accordion-button:not(.collapsed) {
    background-color: var(--primary-soft);
    color: var(--primary);
}

.section-label {
    display: inline-block;
    padding: 6px 16px;
    background: var(--primary-soft);
    color: var(--primary);
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

@media (max-width: 991px) {
    .process-card {
        border-right: none;
        border-bottom: 1px solid #e2e8f0;
    }
    .hero-section {
        padding: 60px 0;
    }
}
</style>
@endpush