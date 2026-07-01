@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="actions-row">
        <span class="count">{{ $services->count() }} service(s)</span>
        <a href="{{ route('admin.services.create') }}" class="btn btn-accent">+ Add Service</a>
    </div>
    @if($services->isEmpty())
        <div class="empty-state"><div class="icon">▢</div><p>No services yet.</p></div>
    @else
        <div class="table-wrap">
        <table>
            <thead><tr><th>Title</th><th>Description</th><th></th></tr></thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($service->description, 60) }}</td>
                    <td><div class="row-actions">
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="delete-form">
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
