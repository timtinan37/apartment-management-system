@extends('backend.layout')

@section('title', 'Flat Details')
@section('page-title', 'Flat Details')
@section('page-title-subheading', 'Showing Details For Flat ' . $flat->flat_no)

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="mb-0 table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $flat->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Flat No.</th>
                            <td>
                                {{ $flat->flat_no }}
                            </td>
                        <tr>
                            <th scope="row">Floor</th>
                            <td>
                                {{ $flat->floor }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Owner</th>
                            <td>
                                {{ $flat->owner->name }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>
                                {{ $flat->status }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td>
                                {{ $flat->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Updated At</th>
                            <td>
                                {{ $flat->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('dashboard.flats.edit', $flat->id) }}"><button class="btn btn-primary">Edit</button></a>
@endsection