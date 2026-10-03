@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">Edit User</h3>
                <p class="text-muted mb-0">
                    Update user information and role.
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

                <form action="{{ route('admin.user.update', $user) }}" method="POST">

                    @csrf
                    @method('PUT')


                    <div class="row">

                        {{-- Name --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                                required>

                        </div>


                        {{-- Email --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}" required>

                        </div>


                        {{-- New Password --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                New Password
                            </label>

                            <input type="password" name="password" class="form-control"
                                placeholder="Leave blank to keep current password">

                        </div>


                        {{-- Confirm Password --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Confirm New Password
                            </label>

                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm new password">

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
                                    <option value="{{ $role->id }}"
                                        {{ old('role_id', $userRole?->id) == $role->id ? 'selected' : '' }}>

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

                                <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="mt-3">

                        <button type="submit" class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Update User

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
