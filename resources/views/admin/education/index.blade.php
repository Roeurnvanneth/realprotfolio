@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="actions-row">
        <span class="count">{{ $educations->count() }} entr(ies)</span>
        <a href="{{ route('admin.education.create') }}" class="btn btn-accent">+ Add Education</a>
    </div>
    @if($educations->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No education entries yet.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th>Degree</th><th>School</th><th>Period</th><th></th></tr></thead>
            <tbody>
            @foreach($educations as $edu)
                <tr>
                    <td>{{ $edu->degree }}</td>
                    <td>{{ $edu->school }}</td>
                    <td>{{ $edu->start_date->format('M Y') }} – {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}</td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.education.edit', $edu) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.education.destroy', $edu) }}" class="delete-form">
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
