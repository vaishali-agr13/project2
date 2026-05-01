@extends('adminlte::page')

@section('title', 'Candidates')

@section('content_header')
    <h1>Registered Candidates</h1>
@stop

@section('content')

<div class="card card-primary card-outline">

    <div class="card-header">
        <h3 class="card-title">Candidate List</h3>
    </div>

    <div class="card-body p-0">

        <table class="table table-hover table-striped mb-0">
            
            <thead>
                <tr>
                    <th style="width: 60px;">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered On</th>
                </tr>
            </thead>

            <tbody>
                @forelse($candidates as $key => $candidate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ $candidate->name }}</strong></td>
                        <td>{{ $candidate->email }}</td>
                        <td>
                            {{ optional($candidate->created_at)->format('d M Y') ?? 'N/A' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No candidates found
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@stop