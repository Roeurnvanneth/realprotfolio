@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:600px;">
    <form method="POST" action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}">
        @csrf
        @if($skill->exists) @method('PUT') @endif

        <div class="field">
            <label>Skill Name</label>
            <input type="text" name="name" value="{{ old('name', $skill->name) }}" required>
        </div>
        <div class="field">
            <label>Category</label>
            <input type="text" name="category" value="{{ old('category', $skill->category) }}" placeholder="e.g. Frontend, Backend, Tools">
        </div>
        <div class="field">
            <label>Proficiency (%)</label>
            <input type="number" name="percentage" min="0" max="100" value="{{ old('percentage', $skill->percentage ?? 80) }}" required>
        </div>
        <div class="field">
            <label>Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order ?? 0) }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ $skill->exists ? 'Update' : 'Save' }} Skill</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-outline">Cancel</a>
    </form>
</div>
@endsection
