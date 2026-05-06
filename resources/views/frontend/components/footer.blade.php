@php
    $footerSettings   = \App\Models\Setting::first();
    $footerCategories = \App\Models\Category::where('status', 1)->take(6)->get();
@endphp

<footer id="site-footer">
    {{-- Main Footer --}}
    <div class="footer-main">
        <div class="container">
            <div class="row gy-5">
                {{-- Column 1: Brand & Info --}}
                <div class="col-lg-3 col-md-6">
                    <div class="footer-brand-col">
                        <div class="footer-logo mb-4">
                            @if($footerSettings && $footerSettings->logo)
                                <img src="{{ asset('uploads/settings/'.$footerSettings->logo) }}" alt="Logo" style="height:54px;filter:brightness(0) invert(1);">
                            @else
                                <span class="footer-logo-text">SIDDHARSH<span>.</span></span>
                            @endif
                        </div>
                        <p class="footer-desc">
                            We're an enterprise technology distributor that is passionate about adding value to every step of the distribution lifecycle.
                        </p>
                        <div class="footer-socials mb-4">
                            @if($footerSettings->facebook) <a href="{{ $footerSettings->facebook }}" class="f-social-link"><i class="fab fa-facebook-f"></i></a> @endif
                            @if($footerSettings->youtube) <a href="{{ $footerSettings->youtube }}" class="f-social-link"><i class="fab fa-youtube"></i></a> @endif
                            @if($footerSettings->linkedin) <a href="{{ $footerSettings->linkedin }}" class="f-social-link"><i class="fab fa-linkedin-in"></i></a> @endif
                            @if($footerSettings->instagram) <a href="{{ $footerSettings->instagram }}" class="f-social-link"><i class="fab fa-instagram"></i></a> @endif
                        </div>
                        <div class="footer-hours">
                            <p class="h-label">Open Hours:</p>
                            <p class="h-text">Mon – Sat: 9 am – 8 pm,</p>
                            <p class="h-text">Sunday: CLOSED</p>
                        </div>
                    </div>
                </div>

                {{-- Column 2: Newsletter & Contact --}}
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-col-title">Newsletter</h6>
                    <p class="footer-sub-desc">Subscribe our newsletter to get our latest update & news.</p>
                    <form class="footer-nl-box mb-4">
                        <input type="email" placeholder="Your mail address" class="nl-input">
                        <button type="submit" class="nl-btn"><i class="fas fa-paper-plane"></i></button>
                    </form>

                    <div class="footer-contact-block mb-3">
                        <div class="c-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="c-info">
                            <span>For Contact Call</span>
                            <strong>{{ $footerSettings->phone ?? '+91-8826263495' }}</strong>
                        </div>
                    </div>
                    <div class="footer-contact-block">
                        <div class="c-icon"><i class="fas fa-envelope"></i></div>
                        <div class="c-info">
                            <span>Send us Email</span>
                            <strong>{{ $footerSettings->email ?? 'info@siddharsh.com' }}</strong>
                        </div>
                    </div>
                </div>

                {{-- Column 3: Official Info --}}
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-col-title">Official info</h6>
                    <div class="address-block mb-4">
                        <div class="a-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="a-info">
                            <strong>Regd. off</strong>
                            <p>1504, Tower-27, Lotus Panache, Sector 110, Noida – 201304</p>
                        </div>
                    </div>
                    <div class="address-block">
                        <div class="a-icon"><i class="fas fa-building"></i></div>
                        <div class="a-info">
                            <strong>Corp office</strong>
                            <p>15th Floor, Esquare Building, Sector 96, Noida -201 304, Uttar Pradesh</p>
                        </div>
                    </div>
                </div>

                {{-- Column 4: Menu --}}
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-col-title">Menu</h6>
                    <ul class="footer-menu-list mb-4">
                        <li><a href="{{ route('home') }}"><i class="fas fa-link"></i> Home</a></li>
                        <li><a href="#"><i class="fas fa-link"></i> About us</a></li>
                        <li><a href="#"><i class="fas fa-link"></i> Services</a></li>
                        <li><a href="#"><i class="fas fa-link"></i> Blog</a></li>
                        <li><a href="#contact-section"><i class="fas fa-link"></i> Contact us</a></li>
                    </ul>
                    
                    <div class="footer-badge">
                        {{-- Bicsi Logo placeholder --}}
                        <div class="bicsi-logo">
                            <span class="bicsi-text">Bicsi</span>
                            <span class="bicsi-sub">CORPORATE MEMBER</span>
                        </div>
                        <p class="bicsi-member-text">BICSI India Corporate Member – 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="footer-bottom">
        <div class="container text-center">
            <p class="m-0">© {{ date('Y') }} Siddharsh. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
