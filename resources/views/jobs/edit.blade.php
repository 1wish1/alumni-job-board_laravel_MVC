@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-warning text-dark rounded-top-4">
                    <h4 class="mb-0">Edit Job</h4>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('jobs.update', $job) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Job Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $job->title) }}" placeholder="Enter job title">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                      rows="4" placeholder="Enter job description">{{ old('description', $job->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Company Name</label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror"
                                       value="{{ old('company_name', $job->company_name) }}" placeholder="Company name">
                                @error('company_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Location</label>
                                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                                       value="{{ old('location', $job->location) }}" placeholder="Job location">
                                @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Job Type</label>
                            <input type="text" name="job_type" class="form-control @error('job_type') is-invalid @enderror"
                                   value="{{ old('job_type', $job->job_type) }}" placeholder="Full-time, Part-time, etc.">
                            @error('job_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning px-4 py-2 shadow-sm">
                                Update Job
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
