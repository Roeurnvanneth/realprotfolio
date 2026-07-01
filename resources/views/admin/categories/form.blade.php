@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:500px;">
    <form method="POST" action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}">
        @csrf
        @if($category->exists) @method('PUT') @endif

        <div class="field">
            <label>Category Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save' }} Category</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline">Cancel</a>
    </form>
</div>
@endsection
