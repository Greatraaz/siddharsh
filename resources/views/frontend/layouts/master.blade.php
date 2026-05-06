<!DOCTYPE html>
<html lang="en">
<head>
    @php $settings = \App\Models\Setting::first(); @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Siddharsh — Enterprise IT Infrastructure & Networking Solutions. Explore our complete catalog of brands, categories and products.')">
    <meta name="robots" content="index, follow">
    <title>@yield('title', ($settings->site_title ?? 'Siddharsh') . ' — Enterprise IT Infrastructure')</title>

    @if($settings && $settings->favicon)
        <link rel="icon" type="image/png" href="{{ asset('uploads/settings/'.$settings->favicon) }}">
    @endif

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        /* ============================================
           DESIGN SYSTEM — ROOT TOKENS
        ============================================ */
        :root {
            --primary:        #038a6b;
            --primary-dark:   #026d54;
            --primary-light:  #04b589;
            --primary-soft:   rgba(3, 138, 107, 0.08);
            --primary-mid:    rgba(3, 138, 107, 0.15);
            --primary-glow:   rgba(3, 138, 107, 0.25);

            --dark:           #0c1a14;
            --dark-2:         #111f18;
            --dark-3:         #1a2e24;

            --text-main:      #1e293b;
            --text-muted:     #64748b;
            --text-light:     #94a3b8;

            --bg-white:       #ffffff;
            --bg-light:       #f8fafb;
            --bg-light-2:     #f0f5f3;

            --border:         #e2e8f0;
            --border-light:   #f1f5f9;

            --radius-sm:      8px;
            --radius:         12px;
            --radius-lg:      20px;
            --radius-xl:      28px;

            --shadow-sm:      0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            --shadow:         0 4px 16px rgba(0,0,0,0.08);
            --shadow-md:      0 8px 30px rgba(0,0,0,0.10);
            --shadow-lg:      0 20px 50px rgba(0,0,0,0.12);
            --shadow-xl:      0 40px 80px rgba(0,0,0,0.15);
            --shadow-primary: 0 8px 30px rgba(3,138,107,0.25);

            --transition-fast: all 0.2s ease;
            --transition:      all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            --transition-slow: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);

            --header-height: 80px;
        }

        /* ============================================
           BASE RESET & TYPOGRAPHY
        ============================================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-white);
            overflow-x: hidden;
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            color: var(--text-main);
            line-height: 1.2;
        }

        a { text-decoration: none; transition: var(--transition-fast); }
        img { max-width: 100%; display: block; }

        /* ============================================
           UTILITY CLASSES
        ============================================ */
        .text-primary   { color: var(--primary) !important; }
        .bg-primary     { background-color: var(--primary) !important; }
        .bg-dark-brand  { background-color: var(--dark) !important; }
        .bg-soft        { background-color: var(--primary-soft) !important; }
        .bg-light-brand { background-color: var(--bg-light) !important; }

        .fw-500 { font-weight: 500 !important; }
        .fw-600 { font-weight: 600 !important; }
        .fw-700 { font-weight: 700 !important; }
        .fw-800 { font-weight: 800 !important; }
        .fw-900 { font-weight: 900 !important; }

        .fs-xs   { font-size: 0.7rem !important; }
        .fs-sm   { font-size: 0.8rem !important; }
        .fs-base { font-size: 0.95rem !important; }

        .ls-wide  { letter-spacing: 0.12em; }
        .ls-wider { letter-spacing: 0.2em; }
        .ls-tight { letter-spacing: -0.02em; }

        .lh-tight { line-height: 1.1; }

        .section-py  { padding-top: 90px; padding-bottom: 90px; }
        .section-py-sm { padding-top: 60px; padding-bottom: 60px; }

        .border-radius    { border-radius: var(--radius) !important; }
        .border-radius-sm { border-radius: var(--radius-sm) !important; }
        .border-radius-lg { border-radius: var(--radius-lg) !important; }

        /* ============================================
           SECTION LABELS
        ============================================ */
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-soft);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 16px;
        }
        .section-label::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--primary);
            flex-shrink: 0;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.02em;
            margin-bottom: 0;
        }

        /* ============================================
           BUTTONS
        ============================================ */
        .btn {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            border: 2px solid transparent;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff !important;
            padding: 12px 28px;
        }
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            box-shadow: var(--shadow-primary);
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            background: transparent;
            border-color: var(--primary);
            color: var(--primary) !important;
            padding: 12px 28px;
        }
        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: #fff !important;
            box-shadow: var(--shadow-primary);
            transform: translateY(-2px);
        }

        .btn-dark-brand {
            background-color: var(--dark);
            border-color: var(--dark);
            color: #fff !important;
            padding: 12px 28px;
        }
        .btn-dark-brand:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            box-shadow: var(--shadow-primary);
            transform: translateY(-2px);
        }

        .btn-sm-pill {
            padding: 7px 18px;
            font-size: 0.78rem;
            border-radius: 50px;
        }

        .btn-inquiry {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: #fff !important;
            border: none;
            padding: 10px 22px;
            font-size: 0.82rem;
            font-weight: 600;
            border-radius: var(--radius-sm);
            box-shadow: 0 4px 15px rgba(3,138,107,0.3);
        }
        .btn-inquiry:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(3,138,107,0.4);
        }

        /* ============================================
           PREMIUM CARDS
        ============================================ */
        .glass-card {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--border-light);
            border-radius: var(--radius);
            transition: var(--transition);
            overflow: hidden;
        }
        .glass-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-md);
            transform: translateY(-6px);
        }

        /* ============================================
           BREADCRUMB
        ============================================ */
        .breadcrumb {
            font-size: 0.78rem;
            font-weight: 500;
            margin-bottom: 0;
        }
        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            color: var(--text-light);
        }
        .breadcrumb-item a { color: var(--text-muted); }
        .breadcrumb-item a:hover { color: var(--primary); }
        .breadcrumb-item.active { color: var(--primary); font-weight: 600; }

        /* ============================================
           PAGE HEADER BANNER
        ============================================ */
        .page-banner {
            background: linear-gradient(135deg, var(--dark) 0%, var(--dark-3) 60%, #0a2b1e 100%);
            padding: 56px 0;
            position: relative;
            overflow: hidden;
        }
        .page-banner::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(3,138,107,0.15) 0%, transparent 70%);
            pointer-events: none;
        }
        .page-banner::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(3,138,107,0.08) 0%, transparent 70%);
            pointer-events: none;
        }
        .page-banner .breadcrumb-item a { color: rgba(255,255,255,0.6); }
        .page-banner .breadcrumb-item a:hover { color: var(--primary-light); }
        .page-banner .breadcrumb-item.active { color: var(--primary-light); }
        .page-banner .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.3); }
        .page-banner h1 { color: #fff; }
        .page-banner .page-banner-sub { color: rgba(255,255,255,0.6); font-size: 0.95rem; }

        /* ============================================
           PAGINATION
        ============================================ */
        .pagination .page-link {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-muted);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm) !important;
            padding: 10px 16px;
            margin: 0 3px;
            transition: var(--transition-fast);
        }
        .pagination .page-link:hover {
            background-color: var(--primary-soft);
            color: var(--primary);
            border-color: var(--primary);
        }
        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
            box-shadow: var(--shadow-primary);
        }

        /* ============================================
           SCROLL REVEAL ANIMATION
        ============================================ */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        /* ============================================
           CUSTOM SCROLLBAR
        ============================================ */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-light); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary-dark); }

        /* ============================================
           BADGE / TAG STYLES
        ============================================ */
        .tag-pill {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.05em;
        }
        .tag-primary { background: var(--primary-soft); color: var(--primary); }
        .tag-dark    { background: var(--dark); color: #fff; }
        .tag-light   { background: var(--bg-light-2); color: var(--text-muted); border: 1px solid var(--border); }

        /* ============================================
           FORM STYLES
        ============================================ */
        .form-control, .form-select {
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 11px 16px;
            color: var(--text-main);
            background: var(--bg-white);
            transition: var(--transition-fast);
        }
        .form-control:focus, .form-select:focus {
            outline: none;
            box-shadow: 0 0 0 3px var(--primary-glow);
            border-color: var(--primary);
        }
        .form-control::placeholder { color: var(--text-light); }

        /* ============================================
           SEARCH OVERLAY
        ============================================ */
        #searchOverlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(12,26,20,0.96);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }
        #searchOverlay.active {
            opacity: 1;
            visibility: visible;
        }
        #searchOverlay .search-form-inner {
            width: 100%;
            max-width: 680px;
            padding: 0 24px;
        }
        #searchOverlay input {
            background: transparent;
            border: none;
            border-bottom: 2px solid rgba(255,255,255,0.3);
            border-radius: 0;
            color: #fff;
            font-size: 1.6rem;
            font-weight: 600;
            padding: 16px 0;
            width: 100%;
        }
        #searchOverlay input:focus {
            outline: none;
            border-bottom-color: var(--primary);
            box-shadow: none;
        }
        #searchOverlay input::placeholder { color: rgba(255,255,255,0.3); }
        #searchOverlayClose {
            position: absolute;
            top: 28px; right: 28px;
            background: none;
            border: none;
            color: rgba(255,255,255,0.6);
            font-size: 1.8rem;
            cursor: pointer;
            transition: var(--transition-fast);
            padding: 8px;
        }
        #searchOverlayClose:hover { color: var(--primary-light); transform: rotate(90deg); }

        /* ============================================
           EMPTY STATE
        ============================================ */
        .empty-state-box {
            text-align: center;
            padding: 80px 30px;
        }
        .empty-state-box .icon-wrap {
            width: 100px;
            height: 100px;
            background: var(--primary-soft);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        .empty-state-box .icon-wrap i {
            font-size: 2.2rem;
            color: var(--primary);
        }

        /* ============================================
           HOVER IMAGE ZOOM
        ============================================ */
        .img-zoom-wrap { overflow: hidden; }
        .img-zoom-wrap img { transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1); }
        .img-zoom-wrap:hover img { transform: scale(1.06); }

        /* ============================================
           DIVIDER
        ============================================ */
        .divider-line {
            width: 48px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            border-radius: 2px;
            margin-bottom: 16px;
        }

        /* Back to top */
        #backToTop {
            position: fixed;
            bottom: 28px;
            right: 28px;
            width: 44px;
            height: 44px;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 1rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-primary);
        }
        #backToTop.visible { opacity: 1; visibility: visible; }
        #backToTop:hover { background: var(--primary-dark); transform: translateY(-3px); }

        @media (max-width: 768px) {
            .section-py  { padding-top: 60px; padding-bottom: 60px; }
            .section-py-sm { padding-top: 40px; padding-bottom: 40px; }
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Search Overlay -->
    <div id="searchOverlay" role="dialog" aria-label="Search">
        <button id="searchOverlayClose" aria-label="Close search"><i class="fas fa-times"></i></button>
        <div class="search-form-inner">
            <p class="text-white fs-sm fw-600 ls-wider mb-3" style="color:rgba(255,255,255,0.5);">SEARCH PRODUCTS</p>
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="query" id="searchInput" placeholder="Type to search products..." autocomplete="off">
                <button type="submit" style="display:none;"></button>
            </form>
            <p class="mt-4 fs-xs" style="color:rgba(255,255,255,0.3);">Press ESC to close</p>
        </div>
    </div>

    @include('frontend.components.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('frontend.components.footer')

    <!-- Back to Top -->
    <button id="backToTop" aria-label="Back to top"><i class="fas fa-chevron-up"></i></button>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // ── Scroll Reveal ──────────────────────────────────────────
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('revealed');
                    revealObserver.unobserve(e.target);
                }
            });
        }, { threshold: 0.08 });
        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

        // ── Back to Top ───────────────────────────────────────────
        const btn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            btn.classList.toggle('visible', window.scrollY > 400);
        });
        btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // ── Search Overlay ─────────────────────────────────────────
        const overlay  = document.getElementById('searchOverlay');
        const closeBtn = document.getElementById('searchOverlayClose');
        const srchIn   = document.getElementById('searchInput');

        document.querySelectorAll('[data-toggle-search]').forEach(el => {
            el.addEventListener('click', (e) => {
                e.preventDefault();
                overlay.classList.add('active');
                setTimeout(() => srchIn.focus(), 200);
            });
        });
        closeBtn.addEventListener('click', () => overlay.classList.remove('active'));
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') overlay.classList.remove('active');
        });
    </script>

    @stack('scripts')
</body>
</html>
