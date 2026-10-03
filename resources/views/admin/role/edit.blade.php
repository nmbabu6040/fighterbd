@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="mb-1">Edit Role</h3>

                <p class="text-muted mb-0">
                    Update role information and permissions.
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


        <form action="{{ route('admin.role.update', $role) }}" method="POST">

            @csrf
            @method('PUT')


            {{-- Role Information --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    <strong>Role Information</strong>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Role Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}"
                                required>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Display Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="display_name" class="form-control"
                                value="{{ old('display_name', $role->display_name) }}" required>

                        </div>


                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" class="form-control" rows="3">{{ old('description', $role->description) }}</textarea>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Status
                                <span class="text-danger">*</span>
                            </label>

                            <select name="status" class="form-select" required>

                                <option value="1" {{ old('status', $role->status) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ old('status', $role->status) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Permissions --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <strong>
                        Permissions
                    </strong>

                    <div>

                        <button type="button" class="btn btn-sm btn-outline-primary" id="selectAllPermissions">

                            Select All

                        </button>

                        <button type="button" class="btn btn-sm btn-outline-secondary" id="clearAllPermissions">

                            Clear All

                        </button>

                    </div>

                </div>


                <div class="card-body">

                    @forelse($permissions as $module => $modulePermissions)
                        <div class="border rounded p-3 mb-3">

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <h5 class="mb-0">
                                    {{ $module ?: 'Other' }}
                                </h5>

                                <button type="button" class="btn btn-sm btn-outline-info module-select"
                                    data-module="{{ Str::slug($module ?: 'other') }}">

                                    Select Module

                                </button>

                            </div>


                            <div class="row">

                                @foreach ($modulePermissions as $permission)
                                    <div class="col-md-4 col-lg-3 mb-2">

                                        <div class="form-check">

                                            <input
                                                class="form-check-input permission-checkbox module-{{ Str::slug($module ?: 'other') }}"
                                                type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                id="permission_{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolePermissionIds) ? 'checked' : '' }}>

                                            <label class="form-check-label" for="permission_{{ $permission->id }}">

                                                {{ $permission->display_name ?? $permission->name }}

                                            </label>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    @empty

                        <div class="alert alert-warning mb-0">
                            No active permissions found.
                        </div>
                    @endforelse

                </div>

            </div>


            <button type="submit" class="btn btn-primary">

                <i class="fa fa-save"></i>
                Update Role

            </button>

            <a href="{{ route('admin.role') }}" class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>


    <script>
        document.getElementById('selectAllPermissions')
            ?.addEventListener('click', function() {

                document
                    .querySelectorAll('.permission-checkbox')
                    .forEach(function(checkbox) {
                        checkbox.checked = true;
                    });

            });


        document.getElementById('clearAllPermissions')
            ?.addEventListener('click', function() {

                document
                    .querySelectorAll('.permission-checkbox')
                    .forEach(function(checkbox) {
                        checkbox.checked = false;
                    });

            });


        document.querySelectorAll('.module-select')
            .forEach(function(button) {

                button.addEventListener('click', function() {

                    const module = this.dataset.module;

                    document
                        .querySelectorAll('.module-' + module)
                        .forEach(function(checkbox) {

                            checkbox.checked = true;

                        });

                });

            });
    </script>

@endsection
