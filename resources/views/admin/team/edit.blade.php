@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5>Edit Team Member</h5>

            <a href="{{ route('admin.team') }}" class="btn btn-primary">
                Back
            </a>

        </div>

        <div class="card-body mt-3">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6 mb-3">

                        <label for="name" class="form-label">
                            Name
                        </label>

                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $team->name) }}">

                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Designation --}}
                    <div class="col-md-6 mb-3">

                        <label for="designation" class="form-label">
                            Designation
                        </label>

                        <input type="text" class="form-control" id="designation" name="designation"
                            value="{{ old('designation', $team->designation) }}">

                        @error('designation')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Image --}}
                    <div class="col-md-6 mb-3">

                        <label for="image" class="form-label">
                            Change Profile Image
                        </label>

                        <input type="file" class="form-control" id="image" name="image">

                        @if ($team->image)
                            <div class="mt-2">

                                <img src="{{ asset('uploads/team/' . $team->image) }}" alt="{{ $team->name }}"
                                    width="120" height="120" style="object-fit: cover; border-radius: 5px;">

                            </div>
                        @endif

                        @error('image')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">

                        <label for="phone" class="form-label">
                            Phone
                        </label>

                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone', $team->phone) }}">

                        @error('phone')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div class="col-md-6 mb-3">

                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $team->email) }}">

                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Sort Order --}}
                    <div class="col-md-3 mb-3">

                        <label for="sort_order" class="form-label">
                            Sort Order
                        </label>

                        <input type="number" class="form-control" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $team->sort_order) }}" min="0">

                    </div>


                    {{-- Status --}}
                    <div class="col-md-3 mb-3">

                        <label for="status" class="form-label">
                            Status
                        </label>

                        <select name="status" id="status" class="form-control">

                            <option value="1" {{ old('status', $team->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status', $team->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    {{-- Description --}}
                    <div class="col-md-12 mb-3">

                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea class="form-control" id="summernote" name="description" rows="5">{{ old('description', $team->description) }}</textarea>

                        @error('description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Facebook --}}
                    <div class="col-md-6 mb-3">

                        <label for="facebook" class="form-label">
                            Facebook
                        </label>

                        <input type="text" class="form-control" id="facebook" name="facebook"
                            value="{{ old('facebook', $team->facebook) }}">

                    </div>


                    {{-- Twitter --}}
                    <div class="col-md-6 mb-3">

                        <label for="twitter" class="form-label">
                            Twitter / X
                        </label>

                        <input type="text" class="form-control" id="twitter" name="twitter"
                            value="{{ old('twitter', $team->twitter) }}">

                    </div>


                    {{-- LinkedIn --}}
                    <div class="col-md-6 mb-3">

                        <label for="linkedin" class="form-label">
                            LinkedIn
                        </label>

                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            value="{{ old('linkedin', $team->linkedin) }}">

                    </div>


                    {{-- Instagram --}}
                    <div class="col-md-6 mb-3">

                        <label for="instagram" class="form-label">
                            Instagram
                        </label>

                        <input type="text" class="form-control" id="instagram" name="instagram"
                            value="{{ old('instagram', $team->instagram) }}">

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Team Member
                </button>

            </form>

        </div>

    </div>
@endsection
