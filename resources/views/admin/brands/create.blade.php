@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white py-3">

            <h4 class="mb-0">
                Create Brand
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.brands.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-4">

                    <label class="form-label">
                        Brand Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Brand Image
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary px-4">
                    Save Brand
                </button>

            </form>

        </div>

    </div>

</div>

@endsection