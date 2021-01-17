@extends('backend.layout')

@section('title', 'Assets List')
@section('page-title', 'Assets List')
@section('page-title-subheading', 'Showing Assets List')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                            <tr>
                                <td>{{ $asset->id }}</td>
                                <td>
                                    {{ $asset->name }}
                                </td>
                                <td>{{ $asset->amount }}</td>
                                <td>{{ $asset->created_at }}</td>
                                <td>{{ $asset->updated_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.assets.show', $asset->id) }}"><button class="btn btn-link" type="button">View</button></a>
                                    @can('update asset')
                                        <a href="{{ route('dashboard.assets.edit', $asset->id) }}"><button type="button" class="btn btn-link">Edit</button></a><br>
                                    @endcan
                                    @can('delete asset')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#asset{{ $asset->id }}Modal">
                                            Delete
                                        </button>
                                        @push('tail')
                                            <!-- Modal -->
                                            <div class="modal fade" id="asset{{ $asset->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="asset{{ $asset->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="asset{{ $asset->id }}ModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">This action will delete asset {{ $asset->id }}. Are you sure?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="{{ route('dashboard.assets.destroy', $asset->id) }}">
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
                {{ $assets->links() }}
            </div>
        </div>
    </div>

@endsection
