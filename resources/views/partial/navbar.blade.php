<header class="navbar">
    <div class="container">
        <a href="{{ url('/') }}" class="brand">{{ $settings['site_title'] ?? 'Portfolio' }}<span>.</span></a>
        <button class="nav-toggle" onclick="document.getElementById('main-nav').classList.toggle('open')">&#9776;</button>
        <nav id="main-nav">
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#experience">Experience</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
