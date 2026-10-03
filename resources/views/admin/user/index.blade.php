@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Users</h3>
                <p class="text-muted mb-0">Manage admin panel users and their roles.</p>
            </div>

            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add User
            </a>
        </div>

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

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th width="60">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($users as $user)
                                <tr>

                                    <td>
                                        {{ $users->firstItem() + $loop->index }}
                                    </td>

                                    <td>
                                        <strong>{{ $user->name }}</strong>
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>

                                        @forelse($user->roles as $role)
                                            <span class="badge bg-info text-dark">
                                                {{ $role->display_name ?? $role->name }}
                                            </span>

                                        @empty

                                            <span class="text-muted">
                                                No Role
                                            </span>
                                        @endforelse

                                    </td>

                                    <td>

                                        @if ($user->status)
                                            <span class="badge bg-success">
                                                Active
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                Inactive
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $user->created_at?->format('d M Y') }}
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if (auth()->id() !== $user->id)
                                            <form action="{{ route('admin.user.destroy', $user) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </form>
                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        No users found.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">
                    {{ $users->links() }}
                </div>

            </div>
        </div>

    </div>

@endsection
