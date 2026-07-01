@extends('layouts.admin')

@section('content')
<div class="stat-grid">
    <div class="stat-card">
        <div class="num">{{ $stats['projects'] }}</div>
        <div class="label">Projects</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $stats['skills'] }}</div>
        <div class="label">Skills</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $stats['experiences'] }}</div>
        <div class="label">Experience</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $stats['testimonials'] }}</div>
        <div class="label">Testimonials</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $stats['unread_messages'] }}</div>
        <div class="label">Unread Messages</div>
    </div>
</div>

<div class="card">
    <div class="actions-row">
        <h2 class="card-title">Recent Messages</h2>
        <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-outline btn-sm">View All</a>
    </div>
    @if($latestMessages->isEmpty())
        <div class="empty-state">
            <div class="icon">✉</div>
            <p>No messages yet. They'll appear here when visitors use your contact form.</p>
        </div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th></th></tr></thead>
            <tbody>
            @foreach($latestMessages as $m)
                <tr>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->subject ?: '—' }}</td>
                    <td>{{ $m->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('admin.contact_messages.show', $m) }}" class="btn btn-outline btn-sm">Read</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    @endif
</div>

<div class="card">
    <h2 class="card-title" style="margin-bottom:16px;">Quick Actions</h2>
    <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-accent btn-sm">+ Add Project</a>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-outline btn-sm">+ Add Skill</a>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-outline btn-sm">+ Add Testimonial</a>
        <a href="{{ route('admin.about.edit') }}" class="btn btn-outline btn-sm">Edit About</a>
    </div>
</div>
@endsection
