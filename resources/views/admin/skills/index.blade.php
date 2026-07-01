@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="actions-row">
        <span class="count">{{ $skills->count() }} skill(s)</span>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-accent">+ Add Skill</a>
    </div>
    @if($skills->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No skills yet. Add your first one.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th>Name</th><th>Category</th><th>Level</th><th></th></tr></thead>
            <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->category ?: '—' }}</td>
                    <td>{{ $skill->percentage }}%</td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="delete-form">
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
