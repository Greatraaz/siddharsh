@extends('frontend.layouts.master')

@section('title', 'Datacenter Solutions India | Data Center Infrastructure | Panduit & Legrand')
@section('meta_description', 'Complete datacenter solutions in India. Rack systems, cable management, power distribution, environmental monitoring from Panduit, Legrand & leading brands. Expert design & implementation.')
@section('meta_keywords', 'datacenter solutions india, data center infrastructure, rack systems, cable management, power distribution, environmental monitoring, panduit datacenter, legrand datacenter')

@section('content')
{{-- ══════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════ --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="section-label">Enterprise Solutions</span>
                    <h1 class="hero-title">Datacenter Solutions <span class="text-primary">India</span></h1>
                    <p class="hero-description">Complete datacenter infrastructure solutions for modern enterprises. From rack systems to environmental monitoring, we deliver reliable, scalable, and efficient datacenter solutions using premium brands like Panduit, Legrand, and industry leaders.</p>

                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Scalable Infrastructure</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>99.9% Uptime</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>Energy Efficient</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary"></i>
                            <span>24/7 Monitoring</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="#contact-section" class="btn btn-primary btn-lg">Get Datacenter Quote</a>
                        <a href="{{ route('categories') }}" class="btn btn-outline-primary btn-lg">Browse Solutions</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=80"
                         alt="Datacenter Solutions India - Complete Data Center Infrastructure"
                         class="img-fluid rounded shadow"
                         loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     DATACENTER COMPONENTS
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Complete Infrastructure</span>
            <h2 class="section-title">Datacenter Infrastructure Components</h2>
            <p class="section-subtitle">End-to-end datacenter solutions for optimal performance and reliability</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <div class="datacenter-component-card">
                    <div class="component-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <h4>Rack & Cabinet Systems</h4>
                    <p>Professional server racks and cabinets designed for optimal airflow, cable management, and equipment protection in enterprise datacenters.</p>
                    <ul class="component-features">
                        <li>Standard & Custom Racks</li>
                        <li>Cable Management Rails</li>
                        <li>Security Features</li>
                        <li>Seismic Protection</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="datacenter-component-card">
                    <div class="component-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4>Cable Management</h4>
                    <p>Advanced cable management solutions including horizontal and vertical cable managers, patch panels, and fiber optic infrastructure.</p>
                    <ul class="component-features">
                        <li>Horizontal Managers</li>
                        <li>Vertical Cable Trays</li>
                        <li>Patch Panel Solutions</li>
                        <li>Fiber Management</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="datacenter-component-card">
                    <div class="component-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4>Power Distribution</h4>
                    <p>Comprehensive power distribution systems including PDUs, UPS systems, power strips, and intelligent power monitoring solutions.</p>
                    <ul class="component-features">
                        <li>Intelligent PDUs</li>
                        <li>Power Monitoring</li>
                        <li>UPS Integration</li>
                        <li>Energy Efficiency</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="datacenter-component-card">
                    <div class="component-icon">
                        <i class="fas fa-thermometer-half"></i>
                    </div>
                    <h4>Environmental Monitoring</h4>
                    <p>Temperature, humidity, and airflow monitoring systems with alerts and automated controls for optimal datacenter conditions.</p>
                    <ul class="component-features">
                        <li>Temperature Sensors</li>
                        <li>Humidity Monitoring</li>
                        <li>Airflow Management</li>
                        <li>Alert Systems</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="datacenter-component-card">
                    <div class="component-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Security Solutions</h4>
                    <p>Physical security systems including access controls, surveillance, and environmental monitoring for datacenter protection.</p>
                    <ul class="component-features">
                        <li>Access Control</li>
                        <li>Video Surveillance</li>
                        <li>Intrusion Detection</li>
                        <li>Environmental Alarms</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="datacenter-component-card">
                    <div class="component-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4>Energy Efficiency</h4>
                    <p>Energy-efficient solutions including intelligent power management, cooling optimization, and sustainable infrastructure design.</p>
                    <ul class="component-features">
                        <li>Power Optimization</li>
                        <li>Cooling Efficiency</li>
                        <li>Green Certifications</li>
                        <li>Cost Reduction</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     FEATURED PRODUCTS
══════════════════════════════════════════ --}}
@if($datacenterProducts->count())
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Premium Solutions</span>
            <h2 class="section-title">Featured Datacenter Products</h2>
            <a href="{{ route('search') }}?query=datacenter" class="section-view-all">View All Datacenter Products <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @foreach($datacenterProducts as $product)
            <div class="col-xl-3 col-lg-4 col-md-6">
                @include('frontend.components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════
     WHY DATACENTER SOLUTIONS
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Critical Infrastructure</span>
            <h2 class="section-title">Why Professional Datacenter Solutions Matter</h2>
            <p class="section-subtitle">Your datacenter is the heart of your digital operations</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="datacenter-benefits">
                    <h3>Benefits of Modern Datacenter Infrastructure</h3>

                    <div class="benefit-list">
                        <div class="benefit-item">
                            <i class="fas fa-tachometer-alt text-primary"></i>
                            <div>
                                <strong>High Availability:</strong> 99.9% uptime with redundant systems and failover protection
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-expand-arrows-alt text-primary"></i>
                            <div>
                                <strong>Scalability:</strong> Modular design allows easy expansion as your needs grow
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-bolt text-primary"></i>
                            <div>
                                <strong>Energy Efficiency:</strong> Intelligent power management reduces operational costs
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-shield-alt text-primary"></i>
                            <div>
                                <strong>Security:</strong> Comprehensive physical and environmental security measures
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-tools text-primary"></i>
                            <div>
                                <strong>Manageability:</strong> Centralized monitoring and management systems
                            </div>
                        </div>

                        <div class="benefit-item">
                            <i class="fas fa-leaf text-primary"></i>
                            <div>
                                <strong>Sustainability:</strong> Energy-efficient designs and green certifications
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="datacenter-standards">
                    <h3>Industry Standards & Compliance</h3>
                    <p>Our datacenter solutions meet international standards and regulatory requirements for enterprise-grade infrastructure.</p>

                    <div class="standards-grid">
                        <div class="standard-item">
                            <h5>TIA-942</h5>
                            <p>Telecommunications Infrastructure Standard for Data Centers</p>
                        </div>

                        <div class="standard-item">
                            <h5>Uptime Institute</h5>
                            <p>Tier Certification Standards</p>
                        </div>

                        <div class="standard-item">
                            <h5>ISO 27001</h5>
                            <p>Information Security Management</p>
                        </div>

                        <div class="standard-item">
                            <h5>Energy Star</h5>
                            <p>Energy Efficiency Certification</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     DATACENTER TIERS
══════════════════════════════════════════ --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Infrastructure Tiers</span>
            <h2 class="section-title">Datacenter Tier Classifications</h2>
            <p class="section-subtitle">Understanding datacenter reliability standards</p>
        </div>

        <div class="datacenter-tiers">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="tier-card">
                        <div class="tier-header">
                            <h4>Tier I</h4>
                            <span class="tier-rating">Basic</span>
                        </div>
                        <p>Single path for power and cooling distribution, no redundant components. Suitable for small businesses with low criticality.</p>
                        <div class="tier-features">
                            <span>99.671% Uptime</span>
                            <span>28.8 hours downtime/year</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="tier-card recommended">
                        <div class="tier-header">
                            <h4>Tier II</h4>
                            <span class="tier-rating">Redundant</span>
                        </div>
                        <p>Redundant components, single path for power and cooling. Suitable for most business applications requiring higher availability.</p>
                        <div class="tier-features">
                            <span>99.749% Uptime</span>
                            <span>22 hours downtime/year</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="tier-card">
                        <div class="tier-header">
                            <h4>Tier III</h4>
                            <span class="tier-rating">Concurrently Maintainable</span>
                        </div>
                        <p>Redundant distribution paths, all equipment maintainable without shutdown. Required for mission-critical applications.</p>
                        <div class="tier-features">
                            <span>99.982% Uptime</span>
                            <span>1.6 hours downtime/year</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="tier-card">
                        <div class="tier-header">
                            <h4>Tier IV</h4>
                            <span class="tier-rating">Fault Tolerant</span>
                        </div>
                        <p>2N+1 redundancy, completely fault-tolerant with no planned downtime. For ultra-critical financial and healthcare systems.</p>
                        <div class="tier-features">
                            <span>99.995% Uptime</span>
                            <span>26.3 minutes downtime/year</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     OUR SERVICES
══════════════════════════════════════════ --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">Professional Services</span>
            <h2 class="section-title">Complete Datacenter Implementation</h2>
            <p class="section-subtitle">From design to ongoing management</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h4>Assessment & Design</h4>
                    <p>Comprehensive datacenter assessment, capacity planning, and custom infrastructure design based on your requirements.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>Implementation</h4>
                    <p>Professional installation and configuration of all datacenter infrastructure components by certified technicians.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Monitoring & Management</h4>
                    <p>24/7 monitoring, maintenance, and management services to ensure optimal datacenter performance and uptime.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-py bg-white" aria-labelledby="faq-heading">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label">FAQ</span>
            <h2 class="section-title" id="faq-heading">Datacenter Solutions FAQs</h2>
            <p class="section-subtitle">Common questions about datacenter infrastructure, rack systems, cable management, and critical uptime support.</p>
        </div>

        <div class="accordion" id="datacenterFaq">
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                        What datacenter solutions do you offer in India?
                    </button>
                </h3>
                <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faq-heading-1" data-bs-parent="#datacenterFaq">
                    <div class="accordion-body">
                        We offer complete datacenter solutions including rack systems, power distribution, cooling infrastructure, cable management, and environmental monitoring from leading brands like Panduit and Legrand.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                        Can you support datacenter design and installation?
                    </button>
                </h3>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2" data-bs-parent="#datacenterFaq">
                    <div class="accordion-body">
                        Yes. Our team offers datacenter design, site assessment, installation planning, and full implementation services to ensure reliable, efficient, and scalable data center operations.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                        Do you provide rack and cable management solutions?
                    </button>
                </h3>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3" data-bs-parent="#datacenterFaq">
                    <div class="accordion-body">
                        Absolutely. We provide rack and cabinet systems, cable management accessories, power distribution units, and containment solutions for optimized datacenter performance.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="faq-heading-4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                        How can I request a datacenter infrastructure quote?
                    </button>
                </h3>
                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4" data-bs-parent="#datacenterFaq">
                    <div class="accordion-body">
                        Use the Request Assessment button, visit our <a href="{{ route('contact') }}">Contact Us</a> page, or message us on WhatsApp to get a datacenter quote tailored to your project requirements.
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
                <h2 class="cta-title">Transform Your Datacenter Infrastructure</h2>
                <p class="cta-subtitle mb-4">Contact our datacenter experts for assessment, design consultation, and implementation. Ensure 99.9% uptime for your critical operations.</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-envelope me-2"></i>Request Assessment
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
    "name": "Datacenter Solutions India",
    "description": "Complete datacenter infrastructure solutions in India including rack systems, cable management, power distribution, and environmental monitoring from Panduit, Legrand & leading brands",
    "provider": {
        "@type": "Organization",
        "name": "Siddharsh"
    },
    "serviceType": "Data Center Infrastructure",
    "areaServed": {
        "@type": "Country",
        "name": "India"
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Datacenter Services",
        "itemListElement": [
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Rack & Cabinet Systems"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Cable Management Solutions"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Power Distribution Systems"
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
            "name": "What datacenter solutions do you offer in India?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We offer complete datacenter solutions including rack systems, power distribution, cooling infrastructure, cable management, and environmental monitoring from leading brands like Panduit and Legrand."
            }
        },
        {
            "@type": "Question",
            "name": "Can you support datacenter design and installation?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. Our team offers datacenter design, site assessment, installation planning, and full implementation services to ensure reliable, efficient, and scalable data center operations."
            }
        },
        {
            "@type": "Question",
            "name": "Do you provide rack and cable management solutions?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Absolutely. We provide rack and cabinet systems, cable management accessories, power distribution units, and containment solutions for optimized datacenter performance."
            }
        },
        {
            "@type": "Question",
            "name": "How can I request a datacenter infrastructure quote?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Use the Request Assessment button, visit our Contact Us page, or message us on WhatsApp to get a datacenter quote tailored to your project requirements."
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
            "name": "Datacenter Solutions India",
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

.datacenter-component-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
}

