@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="fw-bold mb-1">Solutions</h3>
            <p class="text-muted mb-0">Manage solution entries and map products to business solutions.</p>
        </div>
        <a href="{{ route('admin.solutions.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add New Solution
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="solutionTable">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Solution Detail</th>
                            <th>Status</th>
                            <th>Products</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($solutions as $solution)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="solution-icon-wrap bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; flex-shrink: 0;">
                                            @if($solution->icon)
                                                <img src="{{ asset('uploads/solutions/'.$solution->icon) }}" alt="{{ $solution->name }}" class="w-100 h-100 object-fit-contain p-2">
                                            @else
                                                <i class="fa-solid fa-lightbulb text-primary"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $solution->name }}</div>
                                            <div class="text-muted small" title="{{ $solution->short_description }}">{{ Str::limit($solution->short_description, 60) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($solution->status == '1')
                                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                        <i class="fa-solid fa-box-open me-1"></i> {{ $solution->products()->count() }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.solutions.edit', $solution->id) }}" class="btn btn-sm btn-light-primary border-0 rounded-3" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                        </a>
                                        <form action="{{ route('admin.solutions.destroy', $solution->id) }}" method="POST" class="d-inline form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-light-danger border-0 rounded-3 btn-delete" title="Delete">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- DataTables will handle empty state -->
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        $('#solutionTable').DataTable();

        $('.btn-delete').on('click', function() {
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this solution? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
</script>
@endpush

<style>
    .btn-light-primary { background: #f0f7f4; color: #007e5e; }
    .btn-light-primary:hover { background: #007e5e; color: #fff !important; }
    .btn-light-primary:hover i { color: #fff !important; }

    .btn-light-danger { background: #fff1f2; color: #e11d48; }
    .btn-light-danger:hover { background: #e11d48; color: #fff !important; }
    .btn-light-danger:hover i { color: #fff !important; }

    .bg-success-subtle { background: #ecfdf5; color: #059669; }
    .bg-danger-subtle { background: #fef2f2; color: #dc2626; }
    .bg-primary-subtle { background: #eff6ff; color: #2563eb; }
</style>
@endsection
