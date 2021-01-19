@extends('backend.layout')

@section('title', 'Create Building Staff')
@section('page-title', 'Create Building Staff')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Building Staff Creation Form</h5>
            <form method="post" action="{{ route('dashboard.building-staffs.store') }}">
                @csrf
                <div class="position-relative form-group">
                	<label for="name">Name</label>
                	<input name="name" id="name" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="designation">Designation</label>
                    <input name="designation" id="designation" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" id="phone" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="nid_no">NID No.</label>
                    <input name="nid_no" id="nid_no" class="form-control">
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
