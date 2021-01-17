@extends('backend.layout')

@section('title', 'Edit Asset')
@section('page-title', 'Edit Asset')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Asset Edit Form</h5>
            <form method="post" action="{{ route('dashboard.assets.update', $asset->id) }}">
                @method('PATCH')
                @csrf
                <div class="position-relative form-group">
                	<label for="name">Name</label>
                	<input name="name" id="name" class="form-control" value="{{ $asset->name }}">
                </div>
                <div class="position-relative form-group">
                    <label for="amount">Amount</label>
                    <input name="amount" id="amount" class="form-control" value="{{ $asset->amount }}">
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
