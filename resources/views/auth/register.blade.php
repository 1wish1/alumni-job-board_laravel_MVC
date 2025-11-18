@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">

    <div class="card shadow p-4" style="width: 460px; border-radius: 12px;">
        <h3 class="text-center mb-4 fw-bold">{{ __('Create Account') }}</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">{{ __('Full Name') }}</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" required autofocus
                       placeholder="Enter your full name">

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" required
                       placeholder="Enter your email">

                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required
                       placeholder="Create a password">

                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password"
                       class="form-control"
                       name="password_confirmation" required
                       placeholder="Confirm password">
            </div>

            <button type="submit" class="btn btn-success w-100 py-2">
                Register
            </button>

            <div class="text-center mt-3">
                <small>Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </small>
            </div>
        </form>
    </div>

</div>
@endsection
