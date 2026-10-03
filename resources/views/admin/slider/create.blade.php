@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Create Slider</h5>
            <a href="{{ route('admin.slider') }}" class="btn btn-primary">Back</a>
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
            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="subtitle" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                            placeholder="Enter Sub Title" value="{{ old('subtitle') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
                            value="{{ old('title') }}">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="2" placeholder="Enter description">{{ old('description') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="button_text_1" class="form-label">Button Text 1</label>
                        <input type="text" class="form-control" id="button_text_1" name="button_text_1"
                            placeholder="Enter button text 1" value="{{ old('button_text_1') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="button_link_1" class="form-label">Button Link 1</label>
                        <input type="text" class="form-control" id="button_link_1" name="button_link_1"
                            placeholder="/readmore" value="{{ old('button_link_1') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="button_text_2" class="form-label">Button Text 2</label>
                        <input type="text" class="form-control" id="button_text_2" name="button_text_2"
                            placeholder="Enter button text 2" value="{{ old('button_text_2') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="button_link_2" class="form-label">Button Link 2</label>
                        <input type="text" class="form-control" id="button_link_2" name="button_link_2"
                            placeholder="/contact" value="{{ old('button_link_2') }}">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
