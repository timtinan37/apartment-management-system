@extends('backend.layout')

@section('title', 'Building Staff Details')
@section('page-title', 'Building Staff Details')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="mb-0 table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $buildingStaff->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>
                                {{ $buildingStaff->name }}
                            </td>
                        <tr>
                            <th scope="row">Designation</th>
                            <td>
                                {{ $buildingStaff->designation }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>
                                {{ $buildingStaff->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">NID No.</th>
                            <td>
                                {{ $buildingStaff->nid_no }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td>
                                {{ $buildingStaff->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Updated At</th>
                            <td>
                                {{ $buildingStaff->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @can('update building-staff')
        <a href="{{ route('dashboard.building-staffs.edit', $buildingStaff->id) }}"><button class="btn btn-primary">Edit</button></a>
    @endcan
@endsection
