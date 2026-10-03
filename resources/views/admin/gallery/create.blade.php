@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5>Add Gallery</h5>

            <a href="{{ route('admin.gallery') }}" class="btn btn-primary">
                Back
            </a>

        </div>

        <div class="card-body mt-3">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gallery Title
                        </label>

                        <input type="text" name="title" class="form-control" placeholder="e.g. Comando">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Category Name --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Category Name
                        </label>

                        <input type="text" name="category_name" class="form-control" placeholder="e.g. Army Services">

                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Category Slug --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Category Slug
                        </label>

                        <input type="text" name="category" class="form-control" placeholder="e.g. arm-ser">

                        <small class="text-muted">
                            Use lowercase letters, numbers and hyphen only.
                        </small>

                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gallery Image
                        </label>

                        <input type="file" name="image" class="form-control">

                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Link --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Link
                        </label>

                        <input type="text" name="link" class="form-control"
                            placeholder="/about or https://example.com">

                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Sort Order --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Sort Order
                        </label>

                        <input type="number" name="sort_order" class="form-control" value="0">

                    </div>


                    {{-- Status --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-control">

                            <option value="1" selected>
                                Active
                            </option>

                            <option value="0">
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Save Gallery
                </button>

            </form>

        </div>

    </div>
@endsection
