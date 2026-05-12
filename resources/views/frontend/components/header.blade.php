@php
    $headerCategories = \App\Models\Category::where('status', 1)->get();
    $headerBrands     = \App\Models\Brand::where('status', 1)->get();
    $headerSettings   = \App\Models\Setting::first();
@endphp

<header id="site-header">
    {{-- Top Bar --}}
    <div class="header-topbar d-none d-lg-block">
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center py-2">
                {{-- Left: Contact --}}
                <div class="topbar-left d-flex align-items-center gap-4">
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

                {{-- Right: Social --}}
                <div class="topbar-right d-flex align-items-center gap-3">
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
                <a href="{{ route('home') }}" class="nav-logo" aria-label="Siddharsh Home">
                    @if($headerSettings && $headerSettings->logo)
                        <img src="{{ asset('uploads/settings/'.$headerSettings->logo) }}" alt="{{ $headerSettings->site_title ?? 'Siddharsh' }}" style="height:54px;width:auto;object-fit:contain;">
                    @else
                        <span class="logo-text">SIDDHARSH<span class="logo-dot">.</span></span>
                    @endif
                </a>

                {{-- Desktop Menu --}}
                <div class="nav-menu-wrapper d-none d-lg-flex">
                    <ul class="nav-menu" id="desktopMenu">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link-item">Home</a>
                        </li>
                        <li class="nav-item has-dropdown">
                            <a href="https://siddharsh.com/about-us/" class="nav-link-item">
                                About us <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <div class="nav-dropdown about-dropdown">
                                <div class="dropdown-col">
                                    <a href="https://siddharsh.com/about-us/#who-we-are" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-users"></i></span>
                                        <span>Who We Are</span>
                                    </a>
                                    <a href="https://siddharsh.com/about-us/#mission-and-vision" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-eye"></i></span>
                                        <span>Mission and Vision</span>
                                    </a>
                                    <a href="https://siddharsh.com/about-us/#why-choose-us" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-handshake"></i></span>
                                        <span>Why Choose us</span>
                                    </a>
                                    <a href="https://siddharsh.com/about-us/#investor-relations" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-chart-line"></i></span>
                                        <span>Investor Relations</span>
                                    </a>
                                    <a href="https://siddharsh.com/about-us/#bicsi-member" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-certificate"></i></span>
                                        <span>BICSI Member</span>
                                    </a>
                                </div>
                                <div class="dropdown-col">
                                    <a href="https://siddharsh.com/about-us/#siddharsh-promise" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-lightbulb"></i></span>
                                        <span>Siddharsh Promise</span>
                                    </a>
                                    <a href="https://siddharsh.com/about-us/#our-team" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-people-group"></i></span>
                                        <span>Our Team</span>
                                    </a>
                                    <a href="https://siddharsh.com/about-us/#siddharsh-advantage" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-trophy"></i></span>
                                        <span>Siddharsh Advantage</span>
                                    </a>
                                    <a href="https://siddharsh.com/about-us/#career" class="nav-dropdown-link">
                                        <span class="nav-dropdown-icon"><i class="fas fa-briefcase"></i></span>
                                        <span>Career</span>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item has-mega" id="megaParent">
                            <a href="{{ route('categories') }}" class="nav-link-item {{ request()->routeIs('categories') ? 'active' : '' }}">
                                Products & Solutions <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>

                            <div class="mega-menu" id="megaMenu">
                                <div class="mega-inner">
                                    {{-- Level 1: Categories & Featured --}}
                                    <div class="mega-col mega-col-cats">
                                        <div class="mega-col-head">ALL PRODUCTS</div>
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
                            <a href="{{ route('brands') }}" class="nav-link-item {{ request()->routeIs('brands') ? 'active' : '' }}">
                                Alliances <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <div class="mega-menu alliances-mega">
                                <div class="mega-inner p-4 p-lg-5">
                                    <div class="w-100">
                                        <div class="mega-col-head mb-4 border-0 ps-0">OUR STRATEGIC ALLIANCES</div>
                                        <div class="alliances-grid">
                                            @foreach($headerBrands->take(10) as $brand)
                                            <a href="{{ route('brand.details', $brand->slug) }}" class="mega-brand-box" title="{{ $brand->name }}">
                                                @if($brand->image)
                                                    <img src="{{ asset('uploads/brands/'.$brand->image) }}" alt="{{ $brand->name }}">
                                                @else
                                                    <span class="mega-brand-text">{{ $brand->name }}</span>
                                                @endif
                                            </a>
                                            @endforeach
                                        </div>
                                        <div class="text-center mt-5 pt-3 border-top">
                                            <a href="{{ route('brands') }}" class="fw-700 text-primary text-decoration-none">View All Partner Brands <i class="fas fa-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item has-dropdown">
                            <a href="https://siddharsh.com/services/" class="nav-link-item">
                                Services <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <ul class="nav-dropdown">
                                <li><a href="https://siddharsh.com/services/#saas" class="nav-dropdown-link">Saas</a></li>
                                <li><a href="https://siddharsh.com/services/#it-consulting-services" class="nav-dropdown-link">IT Consulting Services</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link-item">Contact us</a>
                        </li>

                    </ul>

                    {{-- Right Actions --}}
                    <div class="nav-actions ms-4">
                        <a href="{{ route('search') }}" class="btn btn-quote-premium">
                            Get a quote now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

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
                <li><a href="{{ route('home') }}" class="mobile-menu-link">Home</a></li>
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
                    </div>
                </li>

                <li class="mobile-has-children">
                    <div class="mobile-menu-link mobile-accordion-toggle" data-target="mobileCats">
                        <span>Products & Solutions</span>
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

                <li><a href="{{ route('brands') }}" class="mobile-menu-link">Alliances</a></li>
                
                <li class="mobile-has-children">
                    <div class="mobile-menu-link mobile-accordion-toggle" data-target="mobileServices">
                        <span>Services</span>
                        <i class="fas fa-chevron-down mobile-arrow"></i>
                    </div>
                    <div class="mobile-accordion-body" id="mobileServices" style="display:none;">
                        <a href="https://siddharsh.com/services/#saas" class="mobile-sub-link">Saas</a>
                        <a href="https://siddharsh.com/services/#it-consulting-services" class="mobile-sub-link">IT Consulting Services</a>
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
    height: 90px;
}

