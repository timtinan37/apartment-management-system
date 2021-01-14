@extends('backend.layout')

@section('title', 'Create Committee')
@section('page-title', 'Create Committee')
@section('page-title-subheading', 'Create a committee responsible for managing apartments')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Committee Creation Form</h5>
            <form method="post" action="{{ route('dashboard.committees.store') }}">
                @csrf
                <div class="position-relative form-group">
                	<label for="president" class="">Select President</label>
                	<select name="president" id="president" class="form-control">
                        @foreach ($users as $user)
	                       <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                	</select>
                </div>
                <div class="position-relative form-group">
                    <label for="vice_president" class="">Select Vice President</label>
                    <select name="vice_president" id="vice_president" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="gs" class="">Select General Secretary</label>
                    <select name="gs" id="gs" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="ags" class="">Select Assistant General Secretary</label>
                    <select name="ags" id="ags" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="treasurer" class="">Select Treasurer</label>
                    <select name="treasurer" id="treasurer" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection