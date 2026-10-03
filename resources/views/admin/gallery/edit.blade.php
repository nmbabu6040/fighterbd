@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5>Edit Gallery</h5>

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

            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gallery Title
                        </label>

                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $gallery->title) }}">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Category Name --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Category Name
                        </label>

                        <input type="text" name="category_name" class="form-control"
                            value="{{ old('category_name', $gallery->category_name) }}">

                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Category Slug --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Category Slug
                        </label>

                        <input type="text" name="category" class="form-control"
                            value="{{ old('category', $gallery->category) }}">

                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Change Image
                        </label>

                        <input type="file" name="image" class="form-control">

                        @if ($gallery->image)
                            <div class="mt-2">

                                <img src="{{ asset('uploads/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                    width="150" height="100" style="object-fit: cover;">

                            </div>
                        @endif

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
                            value="{{ old('link', $gallery->link) }}">

                    </div>


                    {{-- Sort Order --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Sort Order
                        </label>

                        <input type="number" name="sort_order" class="form-control"
                            value="{{ old('sort_order', $gallery->sort_order) }}">

                    </div>


                    {{-- Status --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-control">

                            <option value="1" {{ old('status', $gallery->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status', $gallery->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Gallery
                </button>

            </form>

        </div>

    </div>
@endsection
