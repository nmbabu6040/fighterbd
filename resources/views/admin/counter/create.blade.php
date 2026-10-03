@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Create Counter</h5>
            <a href="{{ route('admin.counter') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body mt-2">

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
            <form action="{{ route('admin.counter.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Enter Counter Title" value="{{ old('title') }}">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="span_title" class="form-label">Span Title</label>
                        <input type="text" class="form-control" id="span_title" name="span_title"
                            placeholder="Enter Span title" value="{{ old('span_title') }}">

                        @error('span_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="count" class="form-label">Count</label>
                        <input type="text" class="form-control" id="count" name="count"
                            placeholder="Enter Count Number" value="{{ old('count') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
