@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <!-- Centered row -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <!-- Main Card -->
            <div class="card shadow-sm rounded-4">

                <!-- Card Body -->
                <div class="card-body p-4">

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                            <div>{{ session('status') }}</div>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @auth
                        <!-- Logged-in Greeting -->
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                            <div>
                                <strong>Welcome, {{ Auth::user()->name }}!</strong><br>
                                You are logged in as 
                                <span class="badge bg-info text-dark">{{ Auth::user()->role }}</span>.
                            </div>
                        </div>

                        <!-- Quick Info Cards -->
                        <div class="row g-3 mt-3">

                            <div class="col-md-6">
                                <div class="card shadow-sm border-primary h-100">
                                    <div class="card-body text-center">
                                        <i class="bi bi-briefcase-fill fs-2 mb-2 text-primary"></i>
                                        <h6 class="card-title fw-bold">Explore Jobs</h6>
                                        <p class="card-text small mb-0">
                                            Check available jobs and apply for positions that match your skills.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm border-success h-100">
                                    <div class="card-body text-center">
                                        <i class="bi bi-person-lines-fill fs-2 mb-2 text-success"></i>
                                        <h6 class="card-title fw-bold">Update Profile</h6>
                                        <p class="card-text small mb-0">
                                            Keep your profile up to date to attract potential employers.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card shadow-sm border-info">
                                    <div class="card-body text-center">
                                        <i class="bi bi-journal-check fs-2 mb-2 text-info"></i>
                                        <h6 class="card-title fw-bold">Track Applications</h6>
                                        <p class="card-text small mb-0">
                                            Monitor the status of your applications under "My Applications".
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    @else
                        <!-- Guest Landing Section (Clean, no buttons) -->
                        <div class="card text-center shadow-sm p-4 mb-4" style="border-radius: 12px; background: linear-gradient(90deg, #6a11cb, #2575fc); color: white;">
                            <div class="card-body">
                                <i class="bi bi-rocket-fill fs-1 mb-3"></i>
                                <h4 class="card-title fw-bold">Welcome to Alumni Job Board!</h4>
                                <p class="card-text mb-0">
                                    Explore job opportunities, manage your applications, and stay connected with your alumni network.
                                </p>
                            </div>
                        </div>
                    @endauth

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
