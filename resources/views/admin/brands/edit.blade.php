@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white py-3">

            <h4 class="mb-0">
                Edit Brand
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.brands.update',$brand->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label">
                        Brand Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $brand->name }}"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Brand Image
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control">

                    <img src="{{ asset('uploads/brands/'.$brand->image) }}"
                         width="80"
                         class="mt-3 rounded-3">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="1"
                            {{ $brand->status == '1' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ $brand->status == '0' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary px-4">
                    Update Brand
                </button>

            </form>

        </div>

    </div>

</div>

@endsection