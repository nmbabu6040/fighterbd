@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Testimonials</h5>

            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">
                Add Testimonial
            </a>
        </div>

        <div class="card-body mt-3">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th width="100">Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($testimonials as $testimonial)
                            <tr>

                                {{-- Serial --}}
                                <td>
                                    {{ $testimonials->firstItem() + $loop->index }}
                                </td>


                                {{-- Image --}}
                                <td>

                                    @if ($testimonial->image)
                                        <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                            alt="{{ $testimonial->name }}" width="70" height="70"
                                            style="object-fit: cover; border-radius: 5px;">
                                    @else
                                        <span class="text-muted">
                                            No Image
                                        </span>
                                    @endif

                                </td>


                                {{-- Name --}}
                                <td>
                                    {{ $testimonial->name }}
                                </td>


                                {{-- Description --}}
                                <td style="max-width: 400px;">

                                    {!! \Illuminate\Support\Str::limit(strip_tags($testimonial->description), 100) !!}

                                </td>


                                {{-- Status --}}
                                <td>

                                    <span class="badge bg-{{ $testimonial->status ? 'success' : 'secondary' }}">
                                        {{ $testimonial->status ? 'Active' : 'Inactive' }}
                                    </span>

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>


                                    <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?')">

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
                                <td colspan="6" class="text-center">
                                    No testimonial found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="mt-3">
                {{ $testimonials->links() }}
            </div>

        </div>

    </div>
@endsection
