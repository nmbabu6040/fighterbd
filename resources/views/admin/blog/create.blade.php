@extends('layouts.dashboard')

@section('content')

    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5>Add Blog</h5>

            <a href="{{ route('admin.blog') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

        <div class="card-body mt-3">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            Blog Title
                        </label>

                        <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                            placeholder="Enter blog title" required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Author
                        </label>

                        <input type="text" name="author" class="form-control" value="{{ old('author', 'Admin') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Slug
                        </label>

                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}"
                            placeholder="Leave blank for automatic slug">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Published Date
                        </label>

                        <input type="date" name="published_at" class="form-control"
                            value="{{ old('published_at', date('Y-m-d')) }}">

                    </div>

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

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Blog Image
                        </label>

                        <input type="file" name="image" class="form-control" accept="image/*" required>

                        <small class="text-muted">
                            JPG, JPEG, PNG, WEBP, GIF | Max 3MB
                        </small>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Blog Icon
                        </label>

                        <input type="file" name="icon_image" class="form-control" accept="image/*">

                        <small class="text-muted">
                            Optional | Max 2MB
                        </small>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Short Description
                        </label>

                        <textarea name="description" id="description" class="form-control" rows="4"
                            placeholder="Short blog description...">{{ old('description') }}</textarea>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Blog Content
                        </label>

                        <textarea name="content" id="content" class="form-control" rows="10" placeholder="Write full blog content...">{{ old('content') }}</textarea>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Save Blog
                </button>

                <a href="{{ route('admin.blog') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#description').summernote({
                height: 180,
                placeholder: 'Write short description...'
            });

            $('#content').summernote({
                height: 350,
                placeholder: 'Write full blog content...'
            });

        });
    </script>
@endpush
