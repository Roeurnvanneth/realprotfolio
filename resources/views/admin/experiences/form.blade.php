@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:600px;">
    <form method="POST" action="{{ $experience->exists ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}">
        @csrf
        @if($experience->exists) @method('PUT') @endif

        <div class="field">
            <label>Position</label>
            <input type="text" name="position" value="{{ old('position', $experience->position) }}" required>
        </div>
        <div class="field">
            <label>Company</label>
            <input type="text" name="company" value="{{ old('company', $experience->company) }}" required>
        </div>
        <div class="field">
            <label>Location</label>
            <input type="text" name="location" value="{{ old('location', $experience->location) }}">
        </div>    
        <div class="field">
            <label>Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date?->format('Y-m-d')) }}" required>
        </div>
        <div class="field">
            <label>End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date?->format('Y-m-d')) }}">
            <p class="help">Leave blank if this is your current position.</p>
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="description">{{ old('description', $experience->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ $experience->exists ? 'Update' : 'Save' }} Experience</button>
        <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline">Cancel</a>
    </form>
</div>
@endsection
