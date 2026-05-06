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
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Category Image</label>
                    @if($category->image)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/categories/'.$category->image) }}" width="80" height="80" class="rounded-3 object-fit-cover">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/png, image/jpeg, image/jpg, image/webp">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary px-4">Update Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4 ms-2">Cancel</a>

            </form>

        </div>

    </div>

</div>

@endsection
