@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">Import Products</h3>
            <p class="text-muted mb-0">Upload a spreadsheet (.xlsx) and a ZIP archive of product images. Processing runs in the background.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.products.import.template') }}" class="btn btn-outline-primary rounded-pill px-4">
                <i class="fa-solid fa-download me-1"></i> Download template
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-light border rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to products
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form id="product-import-form">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Excel file (.xlsx)</label>
                                <div class="drop-zone border border-2 border-dashed rounded-4 p-4 text-center bg-light-subtle" data-target="excel">
                                    <i class="fa-solid fa-file-excel fa-2x text-success mb-2"></i>
                                    <p class="mb-1 small text-muted">Drag & drop or click to choose</p>
                                    <p class="mb-0 small fw-semibold text-dark" id="excel-filename">No file selected</p>
                                    <input type="file" name="excel" id="input-excel" class="d-none" accept=".xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                </div>
                                <small class="text-muted">Max 50 MB. Must match the template headers.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Images (.zip)</label>
                                <div class="drop-zone border border-2 border-dashed rounded-4 p-4 text-center bg-light-subtle" data-target="zip">
                                    <i class="fa-solid fa-file-zipper fa-2x text-warning mb-2"></i>
                                    <p class="mb-1 small text-muted">Drag & drop or click to choose</p>
                                    <p class="mb-0 small fw-semibold text-dark" id="zip-filename">No file selected</p>
                                    <input type="file" name="zip" id="input-zip" class="d-none" accept=".zip,application/zip">
                                </div>
                                <small class="text-muted">Max 500 MB. Filenames must match thumbnail / gallery columns.</small>
                            </div>
                        </div>

                        <div id="client-error" class="alert alert-danger mt-4 d-none" role="alert"></div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill px-5" id="btn-submit">
                                <i class="fa-solid fa-cloud-arrow-up me-1"></i> Start import
                            </button>
                        </div>
                    </form>

                    <div id="progress-panel" class="mt-4 d-none">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold" id="progress-label">Preparing…</span>
                            <span class="text-muted small" id="progress-count"></span>
                        </div>
                        <div class="progress rounded-pill" style="height: 10px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <p class="small text-muted mt-2 mb-0" id="progress-hint">Ensure <code>php artisan queue:work</code> is running for background processing.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white">
                    <span class="fw-semibold"><i class="fa-solid fa-list-check text-primary me-2"></i>How to Import Products</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary rounded-circle me-2" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">1</span>
                            <span class="fw-bold">Download Template</span>
                        </div>
                        <p class="small text-muted mb-0">Click the "Download template" button to get the correct Excel format.</p>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary rounded-circle me-2" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">2</span>
                            <span class="fw-bold">Fill Spreadsheet</span>
                        </div>
                        <p class="small text-muted mb-0">Fill in product details. Brand, Category, and Subcategory names must match exactly. <strong>If a product with the same name exists, it will be updated.</strong></p>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary rounded-circle me-2" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">3</span>
                            <span class="fw-bold">Prepare Images ZIP</span>
                        </div>
                        <p class="small text-muted mb-2">Create a <code>.zip</code> file containing all product images. </p>
                        <ul class="small text-muted ps-3 mb-0">
                            <li><strong>Structure</strong>: You can put images directly in the ZIP or inside folders. The system will find them.</li>
                            <li><strong>Matching</strong>: Filenames inside the ZIP must match the <code>thumbnail</code> and <code>gallery_images</code> columns in your Excel exactly.</li>
                            <li><strong>Renaming</strong>: Images will be automatically renamed to <code>[slug]_[date]_thumbnail</code> and <code>[slug]_[date]_gallery_[index]</code> upon import.</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary rounded-circle me-2" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">4</span>
                            <span class="fw-bold">Upload & Start</span>
                        </div>
                        <p class="small text-muted mb-0">Select both the Excel and ZIP files, then click "Start import".</p>
                    </div>
                    <div class="mb-0">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary rounded-circle me-2" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">5</span>
                            <span class="fw-bold">Monitor Progress</span>
                        </div>
                        <p class="small text-muted mb-0">Wait for the process to complete. Any errors or skipped rows will appear in the log below.</p>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white">
                    <span class="fw-semibold"><i class="fa-solid fa-circle-info text-primary me-2"></i>Columns</span>
                </div>
                <div class="card-body small">
                    <p class="text-muted">Required: <strong>category</strong>, <strong>sub_category</strong>, <strong>name</strong>. Match brand, category, subcategory, and child category names exactly (case-insensitive).</p>
                    <p class="text-muted mb-0"><strong>part_code</strong> is optional in the sheet; unique values are enforced. Leave blank to auto-generate <code>IMP-…</code> codes. Duplicates are detected by <strong>name</strong>, <strong>slug</strong>, and <strong>part_code</strong>.</p>
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Skipped rows log</span>
                    <span class="badge bg-secondary" id="error-badge">0</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 320px;">
                        <table class="table table-sm table-hover mb-0">
                            <thead class="table-light sticky-top">
                                <tr>
                                    <th style="width: 72px;">Row</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody id="error-rows">
                                <tr id="error-empty">
                                    <td colspan="2" class="text-muted text-center py-4">No row errors yet</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('js')
