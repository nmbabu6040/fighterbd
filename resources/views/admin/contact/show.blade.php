@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5>Contact Message</h5>

            <a href="{{ route('admin.contact') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

        <div class="card-body mt-3">

            <div class="card">

                <div class="card-body">

                    <div class="row mb-3">

                        <div class="col-md-6">

                            <strong>Name:</strong>

                            <p class="mb-0">
                                {{ $contact->name }}
                            </p>

                        </div>

                        <div class="col-md-6">

                            <strong>Email:</strong>

                            <p class="mb-0">

                                <a href="mailto:{{ $contact->email }}">
                                    {{ $contact->email }}
                                </a>

                            </p>

                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-md-6">

                            <strong>Subject:</strong>

                            <p class="mb-0">
                                {{ $contact->subject }}
                            </p>

                        </div>

                        <div class="col-md-6">

                            <strong>Date:</strong>

                            <p class="mb-0">
                                {{ $contact->created_at->format('F d, Y h:i A') }}
                            </p>

                        </div>

                    </div>


                    <hr>


                    <div class="mb-4">

                        <strong>Message:</strong>

                        <div class="border rounded p-3 mt-2">

                            {!! nl2br(e($contact->message)) !!}

                        </div>

                    </div>


                    <div class="d-flex gap-2">

                        @if ($contact->status)
                            <form action="{{ route('admin.contact.unread', $contact->id) }}" method="POST">

                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-warning">
                                    Mark as Unread
                                </button>

                            </form>
                        @endif


                        <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this message?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
