@extends('adminlte::page')

@section('title', 'Job Applications')

@section('content_header')
    <h1>Received Applications</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Candidates List</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Candidate Name</th>
                    <th>Applied For</th>
                    <th>Email</th>
                    <th>Resume</th>
                    <th>Date</th>
                    <th style="width: 150px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $key => $app)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><b>{{ $app->full_name }}</b></td>
                    <td><span class="badge badge-info">{{ $app->job->title ?? 'N/A' }}</span></td>
                    <td>{{ $app->email }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $app->resume) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-file-pdf"></i> View Resume
                        </a>
                    </td>
                    <td>{{ $app->created_at->format('d M, Y') }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-{{ $app->id }}">
                            View Details
                        </button>
                    </td>
                </tr>

                {{-- Modal for Cover Letter --}}
                <div class="modal fade" id="modal-{{ $app->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Application Details</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h6><strong>Cover Letter:</strong></h6>
                                <p>{{ $app->cover_letter ?? 'No cover letter provided.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No applications received yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop