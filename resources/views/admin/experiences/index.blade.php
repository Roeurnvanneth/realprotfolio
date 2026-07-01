@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="actions-row">
        <span class="count">{{ $experiences->count() }} entr(ies)</span>
        <a href="{{ route('admin.experiences.create') }}" class="btn btn-accent">+ Add Experience</a>
    </div>
    @if($experiences->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No experience entries yet.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th>Position</th><th>Company</th><th>Period</th><th></th></tr></thead>
            <tbody>
            @foreach($experiences as $exp)
                <tr>
                    <td>{{ $exp->position }}</td>
                    <td>{{ $exp->company }}</td>
                    <td>{{ $exp->start_date->format('M Y') }} – {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}</td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.experiences.destroy', $exp) }}" class="delete-form">
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
