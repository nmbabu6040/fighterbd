@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Counter List</h5>
            <a href="{{ route('admin.counter.create') }}" class="btn btn-primary">Add Counter</a>
        </div>
        <div class="card-body mt-2">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Title</th>
                        <th scope="col">Span Title</th>
                        <th scope="col">Count</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($counters as $counter)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $counter->title }}</td>
                            <td>
                                {{ $counter->span_title }}
                            </td>
                            <td>
                                {{ $counter->count }}
                            </td>
                            <td>
                                <div class="button-group d-flex gap-2">
                                    <a href="{{ route('admin.counter.edit', $counter->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.counter.destroy', $counter->id) }}" method="POST}}">
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
                {{ $counters->links() }}
            </div>
        </div>
    </div>
@endsection
