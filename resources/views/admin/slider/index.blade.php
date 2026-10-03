@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Slider List</h5>
            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Add Slider</a>
        </div>
        <div class="card-body mt-2">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $slider->title }}</td>
                            <td>
                                <img src="{{ asset('uploads/slider/' . $slider->image) }}" alt="{{ $slider->title }}"
                                    class="img-fluid" style="width: 80px">
                            </td>
                            <td>
                                <div class="button-group d-flex gap-2">
                                    <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"> <i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $sliders->links() }}
            </div>
        </div>
    </div>
@endsection
