@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="actions-row">
        <span class="count">{{ $projects->count() }} project(s)</span>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-accent">+ Add Project</a>
    </div>
    @if($projects->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No projects yet.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" class="thumb-sm">
                        @else
                            <div class="thumb-sm" style="background:rgba(20,33,61,0.06); border-radius:6px;"></div>
                        @endif
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->category?->name ?? '—' }}</td>
                    <td><span class="badge {{ $project->featured ? 'badge-yes' : 'badge-no' }}">{{ $project->featured ? 'Yes' : 'No' }}</span></td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="delete-form">
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
