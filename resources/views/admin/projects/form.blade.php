@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:640px;">
    <form method="POST" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf
        @if($project->exists) @method('PUT') @endif

        <div class="field">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required>
        </div>
        <div class="field">
            <label>Category</label>
            <select name="category_id">
                <option value="">— None —</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id', $project->category_id) == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="field">
            <label>Technologies (comma separated)</label>
            <input type="text" name="technologies" value="{{ old('technologies', $project->technologies) }}" placeholder="Laravel, MySQL, Bootstrap">
        </div>
        <div class="field">
            <label>Live Project URL</label>
            <input type="url" name="project_url" value="{{ old('project_url', $project->project_url) }}">
        </div>
        <div class="field">
            <label>GitHub URL</label>
            <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
        </div>
        <div class="field">
            <label>Cover Image</label>
            @if($project->image)<img src="{{ asset('storage/'.$project->image) }}" style="width:100px;border-radius:4px;margin-bottom:8px;">@endif
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="field check">
            <input type="checkbox" name="featured" id="featured" value="1" @checked(old('featured', $project->featured))>
            <label for="featured" style="margin:0;">Mark as featured</label>
        </div>

        <button type="submit" class="btn btn-primary">{{ $project->exists ? 'Update' : 'Save' }} Project</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Cancel</a>
    </form>
</div>
@endsection
