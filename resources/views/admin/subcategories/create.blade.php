@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Create Subcategory</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.subcategories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Subcategory Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Subcategory Image</label>
                    <input type="file" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg, image/webp">
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary px-4">Save Subcategory</button>
                <a href="{{ route('admin.subcategories.index') }}" class="btn btn-secondary px-4 ms-2">Cancel</a>

            </form>

        </div>

    </div>

</div>

@endsection
