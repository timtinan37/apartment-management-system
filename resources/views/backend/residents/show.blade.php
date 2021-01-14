@extends('backend.layout')

@section('title', 'Resident Details')
@section('page-title', 'Resident Details')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="mb-0 table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $resident->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Flat No.</th>
                            <td>
                                {{ $resident->flat->flat_no }}
                            </td>
                        <tr>
                            <th scope="row">Contact Person</th>
                            <td>
                                {{ $resident->contactPerson->name }}
                                <br>Email: {{ $resident->contactPerson->email }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">No. of Habitats</th>
                            <td>
                                {{ $resident->no_of_habitats }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td>
                                {{ $resident->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Updated At</th>
                            <td>
                                {{ $resident->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('dashboard.residents.edit', $resident->id) }}"><button class="btn btn-primary">Edit</button></a>
@endsection