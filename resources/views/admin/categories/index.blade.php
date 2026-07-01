@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="actions-row">
        <span class="count">{{ $categories->count() }} categor(ies)</span>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-accent">+ Add Category</a>
    </div>
    @if($categories->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No categories yet.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th>Name</th><th>Slug</th><th></th></tr></thead>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}" class="delete-form">
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