.datacenter-component-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.datacenter-component-card .component-icon {
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

.datacenter-component-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 16px;
}

.datacenter-component-card p {
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 20px;
}

.component-features {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: left;
}

.component-features li {
    position: relative;
    padding-left: 20px;
    color: var(--text-main);
    font-size: 0.9rem;
    margin-bottom: 8px;
}

.component-features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--primary);
    font-weight: bold;
}

.datacenter-benefits h3,
.datacenter-standards h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 20px;
}

.datacenter-benefits p {
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

.datacenter-tiers {
    margin-top: 40px;
}

.tier-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    position: relative;
}

.tier-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.tier-card.recommended {
    border: 2px solid var(--primary);
}

.tier-card.recommended::before {
    content: 'Most Popular';
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--primary);
    color: #fff;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.tier-header {
    margin-bottom: 16px;
}

.tier-header h4 {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--text-main);
    margin-bottom: 4px;
}

.tier-rating {
    display: inline-block;
    background: var(--primary-soft);
    color: var(--primary);
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.tier-card p {
    color: var(--text-muted);
    line-height: 1.6;
    font-size: 0.9rem;
    margin-bottom: 20px;
}

.tier-features {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.tier-features span {
    background: var(--bg-light);
    color: var(--text-main);
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 600;
}

.service-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
}

.service-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.service-card .service-icon {
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

.service-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 12px;
}

.service-card p {
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

    .standards-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush