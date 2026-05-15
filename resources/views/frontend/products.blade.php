@extends('frontend.layouts.master')

@section('title',
    (isset($pageTitle) ? $pageTitle :
    (isset($category) ? $category->name :
    (isset($subcategory) ? $subcategory->name :
    (isset($childCategory) ? $childCategory->name :
    (isset($brand) ? $brand->name :
    (isset($query) ? 'Search: '.$query : 'All Products'))))))
    . ' — ' . ($settings->site_title ?? 'Siddharsh')
)

@section('content')

{{-- ── Page Banner ─────────────────────────────────────── --}}
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @if(isset($category))
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                    <li class="breadcrumb-item active fw-700">{{ $category->name }}</li>
                @elseif(isset($subcategory))
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.products', $subcategory->category->slug) }}">{{ $subcategory->category->name }}</a></li>
                    <li class="breadcrumb-item active fw-700">{{ $subcategory->name }}</li>
                @elseif(isset($childCategory))
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.products', $childCategory->subcategory->category->slug) }}">{{ $childCategory->subcategory->category->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('subcategory.products', $childCategory->subcategory->slug) }}">{{ $childCategory->subcategory->name }}</a></li>
                    <li class="breadcrumb-item active fw-700">{{ $childCategory->name }}</li>
                @elseif(isset($brand))
                    <li class="breadcrumb-item"><a href="{{ route('brands') }}">Brands</a></li>
                    <li class="breadcrumb-item active fw-700">{{ $brand->name }}</li>
                @elseif(isset($pageTitle))
                    <li class="breadcrumb-item active fw-700">{{ $pageTitle }}</li>
                @else
                    <li class="breadcrumb-item active fw-700">{{ isset($query) ? 'Search Results' : 'All Products' }}</li>
                @endif
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">
                @if(isset($category))      {{ $category->name }}
                @elseif(isset($subcategory)) {{ $subcategory->name }}
                @elseif(isset($childCategory)) {{ $childCategory->name }}
                @elseif(isset($brand))     {{ $brand->name }}
                @elseif(isset($pageTitle)) {{ $pageTitle }}
                @elseif(isset($query))     Search Results
                @else All Products
                @endif
            </h1>
            <p class="page-banner-sub mt-2">{{ $products->total() }} {{ Str::plural('Product', $products->total()) }} found</p>
        </div>
    </div>
</section>

