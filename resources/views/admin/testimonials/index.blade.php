@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="actions-row">
        <span class="count">{{ $testimonials->count() }} testimonial(s)</span>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-accent">+ Add Testimonial</a>
    </div>
    @if($testimonials->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No testimonials yet.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th></th><th>Client</th><th>Rating</th><th>Message</th><th></th></tr></thead>
            <tbody>
            @foreach($testimonials as $t)
                <tr>
                    <td>
                        @if($t->client_image)
                            <img src="{{ asset('storage/'.$t->client_image) }}" class="avatar-sm">
                        @else
                            <div class="avatar-sm" style="background:var(--accent); color:var(--ink); display:flex; align-items:center; justify-content:center; font-weight:700; font-size:12px;">{{ strtoupper(substr($t->client_name,0,1)) }}</div>
                        @endif
                    </td>
                    <td>{{ $t->client_name }}</td>
                    <td style="color:var(--accent);">{{ str_repeat('★', $t->rating) }}<span style="color:var(--border)">{{ str_repeat('★', 5 - $t->rating) }}</span></td>
                    <td>{{ \Illuminate\Support\Str::limit($t->message, 50) }}</td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" class="delete-form">
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
