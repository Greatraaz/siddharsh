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

                    <div class="col-md-3 mb-3">
                        <label>Brand</label>
                        <select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror">
                            <option value="">Select Brand</option>
                            @foreach($brands as $b)
                                <option value="{{ $b->id }}" {{ (old('brand_id', $product->brand_id) == $b->id) ? 'selected' : '' }}>
                                    {{ $b->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Category *</label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" {{ (old('category_id', $product->category_id) == $c->id) ? 'selected' : '' }}>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Subcategory *</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-select @error('subcategory_id') is-invalid @enderror" required>
                            <option value="">Select Subcategory</option>
                            @foreach($subcategories as $s)
                                <option value="{{ $s->id }}" {{ (old('subcategory_id', $product->subcategory_id) == $s->id) ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subcategory_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Child Category</label>
                        <select name="child_category_id" id="child_category_id" class="form-select @error('child_category_id') is-invalid @enderror">
                            <option value="">Select Child Category</option>
                            @isset($childcategories)
                                @foreach($childcategories as $child)
                                    <option value="{{ $child->id }}" {{ (old('child_category_id', $product->child_category_id) == $child->id) ? 'selected' : '' }}>
                                        {{ $child->name }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('child_category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                </div>

                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Part Code</label>
                    <input type="text" name="part_code" class="form-control @error('part_code') is-invalid @enderror" value="{{ old('part_code', $product->part_code) }}" required>
                    @error('part_code') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Product Title Tags</label>
                    <input type="text"
                           name="tags"
                           class="form-control @error('tags') is-invalid @enderror"
                           value="{{ old('tags', $product->tags) }}">
                    @error('tags') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- IMAGE --}}
                <div class="mb-3">
                    <label>Main Thumbnail</label>
                    @if($product->thumbnail)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                                 width="80" height="80"
                                 class="rounded border">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Product Gallery (Multiple Images)</label>
                    <div class="d-flex flex-wrap gap-2 mb-2">
                        @foreach($product->images as $img)
                            <div class="position-relative gallery-item-{{ $img->id }}">
                                <img src="{{ asset('uploads/products/gallery/'.$img->image) }}"
                                     width="80" height="80"
                                     class="rounded border object-fit-cover">
                                <button type="button" 
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 p-0 rounded-circle delete-gallery-img" 
                                        data-id="{{ $img->id }}"
                                        style="width:20px; height:20px; line-height:1;">
                                    &times;
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <input type="file" name="images[]" id="gallery-input" class="form-control @error('images.*') is-invalid @enderror" accept="image/*" multiple>
                    <div id="gallery-preview" class="d-flex flex-wrap gap-2 mt-2"></div>
                    @error('images.*')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- CKEDITOR FIELDS --}}

                <div class="mb-3">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $product->short_description) }}</textarea>
                    @error('short_description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Specifications</label>
                    <textarea name="specifications" class="form-control editor @error('specifications') is-invalid @enderror">{{ old('specifications', $product->specifications) }}</textarea>
                    @error('specifications') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                

                <div class="mb-3">
                    <label>Packaging</label>
                    <textarea name="packaging" class="form-control editor @error('packaging') is-invalid @enderror">{{ old('packaging', $product->packaging) }}</textarea>
                    @error('packaging') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Additional Info</label>
                    <textarea name="additional_info" class="form-control editor @error('additional_info') is-invalid @enderror">{{ old('additional_info', $product->additional_info) }}</textarea>
                    @error('additional_info') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Featured</label>
                        <select name="featured" class="form-select @error('featured') is-invalid @enderror">
                            <option value="0" {{ old('featured', $product->featured) == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('featured', $product->featured) == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('featured') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                </div>

                <hr class="my-4">
                <h5 class="mb-3 text-primary">SEO Section</h5>

                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $product->meta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2" placeholder="keyword1, keyword2, ...">{{ old('meta_keywords', $product->meta_keywords) }}</textarea>
                </div>

                <button class="btn btn-primary px-4">Update Product</button>

            </form>

        </div>

    </div>

</div>

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
document.querySelectorAll('.editor').forEach((el) => {
    ClassicEditor
        .create(el)
        .catch(error => {
            console.error(error);
        });
});

$(document).ready(function() {
    $('#category_id').on('change', function() {
        var categoryId = $(this).val();
        var subcategoryDropdown = $('#subcategory_id');
        var childcategoryDropdown = $('#child_category_id');

        subcategoryDropdown.html('<option value="">Loading...</option>');
        childcategoryDropdown.html('<option value="">Select Child Category</option>');

        if(categoryId) {
            $.ajax({
                url: '{{ url("admin/get-subcategories") }}/' + categoryId,
                type: 'GET',
                success: function(data) {
                    subcategoryDropdown.html('<option value="">Select Subcategory</option>');
                    $.each(data, function(key, value) {
                        subcategoryDropdown.append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        } else {
            subcategoryDropdown.html('<option value="">Select Subcategory</option>');
        }
    });

    $('#subcategory_id').on('change', function() {
        var subcategoryId = $(this).val();
        var childcategoryDropdown = $('#child_category_id');

        childcategoryDropdown.html('<option value="">Loading...</option>');

        if(subcategoryId) {
            $.ajax({
                url: '{{ url("admin/get-childcategories") }}/' + subcategoryId,
                type: 'GET',
                success: function(data) {
                    childcategoryDropdown.html('<option value="">Select Child Category</option>');
                    $.each(data, function(key, value) {
                        childcategoryDropdown.append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        } else {
            childcategoryDropdown.html('<option value="">Select Child Category</option>');
        }
    });

    // Gallery Preview
    $('#gallery-input').on('change', function() {
        var preview = $('#gallery-preview');
        preview.html('');
        if (this.files) {
            $.each(this.files, function(i, file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.append('<div class="position-relative"><img src="'+e.target.result+'" class="img-thumbnail" style="width:100px; height:100px; object-fit:cover;"></div>');
                }
                reader.readAsDataURL(file);
            });
        }
    });

    // Delete Gallery Image
    $('.delete-gallery-img').on('click', function() {
        var id = $(this).data('id');
        var item = $('.gallery-item-' + id);
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this gallery image?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ url("admin/product-images") }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        item.remove();
                        Swal.fire(
                            'Deleted!',
                            'Image has been deleted.',
                            'success'
                        )
                    }
                });
            }
        });
    });
});
</script>
@endpush

@endsection