{{-- ── Main Content ────────────────────────────────────── --}}
<section class="section-py bg-light-brand">
    <div class="container">
        <div class="row g-4">

            {{-- ── Sidebar ───────────────────────────────────── --}}
            <div class="col-lg-3">
                <aside class="prod-sidebar" style="position:sticky;top:100px;">

                    {{-- Part Number Lookup --}}
                    <div class="sidebar-widget p-4 shadow-sm bg-white" style="border-radius: 16px; border: 1px solid var(--border-light);">
                        <h3 class="sidebar-widget-title" style="border-bottom:none; margin-bottom: 8px;">Part Lookup</h3>
                        <p class="fs-xs text-muted mb-3">Lookup by Model or SKU</p>
                        <form action="{{ route('search') }}" method="GET">
                            <input type="hidden" name="solution" value="{{ request('solution') }}">
                            <div class="sidebar-search">
                                <i class="fas fa-barcode sidebar-search-icon"></i>
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="sidebar-search-input" placeholder="Part No...">
                                <button type="submit" class="sidebar-search-btn bg-primary text-white"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    {{-- Categories Filter --}}
                    <div class="sidebar-widget mt-4 p-4 shadow-sm bg-white" style="border-radius: 16px; border: 1px solid var(--border-light);">
                        <h3 class="sidebar-widget-title">Categories</h3>
                        <div class="accordion accordion-flush" id="catAccordion">
                            @foreach($categories as $cat)
                            <div class="sidebar-acc-item">
                                <button class="sidebar-acc-btn {{ (isset($category) && $category->id == $cat->id) || (isset($subcategory) && $subcategory->category_id == $cat->id) ? 'active' : '' }}"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#catCollapse{{ $cat->id }}">
                                    <span>{{ $cat->name }}</span>
                                    <i class="fas fa-chevron-down sidebar-acc-arrow"></i>
                                </button>
                                <div id="catCollapse{{ $cat->id }}" class="collapse {{ (isset($category) && $category->id == $cat->id) || (isset($subcategory) && $subcategory->category_id == $cat->id) ? 'show' : '' }}">
                                    <div class="sidebar-acc-body">
                                        <a href="{{ route('category.products', $cat->slug) }}" class="sidebar-cat-all">View All {{ $cat->name }}</a>
                                        @foreach($cat->subcategories as $sub)
                                        <a href="{{ route('subcategory.products', $sub->slug) }}" class="sidebar-sub-link {{ isset($subcategory) && $subcategory->id == $sub->id ? 'active' : '' }}">
                                            {{ $sub->name }}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Real Solutions Filter --}}
                    @if(isset($solutions) && $solutions->count() > 0)
                    <div class="sidebar-widget mt-4 p-4 shadow-sm bg-white" style="border-radius: 16px; border: 1px solid var(--border-light);">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="sidebar-widget-title mb-0" style="border-bottom:none; padding-bottom:0;">Solutions</h3>
                            @if(request('solution'))
                                <a href="{{ request()->fullUrlWithQuery(['solution' => null]) }}" class="text-danger fs-xs fw-bold" style="text-decoration:none;">Clear</a>
                            @endif
                        </div>
                        <div class="sidebar-solutions-list d-flex flex-column gap-1">
                            @foreach($solutions as $sol)
                            <a href="{{ request()->fullUrlWithQuery(['solution' => $sol->slug]) }}" 
                               class="sidebar-sol-link {{ request('solution') == $sol->slug ? 'active' : '' }}">
                                <i class="fas fa-check-circle me-2 {{ request('solution') == $sol->slug ? 'text-primary' : 'text-light' }}" style="font-size: 0.7rem;"></i>
                                {{ $sol->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Brands Filter --}}
                    <div class="sidebar-widget mt-4 p-4 shadow-sm bg-white" style="border-radius: 16px; border: 1px solid var(--border-light);">
                        <h3 class="sidebar-widget-title">Brands</h3>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            @foreach($brands as $br)
                            <a href="{{ route('brand.products', $br->slug) }}" class="badge {{ isset($brand) && $brand->id == $br->id ? 'bg-primary' : 'bg-light text-muted' }} py-2 px-3 fw-600 border-0" style="font-size: 0.65rem; text-decoration: none;">
                                {{ $br->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            {{-- ── Products Area ─────────────────────────────── --}}
            <div class="col-lg-9">

                {{-- Toolbar --}}
                <div class="prod-toolbar mb-4 d-flex align-items-center justify-content-between p-3 bg-white shadow-sm" style="border-radius: 12px; border: 1px solid var(--border-light); flex-wrap: wrap; gap: 15px;">
                    <div class="prod-count fw-700 text-muted" style="font-size: 0.85rem;">
                        Showing <span class="text-primary">{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</span> of <span class="text-primary">{{ $products->total() }}</span> results
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="prod-sort d-flex align-items-center gap-2">
                            <span class="fs-xs fw-700 text-muted text-uppercase ls-wide">Sort:</span>
                            <select class="form-select form-select-sm border-0 bg-light fw-600" style="width: 140px;">
                                <option value="newest">Newest First</option>
                                <option value="name">Name A-Z</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="row g-4">
                    @forelse($products as $i => $product)
                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch reveal reveal-delay-{{ min(($i % 3) + 1, 3) }}">
                        @include('frontend.components.product-card', ['product' => $product])
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state-box py-5">
                            <div class="icon-wrap"><i class="fas fa-search"></i></div>
                            <h3 class="fw-700 mb-2">No Products Found</h3>
                            <p class="text-muted mb-4">Try adjusting your filters or search terms.</p>
                            <a href="{{ route('categories') }}" class="btn btn-primary">Browse All Categories</a>
                        </div>
                    </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                @if($products->hasPages())
                <div class="mt-5 d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ─── SIDEBAR ─────────────────────────────────────────── */
.sidebar-widget {
    background: #fff;
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    padding: 20px;
    margin-bottom: 16px;
}
.sidebar-widget-title {
    font-size: 0.78rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: var(--dark);
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary-soft);
}

/* Search */
.sidebar-search {
    position: relative;
    display: flex;
    align-items: stretch;
    width: 100%;
    overflow: hidden;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
}
.sidebar-search-icon {
    position: absolute; left: 12px;
    top: 50%; transform: translateY(-50%);
    color: var(--text-light); font-size: 0.8rem;
    pointer-events: none;
    z-index: 2;
}
.sidebar-search-input {
    flex: 1;
    border: none;
    padding: 10px 10px 10px 36px;
    font-size: 0.83rem;
    color: var(--text-main);
    outline: none;
    min-width: 0; /* Critical for flex-shrink */
}
.sidebar-search-btn {
    background: var(--primary);
    border: none;
    color: #fff;
    padding: 0 14px;
    cursor: pointer;
    transition: var(--transition-fast);
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.sidebar-search-btn:hover { background: var(--primary-dark); }


/* Accordion */
.sidebar-acc-item { border-bottom: 1px solid var(--border-light); }
.sidebar-acc-item:last-child { border-bottom: none; }
.sidebar-acc-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 11px 0;
    background: none;
    border: none;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-main);
    cursor: pointer;
    gap: 8px;
    text-align: left;
    transition: var(--transition-fast);
}
.sidebar-acc-btn.active,
.sidebar-acc-btn:hover { color: var(--primary); }
.sidebar-acc-arrow { font-size: 0.65rem; color: var(--text-light); transition: transform 0.25s; flex-shrink: 0; }
.sidebar-acc-btn[aria-expanded="true"] .sidebar-acc-arrow { transform: rotate(180deg); }

.sidebar-acc-body { padding: 4px 0 10px 12px; }

.sidebar-cat-all {
    display: block;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-muted);
    padding: 5px 8px;
    border-radius: 6px;
    margin-bottom: 4px;
    transition: var(--transition-fast);
}
.sidebar-cat-all:hover,
.sidebar-cat-all.active { color: var(--primary); background: var(--primary-soft); }

