@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Applications for: <strong>{{ $job->title }}</strong></h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($applications->count() == 0)
        <div class="alert alert-warning text-center">
            No application
        </div>
    @else
        <div class="row g-3">
            @foreach($applications as $application)
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">

                            <h5 class="card-title">{{ $application->user->name }}</h5>
                            <p class="card-text mb-1"><strong>Email:</strong> {{ $application->user->email }}</p>
                            <p class="card-text mb-1"><strong>Phone:</strong> {{ $application->user->phone }}</p>
                            <p class="card-text mb-1"><strong>Address:</strong> {{ $application->user->address }}</p>
                            <p class="card-text mb-1"><strong>Course:</strong> {{ $application->user->course }}</p>
                            <p class="card-text mb-1"><strong>Graduation Year:</strong> {{ $application->user->graduation_year }}</p>
                            <p class="card-text mb-2"><strong>Bio:</strong> {{ Str::limit($application->user->bio, 80) }}</p>

                            <a href="{{ $application->resume_link }}" target="_blank" class="btn btn-sm btn-outline-primary mb-2">
                                View Resume
                            </a>

                            <div class="mb-2">
                                @php
                                    $statusClass = match($application->status) {
                                        'Approved' => 'success',
                                        'Rejected' => 'danger',
                                        default => 'secondary',
                                    };
                                @endphp
                                <span class="badge bg-{{ $statusClass }}">{{ $application->status }}</span>
                            </div>

                            <form action="{{ route('admin.applications.update', $application) }}" method="POST" class="d-flex flex-column gap-1">
                                @csrf
                                <select name="status" class="form-select form-select-sm">
                                    <option value="Pending"  @if($application->status=='Pending') selected @endif>Pending</option>
                                    <option value="Approved" @if($application->status=='Approved') selected @endif>Approved</option>
                                    <option value="Rejected" @if($application->status=='Rejected') selected @endif>Rejected</option>
                                </select>

                                <input type="text" name="message" class="form-control form-control-sm" 
                                       value="{{ $application->message }}" placeholder="Add message">

                                <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
