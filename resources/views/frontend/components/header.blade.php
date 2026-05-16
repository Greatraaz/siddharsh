@php
    $headerCategories = \App\Models\Category::where('status', 1)->get();
    $headerBrands     = \App\Models\Brand::where('status', 1)->get();
    $headerSolutions  = \App\Models\Solution::where('status', 1)->get();
    $headerSettings   = \App\Models\Setting::first();
@endphp

<header id="site-header">
    {{-- Top Bar --}}
    <div class="header-topbar">
        <div class="container-fluid px-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2 gap-3">
                {{-- Left: Contact --}}
                <div class="topbar-left d-flex align-items-center gap-4 flex-shrink-0">
                    @if($headerSettings->phone)
                    <a href="tel:{{ $headerSettings->phone }}" class="topbar-link">
                        <i class="fas fa-phone-alt"></i> Call us on {{ $headerSettings->phone }}
                    </a>
                    @endif
                    @if($headerSettings->email)
                    <a href="mailto:{{ $headerSettings->email }}" class="topbar-link border-start ps-4">
                        <i class="fas fa-envelope"></i> Email: {{ $headerSettings->email }}
                    </a>
                    @endif
                </div>

                {{-- Center: Marquee --}}
                <div class="topbar-marquee-wrap">
                    <div class="topbar-marquee" aria-label="Announcement">
                        <span>Siddharsh: Authorized Panduit Distributor for Future-Ready Network Infrastructure Solutions India</span>
                    </div>
                </div>

                {{-- Right: Social --}}
                <div class="topbar-right d-flex align-items-center gap-3 flex-shrink-0">
                    <span class="topbar-label">Social media:</span>
                    <div class="d-flex gap-3">
                        @if($headerSettings->facebook) <a href="{{ $headerSettings->facebook }}" class="topbar-social" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                        @if($headerSettings->youtube) <a href="{{ $headerSettings->youtube }}" class="topbar-social" target="_blank"><i class="fab fa-youtube"></i></a> @endif
                        @if($headerSettings->linkedin) <a href="{{ $headerSettings->linkedin }}" class="topbar-social" target="_blank"><i class="fab fa-linkedin-in"></i></a> @endif
                        @if($headerSettings->instagram) <a href="{{ $headerSettings->instagram }}" class="topbar-social" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Nav --}}
    <nav class="header-nav" id="mainNav">
        <div class="container-fluid px-4">
            <div class="nav-inner">
                {{-- Logo --}}
                <a href="https://siddharsh.com/" class="nav-logo" aria-label="Siddharsh Home">
                    @if($headerSettings && $headerSettings->logo)
                        <img src="{{ asset('uploads/settings/'.$headerSettings->logo) }}" alt="{{ $headerSettings->site_title ?? 'Siddharsh' }}" style="height:54px;width:auto;object-fit:contain;">
                    @else
                        <span class="logo-text">SIDDHARSH<span class="logo-dot">.</span></span>
                    @endif
                </a>

                {{-- Search Bar --}}
                <form action="{{ route('search') }}" method="GET" class="header-search-form d-flex align-items-center">
                    <input type="text" name="query" value="{{ request('query') }}" class="header-search-input" placeholder="Keyword, Part Number or Cross-Reference" autocomplete="off">
                    <button type="submit" class="header-search-btn"><i class="fas fa-search"></i></button>
                </form>

                {{-- Desktop Menu --}}
                <div class="nav-menu-wrapper d-flex">
                    <ul class="nav-menu" id="desktopMenu">
                        <li class="nav-item has-mega">
                            <a href="https://siddharsh.com/about-us/" class="nav-link-item">
                                About us <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <div class="mega-menu about-mega">
                                <div class="mega-links-area">
                                    <div class="mega-header">
                                        <span class="mega-header-label">CORPORATE</span>
                                        <h3 class="mega-header-title">About Siddharsh</h3>
                                    </div>
                                    <div class="mega-grid-2-cols">
                                        <a href="https://siddharsh.com/about-us/#who-we-are" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-users"></i></div>
                                            <span class="mega-link-title">Who We Are</span>
                                        </a>
                                        <a href="https://siddharsh.com/about-us/#siddharsh-promise" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-lightbulb"></i></div>
                                            <span class="mega-link-title">Siddharsh Promise</span>
                                        </a>
                                        <a href="https://siddharsh.com/about-us/#mission-and-vision" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-eye"></i></div>
                                            <span class="mega-link-title">Mission and Vision</span>
                                        </a>
                                        <a href="https://siddharsh.com/about-us/#our-team" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-user-friends"></i></div>
                                            <span class="mega-link-title">Our Team</span>
                                        </a>
                                        <a href="https://siddharsh.com/about-us/#why-choose-us" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-check-circle"></i></div>
                                            <span class="mega-link-title">Why Choose Us</span>
                                        </a>
                                        <a href="https://siddharsh.com/about-us/#siddharsh-advantage" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-award"></i></div>
                                            <span class="mega-link-title">Siddharsh Advantage</span>
                                        </a>
                                        <a href="https://siddharsh.com/about-us/#investor-relations" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-chart-line"></i></div>
                                            <span class="mega-link-title">Investor Relations</span>
                                        </a>
                                        <a href="https://siddharsh.com/about-us/#career" class="mega-link-card">
                                            <div class="mega-link-icon"><i class="fas fa-briefcase"></i></div>
                                            <span class="mega-link-title">Careers</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="mega-panel-area">
                                    <div class="mega-panel-inner">
                                        <div class="mega-panel-img">
                                            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=80" alt="Corporate">
                                            <div class="mega-panel-badge">ESTD 1999</div>
                                        </div>
                                        <div class="mega-panel-content">
                                            <h4 class="mega-panel-title">Leading the Way in Enterprise Tech</h4>
                                            <p class="mega-panel-desc">Siddharsh is a trusted distributor providing end-to-end infrastructure solutions.</p>
                                            <a href="https://siddharsh.com/about-us/" class="mega-panel-btn">
                                                Learn More <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item has-mega">
                            <a href="{{ route('categories') }}" class="nav-link-item {{ request()->is('products*') ? 'active' : '' }}">
                                 Products <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <div class="mega-menu" id="megaMenu">
                                <div class="mega-inner">
                                    {{-- Level 1: Categories --}}
                                    <div class="mega-col mega-col-cats">
                                        <div class="mega-col-head">Main Categories</div>
                                        <ul class="mega-cat-list" id="catList">
                                            @foreach($headerCategories as $cat)
                                            <li class="mega-cat-item">
                                                <a href="{{ route('category.products', $cat->slug) }}" 
                                                   class="mega-cat-link" 
                                                   data-id="{{ $cat->id }}"
                                                   data-name="{{ $cat->name }}"
                                                   data-type="category">
                                                    <span>{{ $cat->name }}</span>
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="mega-cat-footer">
                                            <a href="#" class="mega-cat-link mega-featured-trigger" data-type="featured">
                                                <span class="fw-bold">FEATURED PRODUCTS</span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    {{-- Level 2: Sub Categories or Featured Products --}}
                                    <div class="mega-col mega-col-subs" id="megaSubsCol">
                                        <div class="mega-col-head mega-sub-head" id="megaSubHead">Sub Categories</div>
                                        <div id="megaSubsContainer">
                                            <ul class="mega-sub-list" id="megaSubsList">
                                                <li class="mega-empty">Select a category to view details</li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- Level 3: Child Categories --}}
                                    <div class="mega-col mega-col-children" id="megaChildCol">
                                        <div class="mega-col-head mega-child-head" id="megaChildHead">Child Categories</div>
                                        <div id="megaChildContent" class="mega-child-group">
                                            <span class="mega-empty">Select a subcategory to view child categories</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item has-mega">
                            <a href="{{ route('solutions.index') }}" class="nav-link-item {{ request()->is('solutions*') ? 'active' : '' }}">
                                 Solutions <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <div class="mega-menu solutions-mega">
                                <div class="mega-links-area">
                                    <div class="mega-header">
                                        <span class="mega-header-label">EXPERTISE</span>
                                        <h3 class="mega-header-title">Our Solutions</h3>
                                    </div>
                                    <div class="mega-grid-2-cols">
                                        @forelse($headerSolutions as $sol)
                                        <a href="{{ route('solutions.show', $sol->slug) }}" class="mega-link-card">
                                            <div class="mega-link-icon">
                                                @if(preg_match('/\.(png|jpg|jpeg|svg|webp)$/i', $sol->icon))
                                                    <img src="{{ asset('uploads/solutions/'.$sol->icon) }}" alt="{{ $sol->name }}" style="width: 20px; height: 20px; filter: invert(1);">
                                                @else
                                                    <i class="{{ $sol->icon }}"></i>
                                                @endif
                                            </div>
                                            <span class="mega-link-title">{{ $sol->name }}</span>
                                        </a>
                                        @empty
                                        <div class="p-4 text-center text-muted small">No solutions found.</div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="mega-panel-area">
                                    <div class="mega-panel-inner">
                                        <div class="mega-panel-img">
                                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=800&q=80" alt="Solutions">
                                            <div class="mega-panel-badge">INNOVATION</div>
                                        </div>
                                        <div class="mega-panel-content">
                                            <h4 class="mega-panel-title">Empowering Digital Transformation</h4>
                                            <p class="mega-panel-desc">We design and distribute future-ready technology solutions.</p>
                                            <a href="{{ route('solutions.index') }}" class="mega-panel-btn">
                                                All Solutions <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item has-mega">
                            <a href="{{ route('brands') }}" class="nav-link-item {{ request()->routeIs('brands') ? 'active' : '' }}">
                                Alliances <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <div class="mega-menu alliances-mega">
                                <div class="mega-links-area">
                                    <div class="mega-header">
                                        <span class="mega-header-label">PARTNERSHIPS</span>
                                        <h3 class="mega-header-title">Strategic Alliances</h3>
                                    </div>
                                    <div class="mega-grid-logo-layout">
                                        @foreach($headerBrands->take(12) as $brand)
                                        <a href="{{ route('brand.details', $brand->slug) }}" class="mega-logo-box" title="{{ $brand->name }}">
                                            @if($brand->image)
                                                <img src="{{ asset('uploads/brands/'.$brand->image) }}" alt="{{ $brand->name }}">
                                            @else
                                                <span class="mega-logo-text">{{ $brand->name }}</span>
                                            @endif
                                        </a>
                                        @endforeach
                                    </div>
                                    <div class="mega-links-footer mt-4">
                                        <a href="{{ route('brands') }}" class="mega-action-link">
                                            Discover All 50+ Global Partners <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mega-panel-area">
                                    <div class="mega-panel-inner">
                                        <div class="mega-panel-img">
                                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80" alt="Alliances">
                                            <div class="mega-panel-badge">PARTNERS</div>
                                        </div>
                                        <div class="mega-panel-content">
                                            <h4 class="mega-panel-title">The World's Leading Brands</h4>
                                            <p class="mega-panel-desc">We collaborate with global technology leaders to deliver best-in-class products to our clients.</p>
                                            <a href="{{ route('brands') }}" class="mega-panel-btn">
                                                Partner Brands <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item has-dropdown">
                            <a href="https://siddharsh.com/services/" class="nav-link-item">
                                 Services <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <div class="nav-dropdown services-dropdown">
                                <div class="services-dropdown-links">
                                    <a href="https://siddharsh.com/services/#saas" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-cloud"></i></span>
                                        <span>SaaS Solutions</span>
                                    </a>
                                    <a href="https://siddharsh.com/services/#it-consulting-services" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-headset"></i></span>
                                        <span>IT Consulting Services</span>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link-item">Contact us</a>
                        </li>

                    </ul>
                </div>

                {{-- Get a Quote Button --}}
                <a href="{{ route('search') }}" class="btn btn-quote-premium">
                    Get a quote now <i class="fas fa-arrow-right ms-2"></i>
                </a>

                {{-- Mobile Toggle --}}
                <button class="hamburger d-lg-none" id="mobileToggle" aria-label="Open menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Menu Drawer --}}
    <div class="mobile-drawer" id="mobileDrawer" aria-hidden="true">
        <div class="mobile-drawer-inner">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <a href="{{ route('home') }}" class="nav-logo">
                    @if($headerSettings && $headerSettings->logo)
                        <img src="{{ asset('uploads/settings/'.$headerSettings->logo) }}" alt="Logo" style="height:34px;">
                    @else
                        <span class="logo-text">SIDDHARSH<span class="logo-dot">.</span></span>
                    @endif
                </a>
                <button class="btn-close" id="mobileDrawerClose"></button>
            </div>
            <ul class="mobile-menu-list">
                <li class="mobile-has-children">
                    <div class="mobile-menu-link mobile-accordion-toggle" data-target="mobileAbout">
                        <span>About us</span>
                        <i class="fas fa-chevron-down mobile-arrow"></i>
                    </div>
                    <div class="mobile-accordion-body" id="mobileAbout" style="display:none;">
                        <a href="https://siddharsh.com/about-us/#who-we-are" class="mobile-sub-link">Who We Are</a>
                        <a href="https://siddharsh.com/about-us/#mission-and-vision" class="mobile-sub-link">Mission and Vision</a>
                        <a href="https://siddharsh.com/about-us/#why-choose-us" class="mobile-sub-link">Why Choose us</a>
                        <a href="https://siddharsh.com/about-us/#investor-relations" class="mobile-sub-link">Investor Relations</a>
                        <a href="https://siddharsh.com/about-us/#bicsi-member" class="mobile-sub-link">BICSI Member</a>
                        <a href="https://siddharsh.com/about-us/#siddharsh-promise" class="mobile-sub-link">Siddharsh Promise</a>
                        <a href="https://siddharsh.com/about-us/#our-team" class="mobile-sub-link">Our Team</a>
                        <a href="https://siddharsh.com/about-us/#siddharsh-advantage" class="mobile-sub-link">Siddharsh Advantage</a>
                        <a href="https://siddharsh.com/about-us/#career" class="mobile-sub-link">Career</a>
                        <div class="mobile-about-summary">
                            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=500&q=80" alt="About Us" loading="lazy">
                            <p>We deliver reliable enterprise IT infrastructure solutions with a people-first, partnership-driven approach.</p>
                        </div>
                    </div>
                </li>

                <li class="mobile-has-children">
                    <div class="mobile-menu-link mobile-accordion-toggle" data-target="mobileCats">
                        <span><i class="fas fa-cube mobile-link-icon"></i> Products</span>
                        <i class="fas fa-chevron-down mobile-arrow"></i>
                    </div>
                    <div class="mobile-accordion-body" id="mobileCats" style="display:none;">
                        <a href="{{ route('categories') }}" class="mobile-sub-link fw-600 text-primary">View All Categories</a>
                        @foreach($headerCategories as $cat)
                        <div class="mobile-cat-group">
                            <div class="mobile-sub-accordion-toggle" data-target="mobileCat{{ $cat->id }}">
                                <a href="{{ route('category.products', $cat->slug) }}" class="mobile-sub-link fw-600">{{ $cat->name }}</a>
                                @if($cat->subcategories->count())
                                <i class="fas fa-chevron-down mobile-arrow-sm"></i>
                                @endif
                            </div>
                            @if($cat->subcategories->count())
                            <div class="mobile-sub-accordion-body" id="mobileCat{{ $cat->id }}" style="display:none;">
                                @foreach($cat->subcategories as $sub)
                                <div class="mobile-sub-group">
                                    <div class="mobile-sub-accordion-toggle" data-target="mobileSub{{ $sub->id }}">
                                        <a href="{{ route('subcategory.products', $sub->slug) }}" class="mobile-child-link">{{ $sub->name }}</a>
                                        @if($sub->childCategories->count())
                                        <i class="fas fa-chevron-down mobile-arrow-sm"></i>
                                        @endif
                                    </div>
                                    @if($sub->childCategories->count())
                                    <div class="mobile-sub-accordion-body" id="mobileSub{{ $sub->id }}" style="display:none;">
                                        @foreach($sub->childCategories as $child)
                                        <a href="{{ route('childcategory.products', $child->slug) }}" class="mobile-grandchild-link">
                                            <i class="fas fa-minus"></i> {{ $child->name }}
                                        </a>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </li>

                <li class="mobile-has-children">
                    <div class="mobile-menu-link mobile-accordion-toggle" data-target="mobileSolutions">
                        <span><i class="fas fa-lightbulb mobile-link-icon"></i> Solutions</span>
                        <i class="fas fa-chevron-down mobile-arrow"></i>
                    </div>
                    <div class="mobile-accordion-body" id="mobileSolutions" style="display:none;">
                        <a href="{{ route('solutions.index') }}" class="mobile-sub-link fw-600 text-primary">View All Solutions</a>
                        <a href="{{ route('solutions.index') }}" class="mobile-sub-link">Browse by Category</a>
                        <a href="{{ route('categories') }}" class="mobile-sub-link">Associated Products</a>
                    </div>
                </li>

                <li><a href="{{ route('brands') }}" class="mobile-menu-link">Alliances</a></li>
                
                <li class="mobile-has-children">
                    <div class="mobile-menu-link mobile-accordion-toggle" data-target="mobileServices">
                        <span><i class="fas fa-wrench mobile-link-icon"></i> Services</span>
                        <i class="fas fa-chevron-down mobile-arrow"></i>
                    </div>
                    <div class="mobile-accordion-body" id="mobileServices" style="display:none;">
                        <a href="https://siddharsh.com/services/#saas" class="mobile-sub-link">
                            <i class="fas fa-cloud"></i> SaaS Solutions
                        </a>
                        <a href="https://siddharsh.com/services/#it-consulting-services" class="mobile-sub-link">
                            <i class="fas fa-headset"></i> IT Consulting Services
                        </a>
                    </div>
                </li>

                <li><a href="{{ route('contact') }}" class="mobile-menu-link">Contact us</a></li>

            </ul>
            <div class="mobile-drawer-footer">
                <a href="{{ route('search') }}" class="btn btn-quote w-100 justify-content-center">
                    Get a quote now <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="mobile-overlay" id="mobileOverlay"></div>