#site-footer {
    background-color: #0c1a14;
    background-image: linear-gradient(rgba(12, 26, 20, 0.95), rgba(12, 26, 20, 0.95)), url('https://images.unsplash.com/photo-1558494949-ef010cbdcc4b?auto=format&fit=crop&q=80&w=1200');
    background-size: cover;
    background-position: center;
    color: #fff;
    padding: 80px 0 0;
}

.footer-main { padding-bottom: 60px; }

.footer-logo-text { font-size: 1.8rem; font-weight: 900; }
.footer-logo-text span { color: var(--primary); }

.footer-desc {
    color: rgba(255,255,255,0.7);
    font-size: 0.9rem;
    line-height: 1.8;
    margin-top: 15px;
}

.footer-socials { display: flex; gap: 15px; }
.f-social-link {
    color: var(--primary);
    font-size: 1.1rem;
    transition: 0.3s;
}
.f-social-link:hover { color: #fff; transform: translateY(-3px); }

.h-label { font-weight: 700; color: #fff; margin-bottom: 5px; }
.h-text { color: rgba(255,255,255,0.7); margin: 0; font-size: 0.88rem; }

.footer-col-title {
    font-size: 1.4rem;
    font-weight: 800;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 10px;
}
.footer-col-title::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0;
    width: 40px; height: 2px;
    background: var(--primary);
}

.footer-sub-desc { color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 20px; }

.footer-nl-box {
    display: flex;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
}
.nl-input {
    flex: 1;
    border: none;
    padding: 12px 15px;
    font-size: 0.85rem;
    outline: none;
    color: #333;
}
.nl-btn {
    background: var(--primary);
    color: #fff;
    border: none;
    padding: 0 18px;
    font-size: 1rem;
    cursor: pointer;
}

.footer-contact-block {
    display: flex;
    align-items: center;
    gap: 15px;
}
.c-icon {
    width: 44px; height: 44px;
    background: var(--primary);
    border-radius: 4px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}
.c-info span { display: block; font-size: 0.75rem; color: rgba(255,255,255,0.6); }
.c-info strong { display: block; font-size: 1rem; }

.address-block {
    display: flex;
    gap: 15px;
}
.a-icon {
    width: 44px; height: 44px;
    background: var(--primary);
    border-radius: 4px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
    opacity: 0.8;
}
.a-info strong { display: block; font-size: 0.9rem; color: var(--primary); margin-bottom: 5px; }
.a-info p { font-size: 0.85rem; color: rgba(255,255,255,0.7); margin: 0; line-height: 1.6; }

.footer-menu-list { list-style: none; padding: 0; margin: 0; }
.footer-menu-list li { margin-bottom: 12px; }
.footer-menu-list li a {
    color: rgba(255,255,255,0.8);
    font-size: 0.95rem;
    font-weight: 600;
    display: flex; align-items: center; gap: 10px;
    transition: 0.3s;
}
.footer-menu-list li a i { font-size: 0.8rem; opacity: 0.6; }
.footer-menu-list li a:hover { color: var(--primary); padding-left: 8px; }

.footer-badge { margin-top: 30px; }
.bicsi-logo {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    border: 2px solid #fff;
    padding: 8px 15px;
    margin-bottom: 10px;
}
.bicsi-text { font-size: 1.8rem; font-weight: 800; font-style: italic; line-height: 1; }
.bicsi-sub { font-size: 0.55rem; font-weight: 700; letter-spacing: 0.1em; }
.bicsi-member-text { font-size: 0.8rem; color: rgba(255,255,255,0.7); margin: 0; }

.footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.05);
    padding: 25px 0;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.5);
}
</style>
