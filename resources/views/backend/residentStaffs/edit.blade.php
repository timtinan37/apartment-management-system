@extends('backend.layout')

@section('title', 'Edit Resident Staff')
@section('page-title', 'Edit Resident Staff')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Resident Staff Edit Form</h5>
            <form method="post" action="{{ route('dashboard.resident-staffs.update', $residentStaff->id) }}">
                @method('PATCH')
                @csrf
                <div class="position-relative form-group">
                	<label for="name">Name</label>
                	<input name="name" id="name" class="form-control" value="{{ $residentStaff->name }}">
                </div>
                <div class="position-relative form-group">
                    <label for="designation">Designation</label>
                    <input name="designation" id="designation" class="form-control" value="{{ $residentStaff->designation }}">
                </div>
                <div class="position-relative form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" id="phone" class="form-control" value="{{ $residentStaff->phone }}">
                </div>
                <div class="position-relative form-group">
                    <label for="nid_no">NID No.</label>
                    <input name="nid_no" id="nid_no" class="form-control" value="{{ $residentStaff->nid_no }}">
                </div>
                <div class="position-relative form-group">
                    <label for="resident" class="">Select Resident</label>
                    <select name="resident" id="resident" class="form-control">
                        @foreach ($residents as $resident)
                           <option value="{{ $resident->id }}" @if ($resident->id===$residentStaff->resident_id) selected @endif>{{ $resident->contactPerson->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
