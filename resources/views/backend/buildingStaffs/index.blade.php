@extends('backend.layout')

@section('title', 'Building Staffs List')
@section('page-title', 'Building Staffs List')
@section('page-title-subheading', 'Showing Building Staffs List')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($buildingStaffs as $buildingStaff)
                            <tr>
                                <td>{{ $buildingStaff->id }}</td>
                                <td>
                                    {{ $buildingStaff->name }}
                                </td>
                                <td>{{ $buildingStaff->designation }}</td>
                                <td>{{ $buildingStaff->created_at }}</td>
                                <td>{{ $buildingStaff->updated_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.building-staffs.show', $buildingStaff->id) }}"><button class="btn btn-link" type="button">View</button></a>
                                    @can('update building-staff')
                                        <a href="{{ route('dashboard.building-staffs.edit', $buildingStaff->id) }}"><button type="button" class="btn btn-link">Edit</button></a><br>
                                    @endcan
                                    @can('delete building-staff')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#buildingStaff{{ $buildingStaff->id }}Modal">
                                            Delete
                                        </button>
                                        @push('tail')
                                            <!-- Modal -->
                                            <div class="modal fade" id="buildingStaff{{ $buildingStaff->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="buildingStaff{{ $buildingStaff->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="buildingStaff{{ $buildingStaff->id }}ModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">This action will delete building staff {{ $buildingStaff->id }}. Are you sure?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="{{ route('dashboard.building-staffs.destroy', $buildingStaff->id) }}">
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
                {{ $buildingStaffs->links() }}
            </div>
        </div>
    </div>

@endsection
