@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:600px;">
    <form method="POST" action="{{ $education->exists ? route('admin.education.update', $education) : route('admin.education.store') }}">
        @csrf
        @if($education->exists) @method('PUT') @endif

        <div class="field">
            <label>School / University</label>
            <input type="text" name="school" value="{{ old('school', $education->school) }}" required>
        </div>
        <div class="field">
            <label>Degree</label>
            <input type="text" name="degree" value="{{ old('degree', $education->degree) }}" required>
        </div>
        <div class="field">
            <label>Field of Study</label>
            <input type="text" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}">
        </div>
        <div class="field">
            <label>Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', $education->start_date?->format('Y-m-d')) }}" required>
        </div>
        <div class="field">
            <label>End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date', $education->end_date?->format('Y-m-d')) }}">
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="description">{{ old('description', $education->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ $education->exists ? 'Update' : 'Save' }} Education</button>
        <a href="{{ route('admin.education.index') }}" class="btn btn-outline">Cancel</a>
    </form>
</div>
@endsection
