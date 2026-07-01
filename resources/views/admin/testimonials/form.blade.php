@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:600px;">
    <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" enctype="multipart/form-data">
        @csrf
        @if($testimonial->exists) @method('PUT') @endif

        <div class="field">
            <label>Client Name</label>
            <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required>
        </div>
        <div class="field">
            <label>Client Position / Company</label>
            <input type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position) }}">
        </div>
        <div class="field">
            <label>Message</label>
            <textarea name="message" required>{{ old('message', $testimonial->message) }}</textarea>
        </div>
        <div class="field">
            <label>Rating (1–5)</label>
            <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}" required>
        </div>
        <div class="field">
            <label>Client Photo</label>
            @if($testimonial->client_image)<img src="{{ asset('storage/'.$testimonial->client_image) }}" style="width:50px;height:50px;border-radius:50%;object-fit:cover;margin-bottom:8px;">@endif
            <input type="file" name="client_image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">{{ $testimonial->exists ? 'Update' : 'Save' }} Testimonial</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline">Cancel</a>
    </form>
</div>
@endsection
