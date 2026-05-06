@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Child Categories</h3>
            <p class="text-muted mb-0">Manage all child categories</p>
        </div>
        <a href="{{ route('admin.childcategories.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus"></i> Add Child Category
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle" id="childcategoryTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($childcategories as $child)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($child->image)
                                        <img src="{{ asset('uploads/childcategories/'.$child->image) }}" width="60" height="60" class="rounded-3 object-fit-cover">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $child->category->name ?? 'N/A' }}</td>
                                <td>{{ $child->subcategory->name ?? 'N/A' }}</td>
                                <td>{{ $child->name }}</td>
                                <td>
                                    @if($child->status == '1')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.childcategories.edit', $child->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.childcategories.destroy', $child->id) }}" method="POST" class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
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
        $('#childcategoryTable').DataTable();

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
