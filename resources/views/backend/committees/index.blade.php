@extends('backend.layout')

@section('title', 'Committees List')
@section('page-title', 'Committees List')
@section('page-title-subheading', 'Showing Committees List')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>President</th>
                        <th>VP</th>
                        <th>GS</th>
                        <th>AGS</th>
                        <th>Treasurer</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($committees as $committee)
                            <tr>
                                <td>{{ $committee->id }}</td>
                                <td>
                                    {{ $committee->president }}
                                    @if ($committee->president_id)
                                        <br>User ID: {{ $committee->president_id }}
                                    @endif
                                </td>
                                <td>
                                    {{ $committee->vp }}
                                    @if ($committee->vp_id)
                                        <br>User ID: {{ $committee->vp_id }}
                                    @endif
                                </td>
                                <td>
                                    {{ $committee->gs }}
                                    @if ($committee->gs_id)
                                        <br>User ID: {{ $committee->gs_id }}
                                    @endif
                                </td>
                                <td>
                                    {{ $committee->ags }}
                                    @if ($committee->ags_id)
                                        <br>User ID: {{ $committee->ags_id }}
                                    @endif
                                </td>
                                <td>
                                    {{ $committee->treasurer }}
                                    @if ($committee->treasurer_id)
                                        <br>User ID: {{ $committee->treasurer_id }}
                                    @endif
                                </td>
                                <td>{{ $committee->created_at }}</td>
                                <td>{{ $committee->updated_at }}</td>
                                <td>{{ $committee->status }}</td>
                                <td class="text-center">
                                    @can('update committee')
                                        <a href="{{ route('dashboard.committees.edit', $committee->id) }}"><button type="button" class="btn btn-link">Edit</button></a><br>
                                    @endcan
                                    @can('delete committee')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#committee{{ $committee->id }}Modal">
                                            Delete
                                        </button>
                                        @push('tail')
                                            <!-- Modal -->
                                            <div class="modal fade" id="committee{{ $committee->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="committee{{ $committee->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="committee{{ $committee->id }}ModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">This action will delete committte {{ $committee->id }}. Are you sure?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="{{ route('dashboard.committees.destroy', $committee->id) }}">
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
                {{ $committees->links() }}
            </div>
        </div>
    </div>

@endsection