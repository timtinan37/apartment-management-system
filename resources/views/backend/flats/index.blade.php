@extends('backend.layout')

@section('title', 'Flats List')
@section('page-title', 'Flats List')
@section('page-title-subheading', 'Showing Flats List')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Flat No.</th>
                        <th>Floor</th>
                        <th>Owner</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($flats as $flat)
                            <tr>
                                <td>{{ $flat->id }}</td>
                                <td>
                                    {{ $flat->flat_no }}
                                </td>
                                <td>
                                    {{ $flat->floor }}
                                </td>
                                <td>
                                    {{ $flat->owner->name }}
                                </td>
                                <td>{{ $flat->created_at }}</td>
                                <td>{{ $flat->updated_at }}</td>
                                <td class="text-center">
                                    @can('update flat')
                                        <a href="{{ route('dashboard.flats.edit', $flat->id) }}"><button type="button" class="btn btn-link">Edit</button></a><br>
                                    @endcan
                                    @can('delete flat')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#flat{{ $flat->id }}Modal">
                                            Delete
                                        </button>
                                        @push('tail')
                                            <!-- Modal -->
                                            <div class="modal fade" id="flat{{ $flat->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="flat{{ $flat->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="flat{{ $flat->id }}ModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">This action will delete flat {{ $flat->flat_no }}. Are you sure?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="{{ route('dashboard.flats.destroy', $flat->id) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Yes, Delete!</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endpush
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $flats->links() }}
            </div>
        </div>
    </div>

@endsection