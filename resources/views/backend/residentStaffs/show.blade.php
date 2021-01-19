@extends('backend.layout')

@section('title', 'Resident Staff Details')
@section('page-title', 'Resident Staff Details')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="mb-0 table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $residentStaff->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>
                                {{ $residentStaff->name }}
                            </td>
                        <tr>
                            <th scope="row">Designation</th>
                            <td>
                                {{ $residentStaff->designation }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Resident</th>
                            <td>
                                <a href="{{ route('dashboard.residents.show', $residentStaff->resident_id) }}">{{ $residentStaff->resident->contactPerson->name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>
                                {{ $residentStaff->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">NID No.</th>
                            <td>
                                {{ $residentStaff->nid_no }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td>
                                {{ $residentStaff->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Updated At</th>
                            <td>
                                {{ $residentStaff->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @can('update resident-staff')
        <a href="{{ route('dashboard.resident-staffs.edit', $residentStaff->id) }}"><button class="btn btn-primary">Edit</button></a>
    @endcan
@endsection
