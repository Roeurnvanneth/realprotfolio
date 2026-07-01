<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=IBM+Plex+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="login-wrap">
    <div class="login-card">
        <div class="login-icon">P</div>
        <h1>Welcome back</h1>
        <p class="sub">Sign in to manage your portfolio content.</p>

        @if($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="you@example.com">
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <div class="field check">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" style="margin:0; font-weight:400;">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
</body>
</html>
