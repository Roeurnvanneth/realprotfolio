<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_title'] ?? 'My Portfolio' }}</title>
    <meta name="description" content="{{ $settings['site_tagline'] ?? '' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>

    @include('partial.navbar')

    <main>
        @yield('content')
    </main>

    @include('partial.footer')

</body>
</html>