</header>

<style>
/* ─── HEADER BASE ──────────────────────────────────────── */
#site-header { position: sticky; top: 0; z-index: 1050; }

.header-topbar {
    font-family: 'Outfit', sans-serif;
    background: #007e5e;
    color: #fff;
    font-size: 0.85rem;
}
.topbar-link {
    color: #fff !important;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition-fast);
    text-decoration: none;
}
.topbar-link:hover { opacity: 0.9; color: #15cb97 !important; }
.topbar-link i { font-size: 0.9rem; color: #15cb97; }

.topbar-label {
    font-size: 0.8rem;
    font-weight: 600;
    opacity: 0.9;
}

.topbar-social {
    color: #fff;
    font-size: 1rem;
    transition: var(--transition-fast);
}
.topbar-social:hover { color: #15cb97; transform: translateY(-2px); }

.topbar-marquee-wrap {
    flex: 1;
    min-width: 0;
    overflow: hidden;
    position: relative;
    padding: 0 16px;
    text-align: center;
}
.topbar-marquee {
    display: inline-block;
    white-space: nowrap;
    animation: marquee-scroll 16s linear infinite;
}
.topbar-marquee span {
    display: inline-block;
    font-size: 0.9rem;
    font-weight: 700;
    color: #fff;
    padding-left: 100%;
}
@keyframes marquee-scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100%); }
}

