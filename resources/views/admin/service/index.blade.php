@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Service List</h5>
            <a href="{{ route('admin.service.create') }}" class="btn btn-primary">Add service_name</a>
        </div>
        <div class="card-body mt-2">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Service Icon</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $slider)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $slider->service_name }}</td>
                            <td>{{ $slider->service_icon }}</td>
                            <td>
                                <span
                                    class="badge bg-{{ $slider->status ? 'success' : 'secondary' }}">{{ $slider->status ? 'Active' : 'Inactive' }}</span>
                            </td>

                            <td>
                                <div class="button-group d-flex gap-2">
                                    <a href="{{ route('admin.service.edit', $slider->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.service.destroy', $slider->id) }}" method="POST}}">
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
                {{ $services->links() }}
            </div>
        </div>
    </div>
@endsection
