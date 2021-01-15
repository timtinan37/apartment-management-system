@extends('backend.layout')

@section('title', 'Edit Transaction')
@section('page-title', 'Edit Transaction')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Transaction Edit Form</h5>
            <form method="post" action="{{ route('dashboard.transactions.update', $transaction->id) }}">
                @method('PATCH')
                @csrf
                <div class="position-relative form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach (['CASH IN', 'CASH OUT'] as $category)
                           <option value="{{ $category }}" @if ($category===$transaction->category) selected @endif>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                	<label for="description">Description</label>
                	<input name="description" id="description" class="form-control" value="{{ $transaction->description }}">
                </div>
                <div class="position-relative form-group">
                    <label for="amount">Amount</label>
                    <input name="amount" id="amount" class="form-control" value="{{ $transaction->amount }}">
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
