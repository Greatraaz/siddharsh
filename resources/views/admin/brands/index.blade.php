@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Brands</h3>
            <p class="text-muted mb-0">
                Manage all brands
            </p>
        </div>

        <a href="{{ route('admin.brands.create') }}"
           class="btn btn-primary rounded-pill px-4">

            <i class="fa-solid fa-plus"></i>
            Add Brand

        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle" id="brandTable">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($brands as $brand)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>

                                    @if($brand->image)

                                        <img src="{{ asset('uploads/brands/'.$brand->image) }}"
                                             width="60"
                                             height="60"
                                             class="rounded-3 object-fit-cover">

                                    @endif

                                </td>

                                <td>{{ $brand->name }}</td>

                                <td>

                                    @if($brand->status == '1')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('admin.brands.edit',$brand->id) }}"
                                       class="btn btn-sm btn-warning">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>

                                    <form action="{{ route('admin.brands.destroy',$brand->id) }}"
                                          method="POST"
                                          class="d-inline form-delete">

                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="btn btn-sm btn-danger btn-delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center">
                                    No Brands Found
                                </td>
                            </tr>

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
        $('#brandTable').DataTable();

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