/* ─── MAIN NAV ──────────────────────────────────────────── */
.header-nav {
    position: relative;
    background: #fff;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    transition: var(--transition);
}
.header-nav.scrolled {
    box-shadow: 0 4px 30px rgba(0,0,0,0.12);
}
.nav-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    min-height: 70px;
    padding: 0.55rem 0;
}

/* Logo */
.nav-logo { display: flex; align-items: center; flex-shrink: 0; }
.logo-text {
    font-family: 'Outfit', sans-serif;
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--dark);
    letter-spacing: -0.03em;
}
.logo-dot { color: var(--primary); }

/* Search Bar */
.header-search-form {
    display: flex;
    align-items: center;
    background: #f3f4f6;
    border: 1.5px solid #e5e7eb;
    border-radius: 999px;
    padding: 2px 6px 2px -5px;
    width: 200px;
    max-width: 100%;
    transition: all 0.25s ease;
    flex-shrink: 0;
}
.header-search-input {
    border: none;
    background: transparent;
    width: 100%;
    padding: 10px 12px;
    font-size: 0.9rem;
    color: #1f2937;
    outline: none;
    border-radius: 999px;
}
.header-search-input::placeholder {
    color: #6b7280;
}
.header-search-btn {
    border: none;
    background: transparent;
    color: #007e5e;
    font-size: 1rem;
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background 0.2s ease, color 0.2s ease;
}
.header-search-btn:hover {
    background: rgba(0,126,94,0.1);
    color: #005a47;
}
.header-search-form:focus-within {
    border-color: #007e5e;
    box-shadow: 0 0 0 2px rgba(0,126,94,0.12);
}

