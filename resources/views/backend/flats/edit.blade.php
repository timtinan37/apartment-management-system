@extends('backend.layout')

@section('title', 'Edit Flat')
@section('page-title', 'Edit Flat')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Flat Edit Form</h5>
            <form method="post" action="{{ route('dashboard.flats.update', $flat->id) }}">
                @method('PATCH')
                @csrf
                <div class="position-relative form-group">
                	<label for="flat_no">Flat No.</label>
                	<input name="flat_no" id="flat_no" class="form-control" value="{{ $flat->flat_no }}">
                </div>
                <div class="position-relative form-group">
                    <label for="floor">Floor</label>
                    <input name="floor" id="floor" class="form-control" type="number" min="0" value="{{ $flat->floor }}">
                </div>
                <div class="position-relative form-group">
                    <label for="owner">Owner</label>
                    <select name="owner" id="owner" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}" @if ($user->id===$flat->owner_id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (['OCCUPIED', 'VACANT'] as $status)
                           <option value="{{ $status }}" @if($flat->status===$status) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
