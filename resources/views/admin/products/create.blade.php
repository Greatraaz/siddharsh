@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Create Product</h4>
        </div>

        <div class="card-body">

            {{-- GLOBAL ERROR --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label>Brand</label>
                        <select name="brand_id" class="form-select">
                            <option value="">Select Brand</option>
                            @foreach($brands as $b)
                                <option value="{{ $b->id }}" {{ old('brand_id') == $b->id ? 'selected' : '' }}>
                                    {{ $b->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Category *</label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Subcategory *</label>
                        <select name="subcategory_id" class="form-select" required>
                            @foreach($subcategories as $s)
                                <option value="{{ $s->id }}" {{ old('subcategory_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mb-3">
                    <label>Product Name *</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control"
                           required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Product Title Tags</label>
                    <input type="text"
                           name="tags"
                           value="{{ old('tags') }}"
                           class="form-control">
                           @error('tags')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                {{-- CKEDITOR FIELDS --}}

                <div class="mb-3">
                    <label>Short Description</label> 
                    <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Specifications</label>
                    <textarea name="specifications" class="form-control editor">{{ old('specifications') }}</textarea>
                </div>

                

                <div class="mb-3">
                    <label>Packaging</label>
                    <textarea name="packaging" class="form-control editor">{{ old('packaging') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Additional Info</label>
                    <textarea name="additional_info" class="form-control editor">{{ old('additional_info') }}</textarea>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select" required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Featured</label>
                        <select name="featured" class="form-select">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-primary px-4">
                    Save Product
                </button>

            </form>

        </div>

    </div>

</div>

{{-- CKEDITOR --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
document.querySelectorAll('.editor').forEach((el) => {
    ClassicEditor
        .create(el)
        .catch(error => {
            console.error(error);
        });
});
</script>

@endsection