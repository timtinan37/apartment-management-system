@extends('backend.layout')

@section('title', 'Residents List')
@section('page-title', 'Residents List')
@section('page-title-subheading', 'Showing Residents List')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Flat No.</th>
                        <th>Contact Person</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($residents as $resident)
                            <tr>
                                <td>{{ $resident->id }}</td>
                                <td>
                                    {{ $resident->flat->flat_no }}
                                </td>
                                <td>
                                    {{ $resident->contactPerson->name }}
                                    <br>{{ $resident->contactPerson->email }}
                                </td>
                                <td>{{ $resident->created_at }}</td>
                                <td>{{ $resident->updated_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.residents.show', $resident->id) }}"><button class="btn btn-link" type="button">View</button></a>
                                    @can('update resident')
                                        <a href="{{ route('dashboard.residents.edit', $resident->id) }}"><button type="button" class="btn btn-link">Edit</button></a><br>
                                    @endcan
                                    @can('delete resident')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#resident{{ $resident->id }}Modal">
                                            Delete
                                        </button>
                                        @push('tail')
                                            <!-- Modal -->
                                            <div class="modal fade" id="resident{{ $resident->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="resident{{ $resident->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="resident{{ $resident->id }}ModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">This action will delete resident {{ $resident->id }}. Are you sure?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="{{ route('dashboard.residents.destroy', $resident->id) }}">
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
                {{ $residents->links() }}
            </div>
        </div>
    </div>

@endsection