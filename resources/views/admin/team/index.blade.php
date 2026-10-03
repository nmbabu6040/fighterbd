@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Team Members</h5>
            <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                Add Team Member
            </a>
        </div>

        <div class="card-body mt-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

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
                            <th>Designation</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Sort</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($teams as $team)
                            <tr>
                                <td>
                                    {{ $teams->firstItem() + $loop->index }}
                                </td>
                                <td>
                                    @if ($team->image)
                                        <img src="{{ asset('uploads/team/' . $team->image) }}" alt="{{ $team->name }}"
                                            width="70" height="70" style="object-fit: cover; border-radius: 5px;">
                                    @else
                                        <span class="text-muted">
                                            No Image
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $team->name }}
                                </td>
                                <td>
                                    {{ $team->designation }}
                                </td>
                                <td>
                                    {{ $team->phone }}
                                </td>
                                <td>
                                    <span class="badge bg-{{ $team->status ? 'success' : 'secondary' }}">
                                        {{ $team->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    {{ $team->sort_order }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this team member?')">

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
                                <td colspan="8" class="text-center">
                                    No team member found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $teams->links() }}
            </div>
        </div>
    </div>
@endsection
