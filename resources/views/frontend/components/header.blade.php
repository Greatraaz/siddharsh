@php
    $headerCategories = \App\Models\Category::with(['subcategories.childCategories'])->where('status', 1)->get();
    $headerBrands     = \App\Models\Brand::where('status', 1)->get();
    $headerSettings   = \App\Models\Setting::first();
@endphp

<header id="site-header">
    {{-- Top Bar --}}
    <div class="header-topbar d-none d-lg-block">
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center py-2">
                {{-- Left: Contact Stack --}}
                <div class="topbar-left">
                    <div class="d-flex flex-column gap-1">
                        @if($headerSettings->phone)
                        <a href="tel:{{ $headerSettings->phone }}" class="topbar-link">
                            <i class="fas fa-phone-alt"></i> Call us on {{ $headerSettings->phone }}
                        </a>
                        @endif
                        @if($headerSettings->email)
                        <a href="mailto:{{ $headerSettings->email }}" class="topbar-link">
                            <i class="fas fa-envelope"></i> Email: {{ $headerSettings->email }}
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Center: Marquee --}}
                <div class="topbar-marquee flex-grow-1 mx-5">
                    <marquee behavior="scroll" direction="left" scrollamount="5">
                        Siddharsh: Authorized Panduit Distributor for Future-Ready Network Infrastructure Solutions India
                    </marquee>
                </div>

                {{-- Right: Social Stack --}}
                <div class="topbar-right text-end">
                    <div class="d-flex flex-column align-items-end gap-1">
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
                            <a href="{{ route('home') }}" class="nav-link-item {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item has-dropdown">
                            <a href="#" class="nav-link-item">
                                About us <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Company Profile</a></li>
                                <li><a href="#">Our Vision & Mission</a></li>
                                <li><a href="#">Our Team</a></li>
                            </ul>
                        </li>
                        <li class="nav-item has-mega" id="megaParent">
                            <a href="{{ route('categories') }}" class="nav-link-item {{ request()->routeIs('categories') ? 'active' : '' }}">
                                Products & Solutions <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>

                            <div class="mega-menu" id="megaMenu">
                                <div class="mega-inner">
                                    {{-- Level 1: Categories --}}
                                    <div class="mega-col mega-col-cats">
                                        <div class="mega-col-head">Categories</div>
                                        <ul class="mega-cat-list" id="catList">
                                            @foreach($headerCategories as $i => $cat)
                                            <li class="mega-cat-item" data-cat-id="{{ $cat->id }}">
                                                <a href="{{ route('category.products', $cat->slug) }}" class="mega-cat-link">
                                                    <span>{{ $cat->name }}</span>
                                                    @if($cat->subcategories->count())
                                                        <i class="fas fa-chevron-right"></i>
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    {{-- Level 2: Sub Categories --}}
                                    <div class="mega-col mega-col-subs" id="megaSubsCol">
                                        <div class="mega-col-head mega-sub-head" id="megaSubHead">Sub Categories</div>
                                        <div id="megaSubsContent">
                                            @foreach($headerCategories as $cat)
                                            <ul class="mega-sub-list" id="subs-{{ $cat->id }}" style="display:none;">
                                                @foreach($cat->subcategories as $sub)
                                                <li class="mega-sub-item" data-sub-id="{{ $sub->id }}">
                                                    <a href="{{ route('subcategory.products', $sub->slug) }}" class="mega-sub-link">
                                                        <span>{{ $sub->name }}</span>
                                                        @if($sub->childCategories->count())
                                                            <i class="fas fa-chevron-right"></i>
                                                        @endif
                                                    </a>
                                                </li>
                                                @endforeach
                                                @if($cat->subcategories->count() == 0)
                                                <li><span class="mega-empty">No sub categories</span></li>
                                                @endif
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Level 3: Child Categories --}}
                                    <div class="mega-col mega-col-children" id="megaChildCol">
                                        <div class="mega-col-head mega-child-head" id="megaChildHead">Child Categories</div>
                                        <div id="megaChildContent">
                                            @foreach($headerCategories as $cat)
                                                @foreach($cat->subcategories as $sub)
                                                <div class="mega-child-group" id="children-{{ $sub->id }}" style="display:none;">
                                                    @foreach($sub->childCategories as $child)
                                                    <a href="{{ route('childcategory.products', $child->slug) }}" class="mega-child-link">
                                                        <i class="fas fa-circle-dot"></i> {{ $child->name }}
                                                    </a>
                                                    @endforeach
                                                    @if($sub->childCategories->count() == 0)
                                                    <span class="mega-empty">No child categories</span>
                                                    @endif
                                                </div>
                                                @endforeach
                                            @endforeach
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
                                <div class="container-fluid px-5 py-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="mega-title-simple">Our Technology Partners</h4>
                                        <a href="{{ route('brands') }}" class="btn-view-all-brands">View All Brands <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                    <div class="alliances-grid">
                                        @foreach($headerBrands as $b)
                                        <a href="{{ route('brand.details', $b->slug) }}" class="mega-brand-box">
                                            @if($b->image)
                                                <img src="{{ asset('uploads/brands/'.$b->image) }}" alt="{{ $b->name }}">
                                            @else
                                                <span class="mega-brand-text">{{ $b->name }}</span>
                                            @endif
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item has-dropdown">
                            <a href="#" class="nav-link-item">
                                Services <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Consulting</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('part.list') }}" class="nav-link-item {{ request()->routeIs('part.list') ? 'active' : '' }}">Part List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact-section" class="nav-link-item">Contact us</a>
                        </li>
                    </ul>

                    {{-- Right Actions --}}
                    <div class="nav-actions ms-4">
                        <a href="{{ route('search') }}" class="btn btn-quote">
                            Get a quote<i class="fas fa-arrow-right ms-2"></i>
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
                <li><a href="{{ route('home') }}" class="mobile-menu-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                
                <li class="mobile-has-children">
                    <div class="mobile-menu-link mobile-accordion-toggle" data-target="mobileAbout">
                        <span>About us</span>
                        <i class="fas fa-chevron-down mobile-arrow"></i>
                    </div>
                    <div class="mobile-accordion-body" id="mobileAbout" style="display:none;">
                        <a href="#" class="mobile-sub-link">Company Profile</a>
                        <a href="#" class="mobile-sub-link">Our Vision & Mission</a>
                        <a href="#" class="mobile-sub-link">Our Team</a>
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
                <li><a href="#" class="mobile-menu-link">Services</a></li>
                <li><a href="{{ route('part.list') }}" class="mobile-menu-link {{ request()->routeIs('part.list') ? 'active' : '' }}">Part List</a></li>
                <li><a href="#contact-section" class="mobile-menu-link">Contact us</a></li>
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
    background: linear-gradient(90deg, #038a6b 0%, #026d54 100%);
    color: #fff;
    font-size: 0.82rem;
}
.topbar-link {
    color: #fff !important;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition-fast);
}
.topbar-link:hover { opacity: 0.8; }
.topbar-link i { font-size: 0.85rem; }

