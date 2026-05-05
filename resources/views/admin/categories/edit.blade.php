@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Edit Category</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Category Image</label>
                    @if($category->image)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/categories/'.$category->image) }}" width="80" height="80" class="rounded-3 object-fit-cover">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg, image/webp">
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ $category->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $category->status == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary px-4">Update Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4 ms-2">Cancel</a>

            </form>

        </div>

    </div>

</div>

@endsection
