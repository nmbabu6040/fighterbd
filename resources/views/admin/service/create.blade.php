@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Create Service</h5>
            <a href="{{ route('admin.service') }}" class="btn btn-primary">Back</a>
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
            <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="service_title" class="form-label">Service Title</label>
                        <input type="text" class="form-control" id="service_title" name="service_title"
                            placeholder="Enter Service Title" value="{{ old('service_title') }}">
                        @error('service_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="service_title_highlight" class="form-label">Service Highlight Title</label>
                        <input type="text" class="form-control" id="service_title_highlight"
                            name="service_title_highlight" placeholder="Enter Service Title"
                            value="{{ old('service_title_highlight') }}">
                        @error('service_title_highlight')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="service_des" class="form-label">Service Description</label>
                        <textarea class="form-control" id="service_des" name="service_des" rows="2" placeholder="Enter description">{{ old('service_des') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="service_name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="service_name" name="service_name"
                            value="{{ old('service_name') }}">

                        @error('service_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="service_icon" class="form-label">Service Icon</label>
                        <input type="text" class="form-control" id="service_icon" name="service_icon"
                            value="{{ old('service_icon') }}">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="service_description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="service_description" name="service_description"
                            placeholder="Enter Description" value="{{ old('service_description') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
