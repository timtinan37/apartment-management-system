@extends('backend.layout')

@section('title', 'Edit Committee - ' . $committee->id)
@section('page-title', 'Edit Committee - ' . $committee->id)
@section('page-title-subheading', 'Edit a committee responsible for managing apartments')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Committee Edit Form</h5>
            <form method="post" action="{{ route('dashboard.committees.update', $committee->id) }}">
                @method('PATCH')
                @csrf
                <div class="position-relative form-group">
                	<label for="president" class="">Select President</label>
                	<select name="president" id="president" class="form-control">
                        @foreach ($users as $user)
	                       <option value="{{ $user->id }}" @if ($committee->president_id==$user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                	</select>
                </div>
                <div class="position-relative form-group">
                    <label for="vice_president" class="">Select Vice President</label>
                    <select name="vice_president" id="vice_president" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}" @if ($committee->vp_id==$user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="gs" class="">Select General Secretary</label>
                    <select name="gs" id="gs" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}" @if ($committee->gs_id==$user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="ags" class="">Select Assistant General Secretary</label>
                    <select name="ags" id="ags" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}" @if ($committee->ags_id==$user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="treasurer" class="">Select Treasurer</label>
                    <select name="treasurer" id="treasurer" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}" @if ($committee->treasurer_id==$user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="status" class="">Select Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (['ACTIVE', 'INACTIVE'] as $status)
                           <option value={{ $status }} @if ($committee->status==$status) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection