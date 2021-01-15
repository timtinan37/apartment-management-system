@extends('backend.layout')

@section('title', 'Create Flat')
@section('page-title', 'Create Flat')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Flat Creation Form</h5>
            <form method="post" action="{{ route('dashboard.flats.store') }}">
                @csrf
                <div class="position-relative form-group">
                	<label for="flat_no">Flat No.</label>
                	<input name="flat_no" id="flat_no" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="floor">Floor</label>
                    <input name="floor" id="floor" class="form-control" type="number" min="0">
                </div>
                <div class="position-relative form-group">
                    <label for="owner">Owner</label>
                    <select name="owner" id="owner" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (['OCCUPIED', 'VACANT'] as $status)
                           <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
