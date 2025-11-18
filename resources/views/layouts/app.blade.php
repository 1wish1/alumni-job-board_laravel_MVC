<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Alumni Job Board</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Global Styles */
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f1f3f5;
            color: #343a40;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure full viewport height */
        }

        /* Navbar */
        .navbar-brand i {
            margin-right: 0.5rem;
        }

        .navbar .nav-link {
            font-weight: 500;
            transition: all 0.3s;
        }

        .navbar .nav-link:hover {
            color: #0d6efd;
        }

        .navbar .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .navbar-light {
            background-color: #fff !important;
        }

        /* Buttons */
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        /* Main Content */
        main {
            flex: 1; /* Allows footer to stay at bottom when content is short */
        }

        /* Cards for content */
        .card {
            border-radius: 0.75rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.1);
        }

        /* Footer */
        footer {
            background-color: #fff;
            padding: 1.5rem 0;
            text-align: center;
            border-top: 1px solid #dee2e6;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: auto; /* Push footer to bottom */
        }

        /* Utility */
        .text-primary-hover:hover {
            color: #0b5ed7 !important;
        }
    </style>
</head>
<body>

<div id="app">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="bi bi-briefcase-fill text-primary"></i> Alumni Job Board
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item ms-2"><a class="btn btn-primary text-white" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if(auth()->user()->role === 'alumni')
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('applications.index') }}">Applications</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif

                                @if(auth()->user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('jobs.create') }}">Post Jobs</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif

                                <li><a class="dropdown-item" href="{{ route('jobs.index') }}">Jobs</a></li>
                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-5 container">
        @yield('content')
    </main>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} Alumni Job Board. All Rights Reserved.</p>
        <p class="mb-0"><small>Powered by Laravel & Bootstrap</small></p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        