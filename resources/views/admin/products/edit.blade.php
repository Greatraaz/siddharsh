@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Edit Product</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label>Brand</label>
                        <select name="brand_id" class="form-select">
                            <option value="">Select Brand</option>
                            @foreach($brands as $b)
                                <option value="{{ $b->id }}" {{ $product->brand_id == $b->id ? 'selected' : '' }}>
                                    {{ $b->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Subcategory</label>
                        <select name="subcategory_id" class="form-select">
                            @foreach($subcategories as $s)
                                <option value="{{ $s->id }}" {{ $product->subcategory_id == $s->id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label>Product Title Tags</label>
                    <input type="text"
                           name="tags"
                           class="form-control"
                           value="{{ $product->tags }}">
                </div>

                {{-- IMAGE --}}
                <div class="mb-3">
                    <label>Image</label>

                    @if($product->thumbnail)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                                 width="80" height="80"
                                 class="rounded">
                        </div>
                    @endif

                    <input type="file" name="image" class="form-control">
                </div>

                {{-- CKEDITOR FIELDS --}}

                <div class="mb-3">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control">
                        {{ $product->short_description }}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label>Specifications</label>
                    <textarea name="specifications" class="form-control editor">
                        {{ $product->specifications }}
                    </textarea>
                </div>

                

                <div class="mb-3">
                    <label>Packaging</label>
                    <textarea name="packaging" class="form-control editor">
                        {{ $product->packaging }}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label>Additional Info</label>
                    <textarea name="additional_info" class="form-control editor">
                        {{ $product->additional_info }}
                    </textarea>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Featured</label>
                        <select name="featured" class="form-select">
                            <option value="0" {{ $product->featured == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $product->featured == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-primary px-4">Update Product</button>

            </form>

        </div>

    </div>

</div>

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