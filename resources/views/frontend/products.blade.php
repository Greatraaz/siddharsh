@extends('frontend.layouts.master')

@section('title',
    (isset($category) ? $category->name :
    (isset($subcategory) ? $subcategory->name :
    (isset($childCategory) ? $childCategory->name :
    (isset($brand) ? $brand->name :
    (isset($query) ? 'Search: '.$query : 'All Products')))))
    . ' — ' . ($settings->site_title ?? 'Siddharsh')
)

@section('content')

{{-- ── Page Banner ─────────────────────────────────────── --}}
<section class="page-banner">
    <div class="container position-relative" style="z-index:2;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @if(isset($category))
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                @elseif(isset($subcategory))
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.products', $subcategory->category->slug) }}">{{ $subcategory->category->name }}</a></li>
                    <li class="breadcrumb-item active">{{ $subcategory->name }}</li>
                @elseif(isset($childCategory))
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.products', $childCategory->subcategory->category->slug) }}">{{ $childCategory->subcategory->category->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('subcategory.products', $childCategory->subcategory->slug) }}">{{ $childCategory->subcategory->name }}</a></li>
                    <li class="breadcrumb-item active">{{ $childCategory->name }}</li>
                @elseif(isset($brand))
                    <li class="breadcrumb-item"><a href="{{ route('brands') }}">Brands</a></li>
                    <li class="breadcrumb-item active">{{ $brand->name }}</li>
                @else
                    <li class="breadcrumb-item active">{{ isset($query) ? 'Search Results' : 'All Products' }}</li>
                @endif
            </ol>
        </nav>
        <div class="d-flex align-items-end justify-content-between gap-3 flex-wrap">
            <div>
                <h1 class="section-title text-white">
                    @if(isset($category))      {{ $category->name }}
                    @elseif(isset($subcategory)) {{ $subcategory->name }}
                    @elseif(isset($childCategory)) {{ $childCategory->name }}
                    @elseif(isset($brand))     {{ $brand->name }}
                    @elseif(isset($query))     Search: "{{ $query }}"
                    @else All Products
                    @endif
                </h1>
                <p class="page-banner-sub mt-1">{{ $products->total() }} {{ Str::plural('Product', $products->total()) }} found</p>
            </div>
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

                    {{-- Search --}}
                    <div class="sidebar-widget">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="sidebar-search">
                                <i class="fas fa-search sidebar-search-icon"></i>
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="sidebar-search-input" placeholder="Search products...">
                                <button type="submit" class="sidebar-search-btn"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>

                    {{-- Filter by Category --}}
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Filter by Category</h3>
                        <div class="accordion accordion-flush" id="catAccordion">
                            @foreach($categories as $cat)
                            <div class="sidebar-acc-item">
                                <button class="sidebar-acc-btn {{ (isset($category) && $category->id == $cat->id) || (isset($subcategory) && $subcategory->category_id == $cat->id) || (isset($childCategory) && $childCategory->subcategory->category_id == $cat->id) ? 'active' : '' }}"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#catCollapse{{ $cat->id }}"
                                    aria-expanded="{{ (isset($category) && $category->id == $cat->id) || (isset($subcategory) && $subcategory->category_id == $cat->id) ? 'true' : 'false' }}">
                                    <span>{{ $cat->name }}</span>
                                    <i class="fas fa-chevron-down sidebar-acc-arrow"></i>
                                </button>
                                <div id="catCollapse{{ $cat->id }}"
                                     class="collapse {{ (isset($category) && $category->id == $cat->id) || (isset($subcategory) && $subcategory->category_id == $cat->id) || (isset($childCategory) && $childCategory->subcategory->category_id == $cat->id) ? 'show' : '' }}">
                                    <div class="sidebar-acc-body">
                                        <a href="{{ route('category.products', $cat->slug) }}" class="sidebar-cat-all {{ isset($category) && $category->id == $cat->id && !isset($subcategory) && !isset($childCategory) ? 'active' : '' }}">
                                            All {{ $cat->name }}
                                        </a>
                                        @foreach($cat->subcategories as $sub)
                                        <div class="sidebar-sub-item">
                                            <a href="{{ route('subcategory.products', $sub->slug) }}"
                                               class="sidebar-sub-link {{ isset($subcategory) && $subcategory->id == $sub->id ? 'active' : '' }}">
                                                {{ $sub->name }}
                                                @if($sub->childCategories->count())
                                                <span class="sidebar-sub-count">{{ $sub->childCategories->count() }}</span>
                                                @endif
                                            </a>
                                            @if($sub->childCategories->count())
                                            <div class="sidebar-child-list {{ isset($childCategory) && $childCategory->subcategory_id == $sub->id ? '' : 'd-none' }}" id="childList{{ $sub->id }}">
                                                @foreach($sub->childCategories as $child)
                                                <a href="{{ route('childcategory.products', $child->slug) }}"
                                                   class="sidebar-child-link {{ isset($childCategory) && $childCategory->id == $child->id ? 'active' : '' }}">
                                                    <i class="fas fa-minus"></i> {{ $child->name }}
                                                </a>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Brands Filter --}}
                    @if($brands->count())
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Brands</h3>
                        <div class="sidebar-brands-grid">
                            @foreach($brands as $brnd)
                            <a href="{{ route('brand.products', $brnd->slug) }}"
                               class="sidebar-brand-item {{ isset($brand) && $brand->id == $brnd->id ? 'active' : '' }}"
                               title="{{ $brnd->name }}">
                                @if($brnd->image)
                                    <img src="{{ asset('uploads/brands/'.$brnd->image) }}" alt="{{ $brnd->name }}" loading="lazy">
                                @else
                                    <span>{{ strtoupper(substr($brnd->name,0,3)) }}</span>
                                @endif
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </aside>
            </div>

            {{-- ── Products Area ─────────────────────────────── --}}
            <div class="col-lg-9">

                {{-- Results Bar --}}
                <div class="products-bar">
                    <div class="products-bar-filters">
                        @if(isset($category))
                        <span class="active-filter-tag">
                            {{ $category->name }}
                            <a href="{{ route('categories') }}" class="tag-close" aria-label="Remove filter"><i class="fas fa-times"></i></a>
                        </span>
                        @endif
                        @if(isset($subcategory))
                        <span class="active-filter-tag">
                            {{ $subcategory->name }}
                            <a href="{{ route('category.products', $subcategory->category->slug) }}" class="tag-close"><i class="fas fa-times"></i></a>
                        </span>
                        @endif
                        @if(isset($childCategory))
                        <span class="active-filter-tag">
                            {{ $childCategory->name }}
                            <a href="{{ route('subcategory.products', $childCategory->subcategory->slug) }}" class="tag-close"><i class="fas fa-times"></i></a>
                        </span>
                        @endif
                        @if(isset($brand))
                        <span class="active-filter-tag">
                            {{ $brand->name }}
                            <a href="{{ route('categories') }}" class="tag-close"><i class="fas fa-times"></i></a>
                        </span>
                        @endif
                        @if(isset($query))
                        <span class="active-filter-tag">
                            "{{ $query }}"
                            <a href="{{ route('categories') }}" class="tag-close"><i class="fas fa-times"></i></a>
                        </span>
                        @endif
                    </div>
                    <p class="products-bar-count">{{ $products->total() }} {{ Str::plural('product', $products->total()) }}</p>
                </div>

                {{-- Product Grid --}}
                <div class="row g-4">
                    @forelse($products as $product)
                    <div class="col-xl-4 col-md-6 reveal">
                        @include('frontend.components.product-card', ['product' => $product])
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state-box">
                            <div class="icon-wrap"><i class="fas fa-box-open"></i></div>
                            <h3 class="fw-700 mb-2">No Products Found</h3>
                            <p class="text-muted mb-4">No products match your current filters.</p>
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
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: var(--text-main);
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--border-light);
}

/* Search */
.sidebar-search {
    position: relative;
    display: flex;
    align-items: center;
}
.sidebar-search-icon {
    position: absolute; left: 12px;
    color: var(--text-light); font-size: 0.8rem;
    pointer-events: none;
}
.sidebar-search-input {
    flex: 1;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm) 0 0 var(--radius-sm);
    padding: 10px 10px 10px 36px;
    font-family: 'Poppins', sans-serif;
    font-size: 0.83rem;
    color: var(--text-main);
    outline: none;
    transition: var(--transition-fast);
}
.sidebar-search-input:focus { border-color: var(--primary); }
.sidebar-search-btn {
    background: var(--primary);
    border: none;
    color: #fff;
    padding: 10px 14px;
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
    cursor: pointer;
    transition: var(--transition-fast);
    font-size: 0.8rem;
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
    font-family: 'Poppins', sans-serif;
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