/* Logo */
.nav-logo { display: flex; align-items: center; flex-shrink: 0; }
.logo-text {
    font-family: 'Outfit', sans-serif;
    font-size: 1.6rem;
    font-weight: 900;
    color: var(--dark);
    letter-spacing: -0.03em;
}
.logo-dot { color: var(--primary); }

/* Desktop Menu */
.nav-menu-wrapper { display: flex; align-items: center; flex: 1; justify-content: flex-end; }
.nav-menu {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 2px;
    margin: 0; padding: 0;
}
.nav-item { position: relative; }

.nav-link-item {
    font-family: 'Outfit', sans-serif;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 30px 12px;
    font-size: 0.92rem;
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
    bottom: 25px;
    left: 12px;
    right: 12px;
    height: 3px;
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
    font-size: 0.6rem;
    transition: transform 0.25s ease;
}
.nav-item:hover .nav-arrow { transform: rotate(180deg); }

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
.nav-dropdown.about-dropdown {
    display: grid;
    grid-template-columns: repeat(2, minmax(220px, 1fr));
    gap: 20px;
    min-width: 520px;
    padding: 24px;
}
.dropdown-col {
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.nav-dropdown-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    font-size: 0.92rem;
    font-weight: 700;
    color: #1f2937;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1px solid transparent;
}
.nav-dropdown-link:hover {
    background: #f0f7f4;
    color: #007e5e;
    border-color: rgba(0, 126, 94, 0.1);
    transform: translateX(4px);
}
.nav-dropdown-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #007e5e 0%, #009d7a 100%);
    border-radius: 10px;
    color: #fff;
    font-size: 1.1rem;
    flex-shrink: 0;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 126, 94, 0.25);
}
.nav-dropdown-link:hover .nav-dropdown-icon {
    background: linear-gradient(135deg, #005a46 0%, #007e5e 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 126, 94, 0.35);
}
.nav-dropdown-link span:last-child {
    flex: 1;
}
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
    padding: 12px 24px;
    font-size: 0.9rem;
    font-weight: 700;
    border-radius: 6px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    border: none;
    text-decoration: none;
}
.btn-quote-premium:hover {
    background: #007e5e;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,126,94,0.2);
}

