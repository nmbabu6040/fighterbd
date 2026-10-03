@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">Create User</h3>
                <p class="text-muted mb-0">
                    Create a new admin panel user.
                </p>
            </div>

            <a href="{{ route('admin.user') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back
            </a>

        </div>


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


        <div class="card shadow-sm">

            <div class="card-body">

                <form action="{{ route('admin.user.store') }}" method="POST">

                    @csrf


                    <div class="row">

                        {{-- Name --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Enter user name" required>

                        </div>


                        {{-- Email --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="Enter email address" required>

                        </div>


                        {{-- Password --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Password <span class="text-danger">*</span>
                            </label>

                            <input type="password" name="password" class="form-control" placeholder="Minimum 8 characters"
                                required>

                        </div>


                        {{-- Confirm Password --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Confirm Password <span class="text-danger">*</span>
                            </label>

                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm password" required>

                        </div>


                        {{-- Role --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Role <span class="text-danger">*</span>
                            </label>

                            <select name="role_id" class="form-select" required>

                                <option value="">
                                    Select Role
                                </option>

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>

                                        {{ $role->display_name ?? $role->name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>

                            <select name="status" class="form-select" required>

                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="mt-3">

                        <button type="submit" class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Create User

                        </button>

                        <a href="{{ route('admin.user') }}" class="btn btn-secondary">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
