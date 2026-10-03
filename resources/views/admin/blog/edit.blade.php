@extends('layouts.dashboard')

@section('content')

    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5>Edit Blog</h5>

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

            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            Blog Title
                        </label>

                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}"
                            required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Author
                        </label>

                        <input type="text" name="author" class="form-control"
                            value="{{ old('author', $blog->author) }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Slug
                        </label>

                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $blog->slug) }}">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Published Date
                        </label>

                        <input type="date" name="published_at" class="form-control"
                            value="{{ old('published_at', optional($blog->published_at)->format('Y-m-d')) }}">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-control">

                            <option value="1" {{ old('status', $blog->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status', $blog->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Blog Image
                        </label>

                        <input type="file" name="image" class="form-control" accept="image/*">

                        @if ($blog->image)
                            <div class="mt-3">

                                <p class="mb-2">
                                    Current Image:
                                </p>

                                <img src="{{ asset('uploads/blog/' . $blog->image) }}" width="150" height="100"
                                    style="object-fit:cover;border-radius:5px;">

                            </div>
                        @endif

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Blog Icon
                        </label>

                        <input type="file" name="icon_image" class="form-control" accept="image/*">

                        @if ($blog->icon)
                            <div class="mt-3">

                                <p class="mb-2">
                                    Current Icon:
                                </p>

                                <img src="{{ asset('uploads/blog/' . $blog->icon_image) }}" width="50" height="50"
                                    style="object-fit:cover;border-radius:5px;">

                            </div>
                        @endif

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Short Description
                        </label>

                        <textarea name="description" id="description" class="form-control">{{ old('description', $blog->description) }}</textarea>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Blog Content
                        </label>

                        <textarea name="content" id="content" class="form-control">{{ old('content', $blog->content) }}</textarea>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Blog
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
