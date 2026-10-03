@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Add Team Member</h5>
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

            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter team member name" value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    {{-- Designation --}}
                    <div class="col-md-6 mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation"
                            placeholder="e.g. Managing Director" value="{{ old('designation') }}">

                        @error('designation')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    {{-- Image --}}
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="image" name="image">

                        @error('image')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter phone number" value="{{ old('phone') }}">

                        @error('phone')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                            value="{{ old('email') }}">

                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    {{-- Sort Order --}}
                    <div class="col-md-3 mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', 0) }}" min="0">
                    </div>


                    {{-- Status --}}
                    <div class="col-md-3 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>


                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="summernote" name="description" rows="5"
                            placeholder="Enter team member description">{{ old('description') }}</textarea>

                        @error('description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    {{-- Facebook --}}
                    <div class="col-md-6 mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook URL"
                            value="{{ old('facebook') }}">
                    </div>


                    {{-- Twitter --}}
                    <div class="col-md-6 mb-3">
                        <label for="twitter" class="form-label">Twitter / X</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter URL"
                            value="{{ old('twitter') }}">
                    </div>


                    {{-- LinkedIn --}}
                    <div class="col-md-6 mb-3">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            placeholder="LinkedIn URL" value="{{ old('linkedin') }}">
                    </div>


                    {{-- Instagram --}}
                    <div class="col-md-6 mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            placeholder="Instagram URL" value="{{ old('instagram') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Save Team
                </button>

            </form>

        </div>

    </div>
@endsection