/* Desktop Menu */
.nav-menu-wrapper { display: flex; align-items: center; flex: 1; justify-content: center; }
.nav-menu {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 0rem;
    margin: 0; padding: 0;
}
.nav-item { position: relative; }

.nav-link-item {
    font-family: 'Outfit', sans-serif;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 14px 16px;
    font-size: 0.9rem;
    font-weight: 700;
    color: #222 !important;
    letter-spacing: 0.01em;
    transition: var(--transition-fast);
    white-space: nowrap;
    position: relative;
}
.nav-link-item::after {
    content: '';
    position: absolute;
    bottom: 10px;
    left: 16px;
    right: 16px;
    height: 2px;
    background: #007e5e;
    transform: scaleX(0);
    transition: transform 0.3s ease;
}
.nav-link-item:hover::after,
.nav-link-item.active::after {
    transform: scaleX(1);
}
.nav-link-item:hover,
.nav-item:hover > .nav-link-item,
.nav-link-item.active {
    color: #007e5e !important;
}
.nav-arrow {
    font-size: 0.65rem;
    transition: transform 0.25s ease;
}
.nav-item:hover .nav-arrow { transform: rotate(180deg); }

.nav-actions {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Dropdown Menu */
.nav-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    min-width: 220px;
    list-style: none;
    padding: 10px 0;
    margin: 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 0 0 8px 8px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    z-index: 1000;
}
.nav-item.is-open .nav-dropdown { opacity: 1; visibility: visible; transform: translateY(0); }
.nav-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 240px;
    background: #fff;
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    border-radius: 18px;
    padding: 16px;
    border: 1px solid rgba(0,0,0,0.08);
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(8px);
    transition: all 0.2s ease;
}
.nav-item.has-dropdown:hover > .nav-dropdown,
.nav-item.has-dropdown.is-open > .nav-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.mega-menu.about-mega,
.mega-menu.solutions-mega,
.mega-menu.alliances-mega {
    display: grid;
    grid-template-columns: 1.8fr 1fr;
    padding: 0;
    overflow: hidden;
    background: #fff;
}

.mega-links-area {
    padding: 24px 32px;
    background: #fff;
    display: flex;
    flex-direction: column;
}

.mega-header {
    margin-bottom: 16px;
}

.mega-header-label {
    display: block;
    font-size: 0.7rem;
    font-weight: 800;
    color: #007e5e;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.mega-header-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: #1a1a1a;
    margin: 0;
}

.mega-grid-2-cols {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.mega-link-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 14px;
    border-radius: 12px;
    background: #fdfdfd;
    border: 1px solid rgba(0,0,0,0.04);
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.mega-link-card:hover {
    background: #f0f7f4;
    border-color: rgba(0, 126, 94, 0.15);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 126, 94, 0.05);
}

.mega-link-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #007e5e 0%, #00a87d 100%);
    border-radius: 10px;
    color: #fff;
    font-size: 0.95rem;
    flex-shrink: 0;
    box-shadow: 0 4px 10px rgba(0, 126, 94, 0.1);
}

.mega-link-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.mega-link-title {
    font-size: 0.88rem;
    font-weight: 700;
    color: #1a1a1a;
    transition: color 0.3s ease;
}

.mega-link-desc {
    font-size: 0.78rem;
    color: #666;
    margin: 0;
    line-height: 1.4;
}

.mega-link-card:hover .mega-link-title {
    color: #007e5e;
}

.mega-panel-area {
    background: #f8fafc;
    border-left: 1px solid rgba(0,0,0,0.05);
    padding: 32px;
    display: flex;
}

