@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

    <div class="card shadow p-4 mt-0" style="width: 420px; border-radius: 12px;">
        <h3 class="text-center mb-4 fw-bold">{{ __('Login') }}</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <div class="input-group">
                    <span class="input-group-text">📧</span>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Enter your email">
                </div>
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>      

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <div class="input-group">
                    <span class="input-group-text">🔒</span>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required placeholder="Enter your password">
                </div>
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                           id="remember" name="remember"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                🔑 Login
            </button>

            <div class="text-center mt-3">
                <small>Don't have an account?
                    <a href="{{ route('register') }}">Register</a>
                </small>
            </div>
        </form>
    </div>

</div>
@endsection