.sidebar-sub-item { margin-bottom: 2px; }
.sidebar-sub-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.82rem;
    font-weight: 500;
    color: var(--text-muted);
    padding: 6px 8px;
    border-radius: 6px;
    transition: var(--transition-fast);
    cursor: pointer;
}
.sidebar-sub-link:hover,
.sidebar-sub-link.active { color: var(--primary); background: var(--primary-soft); }
.sidebar-sub-count {
    font-size: 0.68rem;
    background: var(--bg-light-2);
    padding: 1px 7px;
    border-radius: 50px;
    font-weight: 600;
}

.sidebar-child-list { padding-left: 12px; margin-top: 2px; }
.sidebar-child-link {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.78rem;
    color: var(--text-light);
    padding: 5px 8px;
    border-radius: 6px;
    transition: var(--transition-fast);
}
.sidebar-child-link i { font-size: 0.45rem; }
.sidebar-child-link:hover,
.sidebar-child-link.active { color: var(--primary); background: var(--primary-soft); }

/* Solutions Link Style */
.sidebar-sol-link {
    display: flex;
    align-items: center;
    font-size: 0.82rem;
    font-weight: 500;
    color: var(--text-muted);
    padding: 8px 10px;
    border-radius: 8px;
    transition: all 0.2s ease;
    text-decoration: none;
    border: 1px solid transparent;
}
.sidebar-sol-link:hover {
    background: var(--primary-soft);
    color: var(--primary);
}
.sidebar-sol-link.active {
    background: var(--primary-soft);
    color: var(--primary);
    font-weight: 700;
    border-color: rgba(79, 70, 229, 0.1);
}
.fs-xs { font-size: 0.75rem !important; }

/* Brands grid */
.sidebar-brands-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
.sidebar-brand-item {
    height: 52px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    padding: 6px;
    transition: var(--transition-fast);
    overflow: hidden;
}
.sidebar-brand-item img {
    max-height: 28px;
    max-width: 100%;
    object-fit: contain;
    filter: grayscale(1);
    opacity: 0.5;
    transition: var(--transition-fast);
}
.sidebar-brand-item span {
    font-size: 0.68rem;
    font-weight: 700;
    color: var(--text-muted);
}
.sidebar-brand-item:hover,
.sidebar-brand-item.active { border-color: var(--primary); background: var(--primary-soft); }
.sidebar-brand-item:hover img { filter: grayscale(0); opacity: 1; }

/* ─── PRODUCTS BAR ───────────────────────────────────── */
.products-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--border-light);
}
.products-bar-filters { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; }

.active-filter-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--primary-soft);
    border: 1px solid rgba(3,138,107,0.2);
    color: var(--primary);
    border-radius: 50px;
    padding: 5px 12px;
    font-size: 0.78rem;
    font-weight: 600;
}
.tag-close {
    color: var(--primary);
    font-size: 0.65rem;
    display: inline-flex;
    transition: var(--transition-fast);
}
.tag-close:hover { color: var(--primary-dark); transform: scale(1.2); }

.products-bar-count {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-light);
    margin: 0;
    white-space: nowrap;
}
</style>
@endpush

@push('scripts')
<script>
// Expand child list on sub-category hover/click in sidebar
document.querySelectorAll('.sidebar-sub-link').forEach(link => {
    link.addEventListener('click', function(e) {
        const item = this.closest('.sidebar-sub-item');
        if (!item) return;
        const childList = item.querySelector('[id^="childList"]');
        if (childList) {
            e.preventDefault();
            childList.classList.toggle('d-none');
        }
    });
});
</script>
@endpush
