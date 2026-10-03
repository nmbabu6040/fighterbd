@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5>Contact Messages</h5>

        </div>

        <div class="card-body mt-3">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>
                            <th width="60">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th width="180">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($contacts as $contact)
                            <tr class="{{ $contact->status == 0 ? 'table-warning' : '' }}">

                                <td>
                                    {{ $contacts->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <strong>{{ $contact->name }}</strong>
                                </td>

                                <td>
                                    {{ $contact->email }}
                                </td>

                                <td>
                                    {{ $contact->subject }}
                                </td>

                                <td>

                                    @if ($contact->status)
                                        <span class="badge bg-success">
                                            Read
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            New
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    {{ $contact->created_at->format('M d, Y h:i A') }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.contact.show', $contact->id) }}"
                                        class="btn btn-sm btn-primary">
                                        View
                                    </a>

                                    <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this message?')">

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

                                <td colspan="7" class="text-center">
                                    No contact message found.
                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $contacts->links() }}

            </div>

        </div>

    </div>
@endsection
