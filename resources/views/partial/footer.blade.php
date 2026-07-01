<footer class="site-footer">
    <div class="container">
        {{ $settings['footer_text'] ?? ('© '.date('Y').' '.($settings['site_title'] ?? 'My Portfolio')) }}
        &nbsp;·&nbsp;
        <a href="{{ route('admin.login') }}">Admin</a>
    </div>
</footer>
