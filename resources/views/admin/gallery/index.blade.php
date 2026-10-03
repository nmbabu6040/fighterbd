@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Gallery</h5>

            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                Add Gallery
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
                            <th width="120">Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Sort</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($galleries as $gallery)
                            <tr>

                                <td>
                                    {{ $galleries->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <img src="{{ asset('uploads/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                        width="100" height="70" style="object-fit: cover;">
                                </td>

                                <td>
                                    {{ $gallery->title }}
                                </td>

                                <td>
                                    {{ $gallery->category_name }}
                                </td>

                                <td>

                                    <span class="badge bg-{{ $gallery->status ? 'success' : 'secondary' }}">
                                        {{ $gallery->status ? 'Active' : 'Inactive' }}
                                    </span>

                                </td>

                                <td>
                                    {{ $gallery->sort_order }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this gallery?')">

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
                                    No gallery found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $galleries->links() }}
            </div>

        </div>

    </div>
@endsection
