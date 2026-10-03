@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Blogs</h5>

            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                Add Blog
            </a>
        </div>

        <div class="card-body mt-3">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th width="100">Image</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($blogs as $blog)
                            <tr>

                                <td>
                                    {{ $blogs->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    @if ($blog->image)
                                        <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="{{ $blog->title }}"
                                            width="80" height="60" style="object-fit:cover;border-radius:5px;">
                                    @else
                                        <span class="text-muted">
                                            No Image
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $blog->title }}
                                </td>

                                <td>
                                    {{ $blog->author }}
                                </td>

                                <td>
                                    {{ $blog->published_at?->format('F d, Y') }}
                                </td>

                                <td>

                                    <span class="badge bg-{{ $blog->status ? 'success' : 'secondary' }}">
                                        {{ $blog->status ? 'Active' : 'Inactive' }}
                                    </span>

                                </td>

                                <td>

                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this blog?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    No blog found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $blogs->links() }}
            </div>

        </div>

    </div>
@endsection
