@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="mb-1">Create Role</h3>

                <p class="text-muted mb-0">
                    Create a new user role.
                </p>

            </div>

            <a href="{{ route('admin.role') }}" class="btn btn-secondary">

                <i class="fa fa-arrow-left"></i>
                Back

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

                <form action="{{ route('admin.role.store') }}" method="POST">

                    @csrf


                    <div class="row">

                        {{-- Role Name --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Role Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Example: manager" required>

                            <small class="text-muted">
                                Use lowercase letters, numbers and hyphens.
                            </small>

                        </div>


                        {{-- Display Name --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Display Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="display_name" class="form-control" value="{{ old('display_name') }}"
                                placeholder="Example: Manager" required>

                        </div>


                        {{-- Description --}}
                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" class="form-control" rows="4" placeholder="Describe this role">{{ old('description') }}</textarea>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Status
                                <span class="text-danger">*</span>
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
                            Create Role

                        </button>

                        <a href="{{ route('admin.role') }}" class="btn btn-secondary">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
