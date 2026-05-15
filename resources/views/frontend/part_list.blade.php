@extends('frontend.layouts.master')

@section('title', 'Part List — ' . ($settings->site_title ?? 'Siddharsh'))
@section('meta_description', 'Advanced part lookup and management directory for enterprise IT infrastructure components.')

@section('content')

{{-- ── Page Banner ─────────────────────────────────────── --}}
<section class="page-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active fw-700">Part List</li>
            </ol>
        </nav>
        <div class="banner-content">
            <h1 class="mb-0">Part List</h1>
        </div>
    </div>
</section>

{{-- ── Part Management Interface ──────────────────────── --}}
<section class="section-py bg-light-brand">
    <div class="container">
        
        {{-- Toolbar Card --}}
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; overflow: visible;">
            <div class="card-body p-4">
                <div class="row g-3 align-items-center">
                    {{-- Search Box --}}
                    <div class="col-xl-4 col-lg-5">
                        <div class="part-search-wrap">
                            <input type="text" id="part-search-input" value="{{ $query ?? '' }}" class="form-control part-search-input" placeholder="Search by SKU, part code, part number, brand, or model..." autocomplete="off">
                            <button type="button" id="part-search-btn" class="part-search-btn"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="col-xl-8 col-lg-7">
                        <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                            <button class="btn btn-action-outline"><i class="fas fa-file-import me-2"></i> Import File</button>
                            <button id="export-csv-btn" class="btn btn-action-outline position-relative">
                                <i class="fas fa-file-csv me-2"></i> Export to CSV 
                                <span id="part-count-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none" style="font-size: 0.65rem;">0</span>
                            </button>
                            <button class="btn btn-action-outline"><i class="fas fa-shield-alt me-2"></i> Generate RoHS</button>
                            <a href="#contact-section" class="btn btn-primary fw-700 px-4">Request a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Results Area --}}
        <div class="row g-4">
            <div class="col-12">
                @if($query)
                <div class="alert bg-white border-0 shadow-sm mb-4 py-3 px-4 d-flex align-items-center justify-content-between" style="border-radius: 12px;">
                    <p class="mb-0 fw-600 text-muted">Matches found for "<span class="text-primary">{{ $query }}</span>"</p>
                    <span class="badge bg-primary-soft text-primary px-3 py-2">{{ $products->total() }} results</span>
                </div>
                @endif

                <div class="part-list-container" id="search-results-container">
                    @if($products->count() > 0)
                        @include('frontend.components.part_results_table')
                    @else
                        <div class="empty-state-box py-5">
                            <div class="icon-wrap mb-3"><i class="fas fa-search fa-3x text-muted"></i></div>
                            <h3 class="fw-700 mb-2">Search for Parts</h3>
                            <p class="text-muted mb-4">Enter a part number or keyword in the search box above to get started.</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ route('categories') }}" class="btn btn-outline-primary px-4">Browse Categories</a>
                                <a href="{{ route('brands') }}" class="btn btn-outline-primary px-4">Browse Brands</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ─── PART SEARCH ────────────────────────────────────── */
.part-search-wrap {
    position: relative;
    display: flex;
    align-items: center;
}
.part-search-input {
    border: 2px solid #eef0f2;
    border-radius: 12px;
    padding: 12px 50px 12px 20px;
    font-size: 0.95rem;
    font-weight: 500;
    transition: all 0.3s ease;
}
.part-search-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px var(--primary-soft);
}
.part-search-btn {
    position: absolute;
    right: 15px;
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 1.1rem;
    transition: color 0.2s;
}
.part-search-btn:hover { color: var(--primary); }

/* ─── ACTION BUTTONS ─────────────────────────────────── */
.btn-action-outline {
    background: #fff;
    border: 1.5px solid #eef0f2;
    border-radius: 10px;
    color: var(--text-main);
    font-size: 0.88rem;
    font-weight: 600;
    padding: 10px 18px;
    transition: all 0.2s;
}
.btn-action-outline:hover {
    background: #f8fafc;
    border-color: var(--primary);
    color: var(--primary);
}

/* ─── PART LIST ITEMS ────────────────────────────────── */
.part-list-container {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.03);
}
.part-list-item {
    padding: 30px;
    border-bottom: 1.5px solid #f8fafc;
    transition: background 0.2s;
}
.part-list-item:last-child { border-bottom: none; }
.part-list-item:hover { background: #fcfdfe; }

.part-img-box {
    width: 100%;
    aspect-ratio: 1/1;
    background: #f8fafc;
    border-radius: 12px;
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.part-img-box img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.part-brand-badge {
    font-size: 0.65rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--primary);
    margin-bottom: 6px;
    display: block;
}
.part-name a {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--dark);
    text-decoration: none;
    transition: color 0.2s;
}
.part-name a:hover { color: var(--primary); }
.part-desc {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.6;
}
.part-more-link {
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--primary);
    text-decoration: none;
}