<script>
(function () {
    const form = document.getElementById('product-import-form');
    const excelInput = document.getElementById('input-excel');
    const zipInput = document.getElementById('input-zip');
    const excelName = document.getElementById('excel-filename');
    const zipName = document.getElementById('zip-filename');
    const clientError = document.getElementById('client-error');
    const submitBtn = document.getElementById('btn-submit');
    const progressPanel = document.getElementById('progress-panel');
    const progressBar = document.getElementById('progress-bar');
    const progressLabel = document.getElementById('progress-label');
    const progressCount = document.getElementById('progress-count');
    const errorRows = document.getElementById('error-rows');
    const errorEmpty = document.getElementById('error-empty');
    const errorBadge = document.getElementById('error-badge');
    const statusUrl = @json(url('/admin/products/import/status'));
    const submitUrl = @json(route('admin.products.import.submit'));
    const csrf = form.querySelector('input[name="_token"]').value;

    let pollTimer = null;

    function showClientError(msg) {
        clientError.textContent = msg;
        clientError.classList.remove('d-none');
    }

    function hideClientError() {
        clientError.classList.add('d-none');
    }

    function bindDropZone(zone, input, labelEl) {
        zone.addEventListener('click', () => input.click());
        zone.addEventListener('dragover', (e) => { e.preventDefault(); zone.classList.add('border-primary', 'bg-primary-subtle'); });
        zone.addEventListener('dragleave', () => zone.classList.remove('border-primary', 'bg-primary-subtle'));
        zone.addEventListener('drop', (e) => {
            e.preventDefault();
            zone.classList.remove('border-primary', 'bg-primary-subtle');
            if (e.dataTransfer.files.length) {
                input.files = e.dataTransfer.files;
                labelEl.textContent = input.files[0].name;
            }
        });
        input.addEventListener('change', () => {
            if (input.files.length) {
                labelEl.textContent = input.files[0].name;
            }
        });
    }

    bindDropZone(document.querySelector('[data-target="excel"]'), excelInput, excelName);
    bindDropZone(document.querySelector('[data-target="zip"]'), zipInput, zipName);

    function validateClient() {
        hideClientError();
        if (!excelInput.files.length) {
            showClientError('Please choose an Excel file.');
            return false;
        }
        if (!zipInput.files.length) {
            showClientError('Please choose a ZIP file of images.');
            return false;
        }
        const ex = excelInput.files[0];
        const z = zipInput.files[0];
        if (!/\.xlsx$/i.test(ex.name)) {
            showClientError('Excel must be .xlsx');
            return false;
        }
        if (!/\.zip$/i.test(z.name)) {
            showClientError('Archive must be .zip');
            return false;
        }
        if (ex.size > 50 * 1024 * 1024) {
            showClientError('Excel file exceeds 50 MB.');
            return false;
        }
        if (z.size > 500 * 1024 * 1024) {
            showClientError('ZIP file exceeds 500 MB.');
            return false;
        }
        return true;
    }

    function renderErrors(errors) {
        const list = errors || [];
        errorBadge.textContent = list.length;
        errorRows.querySelectorAll('tr:not(#error-empty)').forEach((r) => r.remove());
        if (!list.length) {
            errorEmpty.classList.remove('d-none');
            return;
        }
        errorEmpty.classList.add('d-none');
        list.slice(-100).forEach((e) => {
            const tr = document.createElement('tr');
            tr.innerHTML = '<td>' + (e.row != null ? e.row : '—') + '</td><td>' + escapeHtml(e.message) + '</td>';
            errorRows.appendChild(tr);
        });
    }

    function escapeHtml(s) {
        const d = document.createElement('div');
        d.textContent = s;
        return d.innerHTML;
    }

    function setProgress(data) {
        const pct = data.percent != null ? data.percent : (data.status === 'completed' || data.status === 'failed' ? 100 : 0);
        progressBar.style.width = pct + '%';
        progressBar.setAttribute('aria-valuenow', pct);
        const parts = [];
        if (data.total_rows) {
            parts.push((data.imported_rows + data.skipped_rows) + ' / ' + data.total_rows);
        }
        parts.push(data.imported_rows + ' imported');
        if (data.skipped_rows) parts.push(data.skipped_rows + ' skipped');
        progressCount.textContent = parts.join(' · ');
        if (data.status === 'pending') progressLabel.textContent = 'Queued…';
        else if (data.status === 'processing') progressLabel.textContent = 'Importing…';
        else if (data.status === 'completed') progressLabel.textContent = 'Completed';
        else if (data.status === 'failed') progressLabel.textContent = 'Failed';
        renderErrors(data.errors);
    }

    function poll(importId) {
        if (pollTimer) clearInterval(pollTimer);
        pollTimer = setInterval(async () => {
            try {
                const res = await fetch(statusUrl + '/' + importId, { headers: { 'Accept': 'application/json' } });
                const data = await res.json();
                setProgress(data);
                if (data.status === 'completed' || data.status === 'failed') {
                    clearInterval(pollTimer);
                    pollTimer = null;
                    submitBtn.disabled = false;
                    progressBar.classList.remove('progress-bar-animated');
                    if (data.status === 'completed') {
                        progressBar.classList.remove('bg-danger');
                        progressBar.classList.add('bg-success');
                        
                        // Redirect to products index after a short delay
                        setTimeout(() => {
                            window.location.href = "{{ route('admin.products.index') }}";
                        }, 2000);
                    } else {
                        progressBar.classList.add('bg-danger');
                    }
                }
            } catch (e) {
                console.error(e);
            }
        }, 2000);
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!validateClient()) return;

        submitBtn.disabled = true;
        hideClientError();
        progressPanel.classList.remove('d-none');
        progressBar.classList.add('progress-bar-animated', 'bg-primary');
        progressBar.classList.remove('bg-success', 'bg-danger');
        progressBar.style.width = '0%';
        progressLabel.textContent = 'Uploading…';
        progressCount.textContent = '';
        renderErrors([]);

        const body = new FormData(form);

        try {
            const res = await fetch(submitUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body
            });
            const json = await res.json().catch(() => ({}));
            if (!res.ok || !json.success) {
                let msg = json.message || 'Upload failed.';
                if (json.errors) {
                    msg = Object.values(json.errors).flat().join(' ');
                }
                showClientError(msg);
                submitBtn.disabled = false;
                progressPanel.classList.add('d-none');
                return;
            }
            progressLabel.textContent = 'Queued…';
            poll(json.import_log_id);
        } catch (err) {
            showClientError('Network error while uploading.');
            submitBtn.disabled = false;
            progressPanel.classList.add('d-none');
        }
    });
})();
</script>
@endpush
@endsection
