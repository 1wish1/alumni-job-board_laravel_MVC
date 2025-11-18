@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">{{ isset($job) ? 'Edit Job' : 'Post New Job' }}</h4>
                </div>
                <div class="card-body p-4">

                    <form action="{{ isset($job) ? route('jobs.update', $job) : route('jobs.store') }}" method="POST">
                        @csrf
                        @if(isset($job)) @method('PUT') @endif

                        <!-- Job Title -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Job Title</label>
                            <div class="input-group">
                                <span class="input-group-text">💼</span>
                                <input type="text" name="title" 
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ $job->title ?? old('title') }}" placeholder="Enter job title">
                            </div>
                            @error('title') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <div class="input-group">
                                <span class="input-group-text">📝</span>
                                <textarea name="description" 
                                          class="form-control @error('description') is-invalid @enderror"
                                          rows="4" placeholder="Enter job description">{{ $job->description ?? old('description') }}</textarea>
                            </div>
                            @error('description') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="row mb-3">
                            <!-- Company Name -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Company Name</label>
                                <div class="input-group">
                                    <span class="input-group-text">🏢</span>
                                    <input type="text" name="company_name" 
                                           class="form-control @error('company_name') is-invalid @enderror"
                                           value="{{ $job->company_name ?? old('company_name') }}" placeholder="Company name">
                                </div>
                                @error('company_name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Location</label>
                                <div class="input-group">
                                    <span class="input-group-text">📍</span>
                                    <input type="text" name="location" 
                                        class="form-control @error('location') is-invalid @enderror"
                                        value="{{ $job->location ?? old('location') }}" placeholder="Job location">
                                </div>
                                @error('location') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                        </div>

                        <!-- Job Type -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Job Type</label>
                            <div class="input-group">
                                <span class="input-group-text">⏱️</span>
                                <input type="text" name="job_type" 
                                    class="form-control @error('job_type') is-invalid @enderror"
                                    value="{{ $job->job_type ?? old('job_type') }}" placeholder="Full-time, Part-time, etc.">
                            </div>
                            @error('job_type') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>


                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm">
                                {{ isset($job) ? 'Update Job' : 'Post Job' }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