.part-actions-box {
    background: #f8fafc;
    padding: 15px;
    border-radius: 12px;
}
.part-actions-box .input-group { border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }

</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const STORAGE_KEY = 'siddharsh_part_list';
    const exportBtn = document.getElementById('export-csv-btn');
    const countBadge = document.getElementById('part-count-badge');
    const addButtons = document.querySelectorAll('.add-to-list-btn');

    // Initialize list from localStorage
    let partList = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];

    function updateUI() {
        const count = partList.length;
        if (count > 0) {
            countBadge.innerText = count;
            countBadge.classList.remove('d-none');
        } else {
            countBadge.classList.add('d-none');
        }

        document.querySelectorAll('.add-to-list-btn').forEach(btn => {
            const id = btn.getAttribute('data-id');
            const exists = partList.find(item => item.id === id);
            if (exists) {
                btn.innerText = 'Added';
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-success');
            } else {
                btn.innerText = 'Add';
                btn.classList.add('btn-primary');
                btn.classList.remove('btn-success');
            }
        });
    }

    // Delegate Add to List Click Handler (for AJAX results)
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-to-list-btn')) {
            const btn = e.target;
            const id = btn.getAttribute('data-id');
            const qtyInput = btn.closest('tr') ? btn.closest('tr').querySelector('.part-qty') : btn.previousElementSibling;
            const qty = parseInt(qtyInput.value) || 1;

            const existingIndex = partList.findIndex(item => item.id === id);

            if (existingIndex > -1) {
                partList.splice(existingIndex, 1);
                if(window.Swal) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Removed from list',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            } else {
                const part = {
                    id: id,
                    name: btn.getAttribute('data-name'),
                    code: btn.getAttribute('data-code'),
                    brand: btn.getAttribute('data-brand'),
                    image: btn.getAttribute('data-image'),
                    url: btn.getAttribute('data-url'),
                    qty: qty
                };
                partList.push(part);
                if(window.Swal) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to list',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }

            localStorage.setItem(STORAGE_KEY, JSON.stringify(partList));
            updateUI();
        }
    });

    // AJAX Search Logic
    const searchInput = document.getElementById('part-search-input');
    const searchBtn = document.getElementById('part-search-btn');
    const resultsContainer = document.getElementById('search-results-container');
    let debounceTimer;

    function performSearch() {
        const query = searchInput.value.trim();
        
        // Show loader if query is not empty
        if (query.length > 0) {
            resultsContainer.style.opacity = '0.5';
        }

        fetch(`{{ route('part.list') }}?query=${encodeURIComponent(query)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            resultsContainer.innerHTML = html;
            resultsContainer.style.opacity = '1';
            updateUI();
        })
        .catch(error => {
            console.error('Search error:', error);
            resultsContainer.style.opacity = '1';
        });
    }

    searchInput.addEventListener('keyup', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(performSearch, 500);
    });

    searchBtn.addEventListener('click', performSearch);

    // Export to CSV Click Handler
    exportBtn.addEventListener('click', function() {
        if (partList.length === 0) {
            if(window.Swal) {
                Swal.fire('Empty List', 'Please add some parts to your list before exporting.', 'warning');
            } else {
                alert('Please add some parts to your list before exporting.');
            }
            return;
        }

        const headers = ['QTY', 'Manufacturer', 'Part Number', 'Spec Sheet', 'Part Drawing', 'Obsolete', 'Product Image', 'Minimum', 'Link to product'];
        let csvContent = headers.join(",") + "\n";

        partList.forEach(item => {
            const row = [
                item.qty,
                `"${item.brand}"`,
                `"${item.code}"`,
                `"Spec Sheet"`,
                `"Part Drawing"`,
                `"No"`,
                `"${item.image}"`,
                `"1 unit"`,
                `"${item.url}"`
            ];
            csvContent += row.join(",") + "\n";
        });

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement("a");
        if (link.download !== undefined) {
            const url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", "siddharsh_part_list.csv");
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        if(window.Swal) {
            Swal.fire('Exported!', 'Your part list has been downloaded as a CSV.', 'success');
        }
    });

    // Initial UI Sync
    updateUI();
});
</script>
@endpush

