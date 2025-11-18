@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">My Applications</h2>
    </div>

    @if($applications->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Job</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Message</th>
                        <th>Applied On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                        <tr>
                            <td>{{ $app->job->title }}</td>
                            <td>{{ $app->job->company_name }}</td>
                            <td>
                                @php
                                    // Set the background color class
                                    $statusBgClass = match($app->status) {
                                        'Pending' => 'warning',
                                        'Accepted' => 'success',
                                        'Rejected' => 'danger',
                                        default => 'secondary',
                                    };

                                    // Optional text color if needed
                                    $statusTextClass = $app->status === 'Pending' ? 'text-dark' : '';

                                    // Status icons
                                    $statusIcon = match($app->status) {
                                        'Pending' => '⏳',
                                        'Approved' => '✅',
                                        'Rejected' => '❌',
                                        default => 'ℹ️',
                                    };
                                @endphp
                                <span class="badge bg-{{ $statusBgClass }} {{ $statusTextClass }}">
                                    {{ $statusIcon }} {{ $app->status }}
                                </span>
                            </td>
                            <td>
                                @if($app->message)
                                    <small class="text-muted">{{ Str::limit($app->message, 50) }}</small>
                                @else
                                    <small class="text-muted">—</small>
                                @endif
                            </td>
                            <td>{{ $app->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">
            You have not applied for any jobs yet.
        </div>
    @endif

</div>
@endsection