.mega-panel-inner {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.mega-panel-img {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    aspect-ratio: 16/9;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.mega-panel-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.mega-panel-inner:hover .mega-panel-img img {
    transform: scale(1.05);
}

.mega-panel-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: rgba(0, 126, 94, 0.95);
    color: #fff;
    font-size: 0.65rem;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 6px;
    letter-spacing: 0.05em;
    backdrop-filter: blur(4px);
}

.mega-panel-content {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.mega-panel-title {
    font-size: 1.15rem;
    font-weight: 800;
    color: #1a1a1a;
    margin: 0;
    line-height: 1.3;
}

.mega-panel-desc {
    font-size: 0.85rem;
    color: #555;
    margin: 0;
    line-height: 1.6;
}

.mega-panel-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #007e5e !important;
    font-weight: 700;
    font-size: 0.88rem;
    text-decoration: none !important;
    transition: gap 0.3s ease;
    margin-top: 4px;
}

.mega-panel-btn:hover {
    gap: 14px;
}

.mega-grid-logo-layout {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.mega-logo-box {
    background: #fff;
    border: 1px solid rgba(0,0,0,0.06);
    border-radius: 14px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.mega-logo-box img {
    max-height: 36px;
    max-width: 100%;
    object-fit: contain;
    filter: grayscale(1);
    opacity: 0.6;
    transition: all 0.3s ease;
}

.mega-logo-box:hover {
    border-color: #007e5e;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 126, 94, 0.08);
}

.mega-logo-box:hover img {
    filter: grayscale(0);
    opacity: 1;
}

.mega-action-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #007e5e;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none !important;
}

.mega-action-link:hover i {
    transform: translateX(5px);
}
.mega-action-link i {
    transition: transform 0.3s ease;
}
.about-panel-cta:hover {
    background: #005a47;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 126, 94, 0.2);
}
/* Removed old about panel styles */
.about-panel-image {
    display: none;
}
.illustration-card {
    position: relative;
    width: 100%;
    max-width: 260px;
    height: 210px;
    background: linear-gradient(180deg, #ffffff 0%, #f8fffb 100%);
    border-radius: 28px;
    box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
    overflow: hidden;
}
.illustration-stack {
    position: absolute;
    left: 24px;
    width: 68px;
    height: 48px;
    border-radius: 18px;
    background: linear-gradient(135deg, #007e5e, #00b38a);
    box-shadow: 0 10px 20px rgba(0, 126, 94, 0.2);
}
.illustration-stack-1 { top: 28px; }
.illustration-stack-2 { top: 84px; left: 44px; width: 88px; }
.illustration-stack-3 { top: 144px; left: 20px; width: 66px; height: 40px; }
.illustration-wire,
.illustration-wire-2 {
    position: absolute;
    width: 40%;
    height: 4px;
    background: rgba(0,126,94,0.18);
    border-radius: 999px;
}
.illustration-wire { top: 62px; right: 16px; transform: rotate(12deg); }
.illustration-wire-2 { top: 130px; right: 16px; transform: rotate(-10deg); }

.nav-dropdown li a {
    display: block;
    padding: 10px 20px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #555;
    transition: var(--transition-fast);
}
.nav-dropdown li a:hover { color: #007e5e; background: #f0f7f4; }

/* Quote Button */
.btn-quote-premium {
    font-family: 'Outfit', sans-serif;
    background: #004d39;
    color: #fff !important;
    padding: 10px 22px;
    font-size: 0.9rem;
    font-weight: 700;
    border-radius: 10px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    border: none;
    text-decoration: none;
}
.btn-quote-premium:hover {
    background: #007e5e;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,126,94,0.2);
}

/* ─── MEGA MENU ─────────────────────────────────────────── */
.nav-item.has-dropdown,
.nav-item.has-mega {
    position: relative;
}

.nav-item.has-mega {
    position: static !important;
}
.has-mega { position: static !important; }

.mega-menu {
    position: absolute;
    top: 100%;
    width: auto;
    min-width: 350px;
    max-width: 95vw;
    left: 50% !important;
    transform: translate(-50%, 20px) !important;
    background: #fff;
    box-shadow: 0 20px 60px rgba(0,0,0,0.12);
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    z-index: 1050;
    border: 1px solid var(--border-light);
    border-top: 4px solid #007e5e;
    pointer-events: none;
    border-radius: 0 0 15px 15px;
    overflow: hidden;
}
.has-mega.is-open .mega-menu { 
    opacity: 1; 
    visibility: visible; 
    transform: translate(-50%, 0) !important;
    pointer-events: auto;
}

/* Fixed size only for these three */
.about-mega,
.solutions-mega,
.alliances-mega {
    width: 1100px !important;
    height: 380px !important;
    border-radius: 24px !important;
    border: none !important;
    box-shadow: 0 40px 100px rgba(0,0,0,0.18) !important;
    border-top: 4px solid #007e5e !important;
}

.mega-inner {
    display: flex;
    align-items: stretch;
    background: #fff;
    height: auto;
    max-height: 420px;
    overflow: hidden;
}

/* About Mega styles moved up and standardized */

.mega-feature-list { list-style: none; padding: 0; margin: 0; }
.mega-feature-item { margin-bottom: 5px; }
.mega-cat-list,
.mega-sub-list,
.mega-feature-list {
    list-style: none;
    margin: 0;
    padding: 0;
}
.mega-cat-item,
.mega-sub-item {
    list-style: none;
    margin: 0;
    padding: 0;
}
.mega-cat-footer {
    border-top: 1px solid #eee;
    margin-top: auto;
    padding: 14px 16px 16px;
}
.mega-featured-trigger {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 12px 16px;
    border-radius: 12px;
    background: #f9fafb;
    color: #222;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s ease;
    border: 1px solid rgba(0, 0, 0, 0.06);
}
.mega-featured-trigger:hover {
    background: #eef7f1;
}
.mega-feature-link {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px;
    border-radius: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
}
.mega-feature-link:hover {
    background: #f0f7f4;
}
.mega-icon-box {
    width: 44px;
    height: 44px;
    background: #007e5e;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    font-size: 1.2rem;
    flex-shrink: 0;
}
.mega-title {
    display: block;
    font-size: 1rem;
    font-weight: 700;
    color: #222;
}

.mega-col { 
    width: 350px;
    flex-shrink: 0;
    height: auto;
    min-height: 320px;
    max-height: 420px;
    overflow-y: auto;
    overflow-x: hidden;
    opacity: 0;
    display: none;
    transform: translateX(-10px);
    transition: all 0.4s ease;
    flex-direction: column;
    border-right: 1px solid var(--border-light);
}

.mega-col::-webkit-scrollbar { width: 8px; }
.mega-col::-webkit-scrollbar-track { background: #f8f9fa; }
.mega-col::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; border: 2px solid #f8f9fa; }
.mega-col::-webkit-scrollbar-thumb:hover { background: #007e5e; }

.mega-col-cats { display: flex; opacity: 1; transform: translateX(0); visibility: visible; }
.mega-col-subs.is-visible, .mega-col-children.is-visible { display: flex; opacity: 1; transform: translateX(0); visibility: visible; }

.mega-col-head {
    font-size: 0.75rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #007e5e; 
    padding: 14px 16px 8px;
    border-bottom: 1px solid #eee;
    margin-bottom: 5px;
    position: sticky;
    top: 0;
    background: #fff;
    z-index: 10;
}

.mega-cat-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 16px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #444;
    transition: all 0.2s ease;
    border-left: 4px solid transparent;
    text-decoration: none;
}
.mega-cat-link i { font-size: 0.7rem; color: #007e5e; }
.mega-cat-link:hover, .mega-cat-link.is-active {
    color: #007e5e !important;
    background: #f0f7f4 !important; 
    border-left-color: #007e5e;
}

.mega-sub-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 16px;
    font-size: 0.82rem;
    font-weight: 600;
    color: #333;
    text-decoration: none;
}
.mega-sub-link:hover, .mega-sub-link.is-active { 
    color: #007e5e !important; 
    background: #f0f7f4 !important; 
}

.mega-child-link {
    display: block;
    padding: 6px 16px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #555;
    text-decoration: none;
}
.mega-child-link:hover { background: #f9f9f9; color: #007e5e; padding-left: 25px; }

/* ─── HAMBURGER ─────────────────────────────────────────── */
.hamburger {
    background: none;
    border: none;
    width: 32px; height: 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    cursor: pointer;
    padding: 0;
}
.hamburger span {
    display: block;
    width: 100%; height: 3px;
    background: #007e5e;
    border-radius: 3px;
    transition: var(--transition-fast);
}
.hamburger.open span:nth-child(1) { transform: translateY(10px) rotate(45deg); }
.hamburger.open span:nth-child(2) { opacity: 0; }
.hamburger.open span:nth-child(3) { transform: translateY(-10px) rotate(-45deg); }

/* ─── MOBILE DRAWER ─────────────────────────────────────── */
.mobile-overlay {
    position: fixed; inset: 0;
    background: rgba(0,0,0,0.6);
    z-index: 1040;
    opacity: 0; visibility: hidden;
    transition: var(--transition);
}
.mobile-overlay.active { opacity: 1; visibility: visible; }

.mobile-drawer {
    position: fixed;
    top: 0; right: 0;
    width: 300px;
    height: 100%;
    background: #fff;
    z-index: 1045;
    transform: translateX(100%);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    flex-direction: column;
}
.mobile-drawer.open { transform: translateX(0); }

.mobile-drawer-inner { flex: 1; overflow-y: auto; }
.mobile-menu-list { 
    list-style: none !important; 
    margin: 0; padding: 0; 
}
.mobile-menu-list li {
    list-style: none !important;
}
.mobile-menu-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 24px;
    font-size: 1rem;
    font-weight: 700;
    color: #222 !important;
    border-bottom: 1px solid #f0f0f0;
    text-decoration: none !important;
    font-family: 'Outfit', sans-serif;
}
.mobile-menu-link.active { color: #007e5e !important; }

.mobile-accordion-body { background: #f9f9f9; }
.mobile-sub-link {
    display: block;
    padding: 12px 35px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #444 !important;
    border-bottom: 1px solid #eee;
    text-decoration: none !important;
    font-family: 'Outfit', sans-serif;
}
.mobile-sub-link:hover { color: #007e5e !important; background: #f0f7f4; }

.mobile-drawer-footer { padding: 25px 24px; border-top: 1px solid #eee; }

/* Mobile Quote Button */
.mobile-drawer-footer .btn-quote {
    background: #007e5e;
    color: #fff !important;
    padding: 15px 20px;
    font-size: 1rem;
    font-weight: 700;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none !important;
    font-family: 'Outfit', sans-serif;
    border: none;
    box-shadow: 0 4px 15px rgba(0,126,94,0.2);
}

.mobile-about-summary {
    background: #f3faf6;
    border-radius: 16px;
    padding: 16px;
    margin-top: 10px;
    display: flex;
    gap: 12px;
    align-items: center;
}
.mobile-about-summary img {
    width: 54px;
    height: 54px;
    object-fit: cover;
    border-radius: 14px;
    flex-shrink: 0;
}
.mobile-about-summary p {
    margin: 0;
    font-size: 0.9rem;
    color: #2f3b45;
    line-height: 1.4;
}

/* ─── ALLIANCES MEGA ────────────────────────────────────── */
.alliances-mega {
    /* Styles inherited from .mega-menu */
}
.alliances-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 20px;
    max-height: 320px;
    overflow-y: auto;
    padding: 10px;
    margin: 0;
}
.mega-brand-box {
    background: #fff;
    border: 1px solid rgba(0,0,0,0.08);
    border-radius: 18px;
    min-height: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 14px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    text-decoration: none;
}
.mega-brand-box img {
    max-height: 50px;
    max-width: 100%;
    object-fit: contain;
    filter: grayscale(1);
    opacity: 0.75;
    transition: filter 0.3s ease, opacity 0.3s ease;
}
.mega-brand-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(0,126,94,0.14);
    border-color: #007e5e;
}
.mega-brand-box:hover img {
    filter: grayscale(0);
    opacity: 1;
}
.mega-brand-text {
    font-weight: 800;
    color: #0f172a;
    font-size: 0.95rem;
    text-align: center;
}
.alliances-description {
    margin: 0;
    color: #475569;
    font-size: 0.92rem;
    max-width: 560px;
}
.alliances-view-all {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 999px;
    border: 1px solid #007e5e;
    color: #007e5e;
    background: #f8fff8;
    transition: background 0.25s ease, transform 0.25s ease;
}
.alliances-view-all:hover {
    background: #007e5e;
    color: #fff;
    transform: translateY(-1px);
}
@media (max-width: 1200px) {
    .header-search-form { width: 230px; }
    .nav-link-item { padding: 12px 14px; font-size: 0.88rem; }
    .btn-quote-premium { padding: 10px 18px; font-size: 0.88rem; }
    .nav-menu { gap: 0.35rem; }
}

@media (max-width: 992px) {
    .nav-inner {
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.75rem;
    }
    .header-search-form { width: 250px; order: 1; }
    .nav-menu-wrapper { order: 2; width: 100%; justify-content: center; }
    .btn-quote-premium { order: 3; }
    .hamburger { order: 4; }
}

@media (max-width: 768px) {
    .topbar-left, .topbar-right { justify-content: center; text-align: center; }
    .topbar-marquee-wrap { order: 3; width: 100%; padding: 10px 0; }
    .nav-inner { padding: 0.7rem 0; gap: 0.5rem; }
    .nav-menu-wrapper { display: none; }
    .header-search-form { width: 200px; }
    .btn-quote-premium { padding: 8px 16px; font-size: 0.85rem; }
    .hamburger { display: flex; }
}

@media (max-width: 576px) {
    .nav-inner { justify-content: space-between; flex-wrap: nowrap; }
    .header-search-form { display: none; }
    .btn-quote-premium { display: none; }
    .hamburger { display: flex; }
}

@media (max-width: 992px) {
    .about-dropdown-panel { min-height: auto; }
}

/* ─── NAV LINK ICONS ──────────────────────────────────── */
.nav-link-icon {
    font-size: 1.1rem;
    color: #007e5e;
    transition: all 0.25s ease;
}
.nav-link-item:hover .nav-link-icon {
    color: #007e5e;
}

/* ─── SOLUTIONS DROPDOWN ──────────────────────────────── */
.solutions-dropdown {
    min-width: 280px;
    left: auto;
    right: 0;
}
.solutions-dropdown-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.solutions-dropdown .nav-dropdown-link {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 16px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1px solid rgba(0,0,0,0.06);
    background: #fff;
}
.solutions-dropdown .nav-dropdown-link:hover {
    background: #f0f7f4;
    color: #007e5e;
    border-color: rgba(0, 126, 94, 0.12);
    transform: translateX(4px);
}

/* ─── SERVICES DROPDOWN ──────────────────────────────── */
.services-dropdown {
    min-width: 280px;
    left: auto;
    right: 0;
}
.services-dropdown-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.services-dropdown .nav-dropdown-link {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 16px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1px solid rgba(0,0,0,0.06);
    background: #fff;
}
.services-dropdown .nav-dropdown-link:hover {
    background: #f0f7f4;
    color: #007e5e;
    border-color: rgba(0, 126, 94, 0.12);
    transform: translateX(4px);
}

/* ─── SOLUTIONS MEGA ENHANCED ────────────────────────────── */
/* Solutions mega specific overrides if needed */
.solutions-mega .mega-grid-2-cols {
    margin-top: 10px;
}
.solutions-left-inner { text-align: center; width: 100%; }
.solutions-featured-img { width: 100%; height: 130px; margin-bottom: 15px; overflow: hidden; border-radius: 12px; }
.solutions-featured-img img { width: 100%; height: 100%; object-fit: cover; }

.solutions-mega-mid {
    flex-grow: 1;
    background: #fff;
    display: flex !important;
    flex-direction: column;
    padding: 35px 30px;
}
.solutions-mid-head {
    font-size: 0.82rem;
    font-weight: 800;
    color: #007e5e;
    letter-spacing: 0.05em;
    padding-bottom: 12px;
    border-bottom: 1px solid #f1f5f9;
    margin-bottom: 16px;
}
.solutions-list-wrap {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    padding: 0;
    margin-top: auto;
    margin-bottom: auto;
}
.sol-name-text {
    font-size: 0.95rem;
    font-weight: 700;
    color: #1e293b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.sol-item-link {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 18px;
    text-decoration: none !important;
    transition: all 0.25s ease;
    border-radius: 16px;
    border: 1px solid rgba(0,0,0,0.06);
    background: #fff;
    box-shadow: 0 8px 18px rgba(15, 23, 42, 0.04);
}
.sol-item-link:hover {
    background: #f0f7f4;
    border-color: rgba(0, 126, 94, 0.2);
    transform: translateY(-2px);
}
.sol-icon-box-mini {
    width: 34px;
    height: 34px;
    background: linear-gradient(135deg, #007e5e, #005a47);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-size: 0.9rem;
    flex-shrink: 0;
    box-shadow: 0 4px 10px rgba(0, 126, 94, 0.15);
}

.solutions-mega-right {
    width: 240px;
    background: #fff;
    border-right: none;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.video-card-premium {
    width: 100%;
    height: 160px;
    cursor: pointer;
}
.video-card-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
}
.video-card-premium:hover .video-card-overlay {
    background: rgba(0,0,0,0.3);
}
.play-trigger {
    width: 54px;
    height: 54px;
    background: #fff;
    color: #007e5e;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}
.video-card-premium:hover .play-trigger {
    transform: scale(1.15);
}

@media (max-width: 1200px) {
    .solutions-mega { width: 900px; }
    .solutions-mega-left { width: 260px; }
}
@media (max-width: 992px) {
    .solutions-mega { width: calc(100vw - 40px); }
    .solutions-mega-right { display: none !important; }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Sticky scroll class ─────────────────────────────────
    const mainNav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        mainNav.classList.toggle('scrolled', window.scrollY > 40);
    });

    // ── NAVIGATION: Click to open dropdowns/mega (Strictly Click) ──
    const navItems = document.querySelectorAll('.nav-item.has-dropdown, .nav-item.has-mega');
    
    navItems.forEach(item => {
        const link = item.querySelector('.nav-link-item');
        if (!link) return;

        link.addEventListener('click', function(e) {
            const hasMenu = item.querySelector('.nav-dropdown') || item.querySelector('.mega-menu');
            
            if (hasMenu) {
                // Prevent navigation only if a menu exists
                e.preventDefault();
                e.stopPropagation();

                const isOpen = item.classList.contains('is-open');

                // Close all other open menus
                navItems.forEach(otherItem => {
                    if (otherItem !== item) otherItem.classList.remove('is-open');
                });

                // Toggle this one
                item.classList.toggle('is-open');
            }
        });
    });

    // Close all menus when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.nav-item')) {
            navItems.forEach(item => item.classList.remove('is-open'));
        }
    });

    // ── MEGA MENU: AJAX Loading ──────────────────────────────
    const megaMenu     = document.getElementById('megaMenu');
    const catList      = document.getElementById('catList');
    const megaSubsList = document.getElementById('megaSubsList');
    const megaSubsContainer = document.getElementById('megaSubsContainer');
    const megaChildContent = document.getElementById('megaChildContent');
    const subHead      = document.getElementById('megaSubHead');
    const childHead     = document.getElementById('megaChildHead');
    const featuredTrigger = document.querySelector('.mega-featured-trigger');

    function resetCol2() {
        megaSubsList.innerHTML = '<li class="p-4 text-center"><i class="fas fa-spinner fa-spin text-primary"></i></li>';
        document.getElementById('megaSubsCol').classList.remove('is-visible');
        resetCol3();
    }

    function resetCol3() {
        childHead.textContent = 'Child Categories';
        megaChildContent.innerHTML = '<span class="mega-empty">Select an item to view details</span>';
        document.getElementById('megaChildCol').classList.remove('is-visible');
    }

    if (catList) {
        catList.addEventListener('click', function(e) {
            const link = e.target.closest('.mega-cat-link');
            if (!link) return;

            e.preventDefault();
            e.stopPropagation();

            const catId = link.dataset.id;
            const catName = link.dataset.name;

            // Highlight active in col 1
            document.querySelectorAll('.mega-cat-link').forEach(l => l.classList.remove('is-active'));
            link.classList.add('is-active');

            // Setup col 2
            subHead.textContent = catName.toUpperCase();
            resetCol2();
            document.getElementById('megaSubsCol').classList.add('is-visible');

            // Fetch Subcategories
            fetch(`${baseUrl}/apisubcategories/${catId}`)
                .then(res => res.json())
                .then(data => {
                    megaSubsList.innerHTML = '';
                    if (data.length > 0) {
                        // View All link
                        const viewAll = document.createElement('a');
                        viewAll.href = link.href;
                        viewAll.className = 'view-all-sub-link';
                        viewAll.textContent = 'View All ' + catName;
                        megaSubsList.appendChild(viewAll);

                        data.forEach(sub => {
                            const hasChildren = sub.child_categories_count > 0;
                            const li = document.createElement('li');
                            li.className = 'mega-sub-item';
                            li.innerHTML = `
                                <a href="${baseUrl}/subcategory/${sub.slug}" class="mega-sub-link" 
                                   data-id="${sub.id}" 
                                   data-name="${sub.name}"
                                   data-has-children="${hasChildren}">
                                    <span>${sub.name}</span>
                                    ${hasChildren ? '<i class="fas fa-chevron-right"></i>' : ''}
                                </a>
                            `;
                            megaSubsList.appendChild(li);
                        });
                    } else {
                        megaSubsList.innerHTML = '<li><span class="mega-empty">No subcategories found</span></li>';
                    }
                });
        });
    }

    if (featuredTrigger) {
        featuredTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            document.querySelectorAll('.mega-cat-link').forEach(l => l.classList.remove('is-active'));
            this.classList.add('is-active');

            subHead.textContent = 'FEATURED PRODUCTS';
            resetCol2();
            document.getElementById('megaSubsCol').classList.add('is-visible');

            fetch(`${baseUrl}/apifeatured-products`)
                .then(res => res.json())
                .then(data => {
                    megaSubsList.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(prod => {
                            const li = document.createElement('li');
                            li.className = 'mega-sub-item';
                            li.innerHTML = `
                                <a href="${baseUrl}/product/${prod.slug}" class="mega-sub-link">
                                    <span>${prod.name}</span>
                                </a>
                            `;
                            megaSubsList.appendChild(li);
                        });
                    } else {
                        megaSubsList.innerHTML = '<li><span class="mega-empty">No featured products found</span></li>';
                    }
                });
        });
    }

    if (megaSubsList) {
        megaSubsList.addEventListener('click', function(e) {
            const link = e.target.closest('.mega-sub-link');
            if (!link || !link.dataset.id) return; // Ignore featured product links or view all

            // If it doesn't have children, let the link open normally
            if (link.dataset.hasChildren === 'false') {
                return;
            }

            e.preventDefault();
            e.stopPropagation();

            const subId = link.dataset.id;
            const subName = link.dataset.name;

            // Highlight active in col 2
            megaSubsList.querySelectorAll('.mega-sub-link').forEach(l => l.classList.remove('is-active'));
            link.classList.add('is-active');

            // Setup col 3
            childHead.textContent = subName.toUpperCase();
            megaChildContent.innerHTML = '<div class="p-3 text-center"><i class="fas fa-spinner fa-spin text-primary"></i></div>';
            document.getElementById('megaChildCol').classList.add('is-visible');

            // Fetch Child Categories
            fetch(`${baseUrl}/apichildcategories/${subId}`)
                .then(res => res.json())
                .then(data => {
                    megaChildContent.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(child => {
                            const a = document.createElement('a');
                            a.href = `${baseUrl}/child-category/${child.slug}`;
                            a.className = 'mega-child-link';
                            a.textContent = child.name;
                            megaChildContent.appendChild(a);
                        });
                    } else {
                        megaChildContent.innerHTML = '<span class="mega-empty">No child categories found</span>';
                    }
                });
        });
    }


    // Reset all mega menu states when closing
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.nav-item')) {
            navItems.forEach(item => {
                item.classList.remove('is-open');
                if (item.classList.contains('has-mega')) {
                    document.getElementById('megaSubsCol').classList.remove('is-visible');
                    document.getElementById('megaChildCol').classList.remove('is-visible');
                    document.querySelectorAll('.mega-cat-link').forEach(l => l.classList.remove('is-active'));
                }
            });
        }
    });


    // ── MOBILE DRAWER ───────────────────────────────────────
    const mobileToggle      = document.getElementById('mobileToggle');
    const mobileDrawer      = document.getElementById('mobileDrawer');
    const mobileOverlay     = document.getElementById('mobileOverlay');
    const mobileDrawerClose = document.getElementById('mobileDrawerClose');

    function openDrawer() {
        mobileDrawer.classList.add('open');
        mobileOverlay.classList.add('active');
        mobileToggle.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeDrawer() {
        mobileDrawer.classList.remove('open');
        mobileOverlay.classList.remove('active');
        mobileToggle.classList.remove('open');
        document.body.style.overflow = '';
    }

    mobileToggle.addEventListener('click', openDrawer);
    if(mobileDrawerClose) mobileDrawerClose.addEventListener('click', closeDrawer);
    mobileOverlay.addEventListener('click', closeDrawer);

    // ── MOBILE ACCORDION ───────────────────────────────────
    document.querySelectorAll('[data-target]').forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            if (e.target.tagName === 'A' && !e.target.classList.contains('mobile-accordion-toggle')) return;
            e.preventDefault();
            const targetId = this.dataset.target;
            const body = document.getElementById(targetId);
            if (!body) return;
            const isOpen = body.style.display === 'block';
            body.style.display = isOpen ? 'none' : 'block';
            const arrow = this.querySelector('.mobile-arrow, .mobile-arrow-sm');
            if (arrow) arrow.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
        });
    });
});
</script>