.topbar-marquee marquee {
    font-weight: 600;
    font-size: 0.88rem;
    padding-top: 5px;
}

.topbar-label {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    opacity: 0.9;
}

.topbar-social {
    color: #fff;
    font-size: 0.95rem;
    transition: var(--transition-fast);
}
.topbar-social:hover { transform: translateY(-2px); opacity: 0.8; }

/* ─── MAIN NAV ──────────────────────────────────────────── */
.header-nav {
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
    height: 84px;
}

/* Logo */
.nav-logo { display: flex; align-items: center; flex-shrink: 0; }
.logo-text {
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
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 12px 18px;
    font-size: 0.88rem;
    font-weight: 700;
    color: #333 !important;
    letter-spacing: 0.01em;
    transition: var(--transition-fast);
    white-space: nowrap;
}
.nav-link-item:hover,
.nav-item:hover > .nav-link-item,
.nav-link-item.active {
    color: var(--primary) !important;
}
.nav-arrow {
    font-size: 0.55rem;
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
.nav-item:hover .nav-dropdown { opacity: 1; visibility: visible; transform: translateY(0); }
.nav-dropdown li a {
    display: block;
    padding: 10px 20px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #555;
    transition: var(--transition-fast);
}
.nav-dropdown li a:hover { color: var(--primary); background: var(--primary-soft); }

/* Quote Button */
.btn-quote {
    background: var(--primary-dark);
    color: #fff !important;
    padding: 12px 24px;
    font-size: 0.88rem;
    font-weight: 700;
    border-radius: 6px;
    box-shadow: 0 4px 15px rgba(2,109,84,0.3);
}
.btn-quote:hover {
    background: var(--primary);
    box-shadow: 0 8px 25px rgba(2,109,84,0.4);
    transform: translateY(-2px);
}

/* ─── MEGA MENU ─────────────────────────────────────────── */
.has-mega { position: static !important; }

.mega-menu {
    position: absolute;
    top: 100%;
    left: 0; right: 0;
    background: #fff;
    box-shadow: 0 20px 60px rgba(0,0,0,0.12);
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s;
    z-index: 1000;
    border-top: 1px solid var(--border-light);
}
.has-mega:hover .mega-menu { opacity: 1; visibility: visible; transform: translateY(0); }

.mega-inner {
    display: grid;
    grid-template-columns: 240px 260px 1fr;
    min-height: 400px;
}

.mega-col { padding: 0; }
.mega-col-cats  { background: #f9f9f9; border-right: 1px solid var(--border-light); }
.mega-col-subs  { background: #fff; border-right: 1px solid var(--border-light); }
.mega-col-children { background: #fcfcfc; }

.mega-col-head {
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #999;
    padding: 20px 24px 12px;
}

/* Category list */
.mega-cat-list { list-style: none; margin: 0; padding: 0; }
.mega-cat-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 24px;
    font-size: 0.88rem;
    font-weight: 700;
    color: #444;
    transition: var(--transition-fast);
}
.mega-cat-link i { font-size: 0.6rem; color: #ccc; }
.mega-cat-link:hover,
.mega-cat-link.is-active {
    color: var(--primary);
    background: #fff;
}

/* Sub list */
.mega-sub-list { list-style: none; margin: 0; padding: 0; }
.mega-sub-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 24px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #555;
    transition: var(--transition-fast);
}
.mega-sub-link i { font-size: 0.55rem; color: #ccc; }
.mega-sub-link:hover { color: var(--primary); padding-left: 30px; }

/* Child links */
.mega-child-group { padding: 10px 24px; display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.mega-child-link {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 6px 0;
    font-size: 0.82rem;
    font-weight: 500;
    color: #666;
    transition: var(--transition-fast);
}
.mega-child-link i { font-size: 0.4rem; color: var(--primary); }
.mega-child-link:hover { color: var(--primary); }

.mega-empty { font-size: 0.8rem; color: #bbb; padding: 12px 24px; display: block; font-style: italic; }

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
    background: var(--dark);
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
.mobile-menu-list { list-style: none; margin: 0; padding: 0; }
.mobile-menu-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 24px;
    font-size: 0.95rem;
    font-weight: 700;
    color: #333;
    border-bottom: 1px solid #f0f0f0;
}
.mobile-menu-link.active { color: var(--primary); }

.mobile-accordion-body { background: #f8f8f8; }
.mobile-sub-link {
    display: block;
    padding: 12px 35px;
    font-size: 0.88rem;
    font-weight: 600;
    color: #555;
    border-bottom: 1px solid #eee;
}

.mobile-drawer-footer { padding: 20px 24px; border-top: 1px solid #eee; }
/* ─── ALLIANCES MEGA ────────────────────────────────────── */
.alliances-mega {
    border-bottom: 5px solid var(--primary);
}
.mega-title-simple {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--dark);
    margin: 0;
}
.btn-view-all-brands {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--primary);
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    background: var(--primary-soft);
    border-radius: 50px;
    transition: var(--transition-fast);
}
.btn-view-all-brands:hover {
    background: var(--primary);
    color: #fff !important;
}

.alliances-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 20px;
}
.mega-brand-box {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border: 1.5px solid var(--border-light);
    border-radius: 12px;
    padding: 15px;
    height: 80px;
    transition: var(--transition);
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
}
.mega-brand-box:hover {
    border-color: var(--primary);
    box-shadow: 0 8px 25px rgba(3,138,107,0.12);
    transform: translateY(-4px);
}
.mega-brand-box img {
    max-height: 44px;
    max-width: 130px;
    object-fit: contain;
    filter: grayscale(1);
    opacity: 0.5;
    transition: var(--transition);
}
.mega-brand-box:hover img {
    filter: grayscale(0);
    opacity: 1;
}
.mega-brand-text {
    font-weight: 700;
    font-size: 0.85rem;
    color: var(--text-muted);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Sticky scroll class ─────────────────────────────────
    const mainNav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        mainNav.classList.toggle('scrolled', window.scrollY > 40);
    });

    // ── MEGA MENU: Category hover → show subs ──────────────
    const catItems = document.querySelectorAll('.mega-cat-item');
    const subHead  = document.getElementById('megaSubHead');
    const childHead = document.getElementById('megaChildHead');

    catItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            const catId = item.dataset.catId;

            // Highlight active cat
            document.querySelectorAll('.mega-cat-link').forEach(l => l.classList.remove('is-active'));
            item.querySelector('.mega-cat-link').classList.add('is-active');

            // Show sub list
            document.querySelectorAll('.mega-sub-list').forEach(l => l.style.display = 'none');
            const subList = document.getElementById('subs-' + catId);
            if (subList) { subList.style.display = 'block'; }

            // Reset child col
            document.querySelectorAll('.mega-child-group').forEach(g => g.style.display = 'none');
            if (childHead) childHead.textContent = 'Child Categories';
        });
    });

    // ── MEGA MENU: Sub hover → show children ───────────────
    document.body.addEventListener('mouseenter', (e) => {
        const item = e.target.closest('.mega-sub-item');
        if (!item) return;
        
        const subId = item.dataset.subId;
        document.querySelectorAll('.mega-child-group').forEach(g => g.style.display = 'none');
        const childGroup = document.getElementById('children-' + subId);
        if (childGroup) { childGroup.style.display = 'grid'; }
        const subName = item.querySelector('.mega-sub-link span')?.textContent || 'Child Categories';
        if (childHead) childHead.textContent = subName;
    }, true);

    // Activate first category by default on mega open
    const megaParent = document.getElementById('megaParent');
    if (megaParent) {
        megaParent.addEventListener('mouseenter', () => {
            const firstCat = document.querySelector('.mega-cat-item');
            if (firstCat) firstCat.dispatchEvent(new Event('mouseenter'));
        });
    }

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
