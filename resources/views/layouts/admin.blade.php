<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — {{ $title ?? 'Dashboard' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="admin-wrap">
    <aside class="admin-sidebar">
        <div class="brand">Portfolio<span>.</span> Admin</div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.about.edit') }}" class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}">About</a>
            <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">Skills</a>
            <a href="{{ route('admin.experiences.index') }}" class="{{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">Experience</a>
            <a href="{{ route('admin.education.index') }}" class="{{ request()->routeIs('admin.education.*') ? 'active' : '' }}">Education</a>
            <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Categories</a>
            <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">Testimonials</a>
            <a href="{{ route('admin.contact_messages.index') }}" class="{{ request()->routeIs('admin.contact_messages.*') ? 'active' : '' }}">Messages</a>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Settings</a>
        </nav>
        <div class="sidebar-foot">
            <a href="{{ url('/') }}" target="_blank" style="color:rgba(246,243,236,0.6); font-family: var(--font-mono); font-size:12px; display:block; margin-bottom:10px;">View Site ↗</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </aside>

    <div class="admin-main">
        <div class="admin-topbar">
            <h1>{{ $title ?? 'Dashboard' }}</h1>
            <div style="font-family: var(--font-mono); font-size:13px; color: var(--ink-soft);">{{ auth()->user()->name ?? '' }}</div>
        </div>
        <div class="admin-content">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
