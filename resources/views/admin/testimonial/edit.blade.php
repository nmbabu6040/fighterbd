@extends('layouts.dashboard')

@section('content')

    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Edit Testimonial</h5>

            <a href="{{ route('admin.testimonial') }}" class="btn btn-secondary">
                Back
            </a>
        </div>


        <div class="card-body mt-3">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6 mb-3">

                        <label for="name" class="form-label">
                            Name
                        </label>

                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $testimonial->name) }}" placeholder="Enter client name" required>

                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Image --}}
                    <div class="col-md-6 mb-3">

                        <label for="image" class="form-label">
                            Client Image
                        </label>

                        <input type="file" name="image" id="image" class="form-control" accept="image/*">

                        <small class="text-muted d-block">
                            JPG, JPEG, PNG, WEBP, GIF | Max 3MB
                        </small>

                        @error('image')
                            <span class="text-danger d-block">
                                {{ $message }}
                            </span>
                        @enderror


                        {{-- Existing Image --}}
                        @if ($testimonial->image)
                            <div class="mt-3">

                                <p class="mb-2">
                                    Current Image:
                                </p>

                                <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                    alt="{{ $testimonial->name }}" width="120" height="120"
                                    style="object-fit: cover; border-radius: 5px;">

                            </div>
                        @endif

                    </div>


                    {{-- Description --}}
                    <div class="col-md-12 mb-3">

                        <label for="description" class="form-label">
                            Testimonial Description
                        </label>

                        <textarea name="description" id="description" class="form-control" rows="6"
                            placeholder="Write testimonial here...">{{ old('description', $testimonial->description) }}</textarea>

                        @error('description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6 mb-3">

                        <label for="status" class="form-label">
                            Status
                        </label>

                        <select name="status" id="status" class="form-control">

                            <option value="1" {{ old('status', $testimonial->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status', $testimonial->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                        @error('status')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                </div>


                {{-- Submit --}}
                <div class="mt-3">

                    <button type="submit" class="btn btn-primary">
                        Update Testimonial
                    </button>

                    <a href="{{ route('admin.testimonial') }}" class="btn btn-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection


@push('scripts')
    <script>
        $(document).ready(function() {

            $('#description').summernote({
                height: 250,
                placeholder: 'Write testimonial here...'
            });

        });
    </script>
@endpush
