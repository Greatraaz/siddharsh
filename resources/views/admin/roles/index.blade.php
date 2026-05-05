@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Roles</h3>
            <p class="text-muted mb-0">Manage roles and permissions</p>
        </div>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus"></i> Add Role
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle" id="roleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 fs-6 rounded-pill">
                                        {{ $role->name }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @if($role->name != 'Super Admin')
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
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
        $('#roleTable').DataTable();

        $('.btn-delete').on('click', function() {
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
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

@endsection
