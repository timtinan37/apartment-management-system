@extends('backend.layout')

@section('title', 'Transaction Details')
@section('page-title', 'Transaction Details')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="mb-0 table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $transaction->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Category</th>
                            <td>
                                {{ $transaction->category }}
                            </td>
                        <tr>
                            <th scope="row">Description</th>
                            <td>
                                {{ $transaction->description }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>
                                {{ $transaction->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td>
                                {{ $transaction->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Updated At</th>
                            <td>
                                {{ $transaction->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('dashboard.transactions.edit', $transaction->id) }}"><button class="btn btn-primary">Edit</button></a>
@endsection
