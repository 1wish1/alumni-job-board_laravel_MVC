@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Job Listings</h2>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('jobs.create') }}" class="btn btn-primary shadow-sm">Post New Job</a>
        @endif
    </div>

    @if($jobs->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->company_name }}</td>
                            <td>{{ $job->location }}</td>
                            <td>{{ $job->job_type }}</td>
                            <td>{{ $job->created_at->format('M d, Y') }}</td>
                            <td>{{ $job->updated_at->format('M d, Y') }}</td>
                            <td>
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.jobs.applications', $job) }}" class="btn btn-sm btn-info mb-1">View</a>

                                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mb-1" onclick="return confirm('Delete this job?')">Delete</button>
                                    </form>
                                @endif
                                @if(auth()->user()->role === 'alumni')
                                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-info mb-1">View</a>
                                    <a href="{{ route('applications.create', $job) }}" class="btn btn-sm btn-success mb-1">Apply</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning text-center">
            No jobs available.
        </div>
    @endif
</div>
@endsection
