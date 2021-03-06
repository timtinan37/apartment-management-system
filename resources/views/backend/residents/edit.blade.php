@extends('backend.layout')

@section('title', 'Edit Resident')
@section('page-title', 'Edit Resident')
@section('page-title-subheading', '')

@section('main')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Resident Edit Form</h5>
            <form method="post" action="{{ route('dashboard.residents.update', $resident->id) }}">
                @method('PATCH')
                @csrf
                <div class="position-relative form-group">
                    <label for="contact_person" class="">Select Contact Persion</label>
                    <select name="contact_person" id="contact_person" class="form-control">
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}" @if($resident->contact_person===$user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="flat" class="">Select Flat No.</label>
                    <select name="flat" id="flat" class="form-control">
                        @foreach ($flats as $flat)
                           <option value="{{ $flat->id }}" @if($resident->flat_id===$flat->id) selected @endif>{{ $flat->flat_no }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="position-relative form-group">
                    <label for="no_of_habitats">No. of Habitats</label>
                    <input name="no_of_habitats" id="no_of_habitats" class="form-control" type="number" min="0" value="{{ $resident->no_of_habitats }}">
                </div>

                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
