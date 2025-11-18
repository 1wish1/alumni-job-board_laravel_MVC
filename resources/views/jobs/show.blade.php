@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $job->title }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p class="mb-1">
                    <i class="bi bi-building"></i>
                    <strong>Company:</strong> {{ $job->company_name }}
                </p>
                <p class="mb-1">
                    <i class="bi bi-geo-alt"></i>
                    <strong>Location:</strong> {{ $job->location }}
                </p>
                <p class="mb-1">
                    <i class="bi bi-briefcase"></i>
                    <strong>Type:</strong> 
                    <span class="badge bg-info text-dark">{{ $job->job_type }}</span>
                </p>
            </div>

            <h5 class="mt-4">Job Description</h5>
            <p class="text-muted">{{ $job->description }}</p>

            @if(auth()->user()->role === 'alumni')
                <a href="{{ route('applications.create', $job) }}" class="btn btn-success btn-lg mt-3">
                    <i class="bi bi-pencil-square"></i> Apply for this Job
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
