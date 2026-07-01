@extends('layouts.admin')

@section('content')
<div class="card">
    @if($messages->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No messages yet.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th>Status</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th></th></tr></thead>
            <tbody>
            @foreach($messages as $m)
                <tr>
                    <td><span class="badge {{ $m->is_read ? 'badge-read' : 'badge-unread' }}">{{ $m->is_read ? 'Read' : 'New' }}</span></td>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->subject ?: '—' }}</td>
                    <td>{{ $m->created_at->format('d M Y') }}</td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.contact_messages.show', $m) }}" class="btn btn-outline btn-sm">Read</a>
                        <form method="POST" action="{{ route('admin.contact_messages.destroy', $m) }}" class="delete-form">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    @endif
</div>
@endsection
