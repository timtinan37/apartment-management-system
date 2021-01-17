@extends('backend.layout')

@section('title', 'Asset Details')
@section('page-title', 'Asset Details')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="mb-0 table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $asset->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>
                                {{ $asset->name }}
                            </td>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>
                                {{ $asset->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td>
                                {{ $asset->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Updated At</th>
                            <td>
                                {{ $asset->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @can('update asset')
        <a href="{{ route('dashboard.assets.edit', $asset->id) }}"><button class="btn btn-primary">Edit</button></a>
    @endcan
@endsection
