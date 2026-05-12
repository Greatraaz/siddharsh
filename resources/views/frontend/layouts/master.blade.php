<!DOCTYPE html>
<html lang="en">
<head>
    @php $settings = \App\Models\Setting::first(); @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', $settings->meta_description ?? 'Siddharsh — Enterprise IT Infrastructure & Networking Solutions.')">
    <meta name="keywords" content="@yield('meta_keywords', $settings->meta_keywords ?? 'it infrastructure, networking, siddharsh')">
    <meta name="robots" content="index, follow">
    <title>@yield('title', ($settings->site_title ?? 'Siddharsh') . ' — Enterprise IT Infrastructure')</title>
    
    <script>
        window.baseUrl = "{{ url('/') }}";
    </script>

    @if($settings && $settings->favicon)
        <link rel="icon" type="image/png" href="{{ asset('uploads/settings/'.$settings->favicon) }}">
    @endif

    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
            font-family: 'Outfit', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-white);
            overflow-x: hidden;
            line-height: 1.6;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            color: var(--text-main);
            line-height: 1.25;
            font-weight: 800;
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
            font-size: clamp(1.6rem, 3.5vw, 2.4rem);
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.02em;
            margin-bottom: 0;
        }

        /* ============================================
           BUTTONS
        ============================================ */
        .btn {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
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
            justify-content: center; /* Center breadcrumbs */
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
            background: linear-gradient(rgba(12, 26, 20, 0.7), rgba(12, 26, 20, 0.7)), 
                        url('{{ asset('banner_11zon.webp') }}') !important;
            background-size: cover !important;
            background-position: center !important;
            background-attachment: fixed;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 350px;
        }
        .page-banner::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(3,138,107,0.2) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }
        .page-banner::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(3,138,107,0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }
        .page-banner .container { position: relative; z-index: 2; }
        .page-banner .breadcrumb-item a { color: rgba(255,255,255,0.6); }
        .page-banner .breadcrumb-item a:hover { color: var(--primary-light); }
        .page-banner .breadcrumb-item.active { color: var(--primary-light); }
        .page-banner .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.3); }
        .page-banner h1 { 
            color: #fff; 
            margin: 15px 0;
            font-size: clamp(2.2rem, 5vw, 3.2rem); 
            font-weight: 800;
        }
        .page-banner .page-banner-sub { 
            color: rgba(255,255,255,0.7); 
            font-size: 1.1rem; 
            max-width: 700px;
            margin: 0 auto;
        }
        .page-banner .section-label { 
            display: inline-flex; 
            margin: 0 auto 20px;
            background: rgba(3, 138, 107, 0.25);
            border: 1px solid rgba(3, 138, 107, 0.3);
            color: #7fffd4;
        }

        /* ============================================
           PAGINATION
        ============================================ */
        .pagination .page-link {
            font-family: 'Outfit', sans-serif;
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
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 12px 16px;
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

        /* ─── PREMIUM CARD DESIGN (GREEN BOX) ────────── */
        .brand-premium-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0,0,0,0.08); /* More visible shadow */
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .brand-premium-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(3,138,107,0.18); /* Stronger hover shadow */
        }
        .brand-card-top {
            height: 160px; /* Reduced default height */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #fff;
            position: relative;
        }
        .brand-card-main-img {
            max-width: 90%; /* Increased from 80% */
            max-height: 90%; /* Increased from 80% */
            object-fit: contain;
            transition: transform 0.5s ease;
        }
        .brand-premium-card:hover .brand-card-main-img {
            transform: scale(1.08);
        }
        .brand-card-placeholder-img {
            width: 100px;
            height: 100px;
            background: #f8fafb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }
        .brand-card-bottom-box {
            background: linear-gradient(135deg, #007e5e 0%, #006b50 100%);
            padding: 24px 20px;
            text-align: center;
            margin-top: auto;
            border-radius: 18px;
            margin: 0 12px 12px;
            transition: all 0.4s ease;
            height: 70px; /* Reduced fixed height */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0,126,94,0.15);
        }
        .brand-premium-card:hover .brand-card-bottom-box {
            background: #026d54;
        }
        .brand-card-heading {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0;
            letter-spacing: -0.01em;
            line-height: 1.3;
            color: #fff;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .brand-card-desc {
            font-size: 0.78rem;
            line-height: 1.5;
            margin-bottom: 20px;
            opacity: 0.85;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Limit to 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.35rem; /* Consistent height for 2 lines */
        }
        .brand-card-btn {
            display: inline-block;
            background: rgba(255,255,255,0.1);
            color: #fff !important;
            padding: 8px 24px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }
        .brand-card-btn:hover {
            background: #fff;
            color: #038a6b !important;
            transform: scale(1.05);
        }

        /* ─── BRAND CARD SMALL VARIANT ────────── */
        .brand-card-small .brand-card-top {
            height: 130px;
            padding: 15px;
        }
        .brand-card-small .brand-card-bottom-box {
            padding: 12px 10px;
            margin: 0 10px 10px;
        }
        .brand-card-small .brand-card-heading {
            font-size: 0.95rem;
            margin-bottom: 5px;
        }
        .brand-card-small .brand-card-btn {
            padding: 6px 16px;
            font-size: 0.72rem;
        }

        @media (max-width: 768px) {
            .section-py  { padding-top: 60px; padding-bottom: 60px; }
            .section-py-sm { padding-top: 40px; padding-bottom: 40px; }
        }

        /* ─── CATEGORY CARD ENHANCEMENTS ────────── */
        .category-card-premium {
            box-shadow: 0 15px 35px rgba(0,0,0,0.06) !important;
            background: #fff !important;
        }
        .category-card-top {
            padding: 20px !important; 
            height: 150px !important;
            background: #fdfdfd; /* Subtle off-white */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border-bottom: 1px solid #f5f5f5;
        }
        .category-card-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; /* Match image behavior */
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .category-card-premium:hover .category-card-img {
            transform: scale(1.1);
        }
        .brand-card-desc {
            font-size: 0.82rem;
            line-height: 1.5;
            margin-bottom: 0;
            color: rgba(255,255,255,0.75);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: auto;
        }

        /* ============================================
           PRELOADER
        ============================================ */
        #preloader {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: #fff;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #preloader.loaded {
            opacity: 0;
            visibility: hidden;
        }
        .loader-inner {
            text-align: center;
        }
        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--primary-soft);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }
        .loader-logo {
            max-height: 60px;
            width: auto;
            animation: pulse 1.5s ease-in-out infinite;
            margin: 0 auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes pulse {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader-inner">
            @if($settings && $settings->logo)
                <img src="{{ asset('uploads/settings/'.$settings->logo) }}" alt="Logo" class="loader-logo">
            @else
                <div class="loader-spinner"></div>
            @endif

        </div>
    </div>

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

        // ── Preloader ──────────────────────────────────────────────
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.classList.add('loaded');
                setTimeout(() => preloader.style.display = 'none', 500);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
