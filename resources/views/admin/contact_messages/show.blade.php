@extends('layouts.admin')

@section('content')
<div class="card" style="max-width:600px;">
    <p class="help">From</p>
    <h2 style="margin-bottom:4px;">{{ $message->name }}</h2>
    <p class="help" style="margin-bottom:20px;">{{ $message->email }} · {{ $message->created_at->format('d M Y, h:i A') }}</p>

    @if($message->subject)
        <p class="help">Subject</p>
        <p style="margin-bottom:20px;">{{ $message->subject }}</p>
    @endif

    <p class="help">Message</p>
    <p style="white-space: pre-line;">{{ $message->message }}</p>

    <div style="margin-top:24px; display:flex; gap:10px;">
        <a href="mailto:{{ $message->email }}" class="btn btn-primary">Reply by Email</a>
        <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-outline">Back to Messages</a>
    </div>
</div>
@endsection
