@extends('layouts.admin')

@section('content')
<div class="card" style="max-width: 760px;">
    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Full Name</label>
            <input type="text" name="name" value="{{ old('name', $about->name) }}" required>
        </div>
        <div class="field">
            <label>Title / Headline</label>
            <input type="text" name="title" value="{{ old('title', $about->title) }}" placeholder="e.g. Full-Stack Developer">
        </div>
        <div class="field">
            <label>Bio</label>
            <textarea name="bio">{{ old('bio', $about->bio) }}</textarea>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $about->email) }}">
        </div>
        <div class="field">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $about->phone) }}">
        </div>
        <div class="field">
            <label>Address</label>
            <input type="text" name="address" value="{{ old('address', $about->address) }}">
        </div>
        <div class="field">
            <label>Facebook URL</label>
            <input type="url" name="facebook" value="{{ old('facebook', $about->facebook) }}">
        </div>
        <div class="field">
            <label>LinkedIn URL</label>
            <input type="url" name="linkedin" value="{{ old('linkedin', $about->linkedin) }}">
        </div>
        <div class="field">
            <label>GitHub URL</label>
            <input type="url" name="github" value="{{ old('github', $about->github) }}">
        </div>
        <div class="field">
            <label>Twitter URL</label>
            <input type="url" name="twitter" value="{{ old('twitter', $about->twitter) }}">
        </div>
        <div class="field">
            <label>Profile Photo</label>
            @if($about->avatar)
                <div class="current-thumb round">
                    <img src="{{ asset('storage/'.$about->avatar) }}">
                    <span class="help" style="margin:0;">Current photo</span>
                </div>
            @endif
            <input type="file" name="avatar" accept="image/*">
        </div>
        <div class="field">
            <label>CV / Resume (PDF)</label>
            @if($about->cv_file)
                <p class="help">Current file: <a href="{{ asset('storage/'.$about->cv_file) }}" target="_blank" style="color: var(--green-dark); font-weight:600;">View CV ↗</a></p>
            @endif
            <input type="file" name="cv_file" accept="application/pdf">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection