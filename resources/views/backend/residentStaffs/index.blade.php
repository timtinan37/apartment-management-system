@extends('backend.layout')

@section('title', 'Resident Staffs List')
@section('page-title', 'Resident Staffs List')
@section('page-title-subheading', 'Showing Resident Staffs List')

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
                        <th>Resident</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($residentStaffs as $residentStaff)
                            <tr>
                                <td>{{ $residentStaff->id }}</td>
                                <td>
                                    {{ $residentStaff->name }}
                                </td>
                                <td>{{ $residentStaff->designation }}</td>
                                <td>
                                    <a href="{{ route('dashboard.residents.show', $residentStaff->resident_id) }}">{{ $residentStaff->resident->contactPerson->name }}</a>
                                </td>
                                <td>{{ $residentStaff->created_at }}</td>
                                <td>{{ $residentStaff->updated_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.resident-staffs.show', $residentStaff->id) }}"><button class="btn btn-link" type="button">View</button></a>
                                    @can('update resident-staff')
                                        <a href="{{ route('dashboard.resident-staffs.edit', $residentStaff->id) }}"><button type="button" class="btn btn-link">Edit</button></a><br>
                                    @endcan
                                    @can('delete resident-staff')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#residentStaff{{ $residentStaff->id }}Modal">
                                            Delete
                                        </button>
                                        @push('tail')
                                            <!-- Modal -->
                                            <div class="modal fade" id="residentStaff{{ $residentStaff->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="residentStaff{{ $residentStaff->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="residentStaff{{ $residentStaff->id }}ModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">This action will delete resident staff {{ $residentStaff->id }}. Are you sure?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="{{ route('dashboard.resident-staffs.destroy', $residentStaff->id) }}">
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
                {{ $residentStaffs->links() }}
            </div>
        </div>
    </div>

@endsection