/* ─── MEGA MENU ─────────────────────────────────────────── */
.has-mega { position: static !important; }

.mega-menu {
    position: absolute;
    top: 100%;
    width: auto;
    min-width: 350px;
    max-width: 95vw;
    left: 0; 
    background: #fff;
    box-shadow: 0 20px 60px rgba(0,0,0,0.12);
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    z-index: 1000;
    border: 1px solid var(--border-light);
    border-top: 4px solid #007e5e;
    pointer-events: none;
    border-radius: 0 0 15px 15px;
    overflow: hidden;
}
.has-mega.is-open .mega-menu { 
    opacity: 1; 
    visibility: visible; 
    transform: translateY(0); 
    pointer-events: auto;
}

.mega-inner {
    display: flex;
    background: #fff;
    height: auto;
    max-height: 500px;
    overflow: hidden;
}

/* About Mega specific */
.about-mega {
    width: 1100px;
    left: 50% !important;
    transform: translate(-50%, 20px) !important;
}
.has-mega.is-open .about-mega {
    transform: translate(-50%, 0) !important;
}

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
    padding: 18px 20px 20px;
}
.mega-featured-trigger {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 14px 20px;
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
    height: 500px;
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
    padding: 18px 20px 10px;
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
    padding: 12px 20px;
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
    padding: 10px 20px;
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
    padding: 8px 20px;
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

/* ─── ALLIANCES MEGA ────────────────────────────────────── */
.alliances-mega {
    width: 1000px;
    left: 50% !important;
    transform: translate(-50%, 20px) !important;
    border-radius: 20px !important;
    border: none !important;
    box-shadow: 0 30px 100px rgba(0,0,0,0.15) !important;
}
.has-mega.is-open .alliances-mega {
    transform: translate(-50%, 0) !important;
}
.alliances-grid { 
    display: grid; 
    grid-template-columns: repeat(5, 1fr); 
    gap: 20px; 
}
.mega-brand-box {
    background: #fff;
    border: 1px solid #f0f0f0;
    border-radius: 12px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px;
    transition: all 0.3s ease;
    text-decoration: none;
}
.mega-brand-box img {
    max-height: 50px;
    max-width: 100%;
    object-fit: contain;
    filter: grayscale(1);
    opacity: 0.7;
    transition: all 0.3s ease;
}
.mega-brand-box:hover { 
    transform: translateY(-5px); 
    box-shadow: 0 15px 35px rgba(0,126,94,0.1); 
    border-color: #007e5e;
}
.mega-brand-box:hover img {
    filter: grayscale(0);
    opacity: 1;
}
.mega-brand-text {
    font-weight: 700;
    color: #444;
    font-size: 0.9rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Sticky scroll class ─────────────────────────────────
    const mainNav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        mainNav.classList.toggle('scrolled', window.scrollY > 40);
    });

    // ── NAVIGATION: Click to open dropdowns/mega ──────────────
    const navItems = document.querySelectorAll('.nav-item.has-dropdown, .nav-item.has-mega');
    
    navItems.forEach(item => {
        const link = item.querySelector('.nav-link-item');
        if (!link) return;

        link.addEventListener('click', function(e) {
            // Only prevent default if there's actually a menu to show
            const hasMenu = item.querySelector('.nav-dropdown') || item.querySelector('.mega-menu');
            
            if (hasMenu) {
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
