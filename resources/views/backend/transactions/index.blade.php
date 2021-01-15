@extends('backend.layout')

@section('title', 'Transactions List')
@section('page-title', 'Transactions List')
@section('page-title-subheading', 'Showing Transactions List')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>
                                    {{ $transaction->category }}
                                </td>
                                <td>
                                    {{ $transaction->description }}
                                </td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->updated_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.transactions.show', $transaction->id) }}"><button class="btn btn-link" type="button">View</button></a>
                                    @can('update transaction')
                                        <a href="{{ route('dashboard.transactions.edit', $transaction->id) }}"><button type="button" class="btn btn-link">Edit</button></a><br>
                                    @endcan
                                    @can('delete transaction')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#transaction{{ $transaction->id }}Modal">
                                            Delete
                                        </button>
                                        @push('tail')
                                            <!-- Modal -->
                                            <div class="modal fade" id="transaction{{ $transaction->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="transaction{{ $transaction->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="transaction{{ $transaction->id }}ModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">This action will delete transaction {{ $transaction->id }}. Are you sure?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="{{ route('dashboard.transactions.destroy', $transaction->id) }}">
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
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

@endsection
