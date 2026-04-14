@extends('adminlte::page')

@section('title', 'All Jobs')

@section('content_header')
    <h1>All Posted Jobs</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Jobs List</h3>
        <div class="card-tools">
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm">Post New Job</a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobs as $job)
                <tr>
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->company_name }}</td>
                    <td>{{ $job->categoryData->name ?? 'N/A' }}</td>
                    <td><span class="badge badge-info">{{ $job->job_type }}</span></td>
                    <td>
                        @if($job->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="/admin/jobs/edit/{{$job->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>

                        <form action="{{ route('jobs.delete', $job->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>                    
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No jobs posted yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop