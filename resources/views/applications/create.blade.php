@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm mx-auto rounded-4" style="max-width: 600px;">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h4 class="mb-0">
                <i class="bi bi-file-earmark-text me-2"></i>
                Apply for: <strong>{{ $job->title }}</strong>
            </h4>
        </div>
        <div class="card-body p-4">

            <form action="{{ route('applications.store', $job) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-link-45deg me-1"></i> Your Resume Link
                    </label>
                    <input type="url" name="resume_link" class="form-control @error('resume_link') is-invalid @enderror" 
                           value="{{ old('resume_link') }}" placeholder="Paste your resume link here">
                    @error('resume_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg shadow-sm">
                        <i class="bi bi-send-fill me-1"></i> Submit Application
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
