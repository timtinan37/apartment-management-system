@extends('backend.layout')

@section('title', 'Committee Details')
@section('page-title', 'Committee Details')
@section('page-title-subheading', 'Showing Details For Committee ' . $committee->id)

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="mb-0 table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $committee->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">President</th>
                            <td>
                                {{ $committee->president }}
                                @if ($committee->president_id)
                                    <br>User ID: {{ $committee->president_id }}
                                @endif
                            </td>
                        <tr>
                            <th scope="row">Vice President</th>
                            <td>
                                {{ $committee->vp }}
                                @if ($committee->vp_id)
                                    <br>User ID: {{ $committee->vp_id }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">General Secretary</th>
                            <td>
                                {{ $committee->gs }}
                                @if ($committee->gs_id)
                                    <br>User ID: {{ $committee->gs_id }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Asst. General Secretary</th>
                            <td>
                                {{ $committee->ags }}
                                @if ($committee->ags_id)
                                    <br>User ID: {{ $committee->ags_id }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Treasurer</th>
                            <td>
                                {{ $committee->treasurer }}
                                @if ($committee->treasurer_id)
                                    <br>User ID: {{ $committee->treasurer_id }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td>
                                {{ $committee->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Updated At</th>
                            <td>
                                {{ $committee->updated_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>
                                {{ $committee->status }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('dashboard.committees.edit', $committee->id) }}"><button class="btn btn-primary">Edit</button></a>
@endsection