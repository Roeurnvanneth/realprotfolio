@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:600px;">
    <form method="POST" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
        @csrf
        @if($service->exists) @method('PUT') @endif

        <div class="field">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required>
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="description">{{ old('description', $service->description) }}</textarea>
        </div>
        <div class="field">
            <label>Icon (text/emoji, optional)</label>
            <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="e.g. ◆ or a short label">
        </div>
        <div class="field">
            <label>Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ $service->exists ? 'Update' : 'Save' }} Service</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline">Cancel</a>
    </form>
</div>
@endsection
