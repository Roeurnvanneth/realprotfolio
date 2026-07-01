@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:600px;">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Site Title</label>
            <input type="text" name="site_title" value="{{ old('site_title', $settings['site_title'] ?? '') }}">
        </div>
        <div class="field">
            <label>Tagline</label>
            <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}">
        </div>
        <div class="field">
            <label>Footer Text</label>
            <input type="text" name="footer_text" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}">
        </div>
        <div class="field">
            <label>Contact Email (shown on site)</label>
            <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
