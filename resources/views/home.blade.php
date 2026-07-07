@extends('layouts.app')

@section('content')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    /* =========================================
       PORTFOLIO THEME — UPDATED ABOUT SECTION
       ========================================= */
    :root {
        --bg: #ffffff;
        --bg-warm: #fafaf9;
        --bg-cream: #f5f5f0;
        --ink: #1c1917;
        --ink-light: #78716c;
        --accent: #8b9a6d;
        --accent-dark: #6b7a4d;
        --border: #e7e5e4;
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        --font-mono: 'JetBrains Mono', 'Fira Code', monospace;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

    .portfolio-wrap * { margin: 0; padding: 0; box-sizing: border-box; }
    .portfolio-wrap {
        font-family: var(--font-sans);
        color: var(--ink);
        background: var(--bg);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        overflow-x: hidden;
    }

    .pf-container { max-width: 1140px; margin: 0 auto; padding: 0 24px; }
    
    .pf-eyebrow {
        font-family: var(--font-mono);
        font-size: 12px;
        font-weight: 500;
        color: var(--accent-dark);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 12px;
        display: block;
    }

    .pf-section-head { margin-bottom: 64px; }
    .pf-section-head h2 {
        font-size: clamp(32px, 4vw, 48px);
        font-weight: 800;
        letter-spacing: -1.5px;
        line-height: 1.1;
        color: var(--ink);
    }

    /* Buttons */
    .pf-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 28px;
        border-radius: var(--radius-sm);
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: var(--transition);
        cursor: pointer;
        border: none;
        gap: 8px;
    }
    .pf-btn-primary {
        background: var(--ink);
        color: #fff;
    }
    .pf-btn-primary:hover { background: #292524; transform: translateY(-2px); box-shadow: var(--shadow-lg); }
    .pf-btn-outline {
        background: transparent;
        color: var(--ink);
        border: 1px solid var(--border);
    }
    .pf-btn-outline:hover { border-color: var(--ink); background: var(--bg-warm); }
    .pf-btn-dark { 
        background: var(--ink); 
        color: white; 
        padding: 12px 24px;
        font-size: 13px;
    }
    .pf-btn-dark:hover { background: #44403c; }

    /* Cards */
    .pf-card {
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        padding: 32px;
        transition: var(--transition);
    }
    .pf-card:hover {
        border-color: #d6d3d1;
        box-shadow: var(--shadow-lg);
        transform: translateY(-4px);
    }

    /* =========================================
       HERO
       ========================================= */
    .pf-hero {
        padding: 160px 0 100px;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .pf-hero-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 80px;
        align-items: center;
    }
    .pf-hero h1 {
        font-size: clamp(42px, 5vw, 68px);
        line-height: 1.05;
        letter-spacing: -2.5px;
        margin-bottom: 24px;
        font-weight: 800;
    }
    .pf-hero h1 .pf-accent {
        color: var(--accent-dark);
        display: block;
        margin-top: 8px;
    }
    .pf-hero .pf-lead {
        font-size: 18px;
        color: var(--ink-light);
        max-width: 480px;
        margin-bottom: 40px;
        line-height: 1.7;
    }
    .pf-hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }
    .pf-hero-photo {
        position: relative;
        justify-self: end;
    }
    .pf-hero-photo img {
        width: 100%;
        max-width: 420px;
        height: 520px;
        object-fit: cover;
        border-radius: var(--radius-lg);
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15);
    }

    /* =========================================
       ABOUT — NEW UI/UX LAYOUT
       ========================================= */
    .pf-block { padding: 100px 0; }
    .pf-block-alt { background: var(--bg-warm); }

    .pf-about-section {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 60px;
        align-items: start;
    }

    /* Left: Photo */
    .pf-about-photo {
        position: relative;
    }
    .pf-about-photo img {
        width: 100%;
        height: 520px;
        object-fit: cover;
        border-radius: var(--radius-lg);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.15);
    }

    /* Right: Content */
    .pf-about-content {
        padding-top: 20px;
    }
    .pf-about-content .pf-eyebrow {
        color: var(--accent-dark);
        font-size: 11px;
        letter-spacing: 3px;
        margin-bottom: 16px;
    }
    .pf-about-content h2 {
        font-size: clamp(32px, 4vw, 44px);
        font-weight: 800;
        letter-spacing: -1.5px;
        margin-bottom: 28px;
        color: var(--ink);
    }
    .pf-about-bio {
        font-size: 15px;
        line-height: 1.8;
        color: var(--ink-light);
        margin-bottom: 36px;
    }

    /* Info Grid */
    .pf-info-grid {
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin-bottom: 40px;
    }
    .pf-info-row {
        display: flex;
        align-items: baseline;
        gap: 12px;
    }
    .pf-info-label {
        font-size: 14px;
        font-weight: 600;
        color: var(--ink);
        min-width: 110px;
        flex-shrink: 0;
    }
    .pf-info-value {
        font-size: 14px;
        color: var(--accent-dark);
        font-weight: 500;
    }

    /* Interests */
    .pf-interests {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }
    .pf-interest-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        transition: var(--transition);
        cursor: default;
    }
    .pf-interest-item:hover {
        border-color: var(--accent);
        background: var(--bg-warm);
        transform: translateY(-2px);
    }
    .pf-interest-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--bg-cream);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
    .pf-interest-text {
        font-size: 14px;
        font-weight: 500;
        color: var(--ink);
    }

    /* =========================================
       SKILLS
       ========================================= */
    .pf-skills-grid { display: flex; flex-direction: column; gap: 28px; }
    .pf-skill-row { width: 100%; }
    .pf-skill-top {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 15px;
        font-weight: 600;
        color: var(--ink);
    }
    .pf-skill-top .pf-cat { color: var(--ink-light); font-weight: 400; margin-left: 6px; font-size: 14px; }
    .pf-bar-track {
        width: 100%;
        height: 6px;
        background: var(--border);
        border-radius: 99px;
        overflow: hidden;
    }
    .pf-bar-fill {
        height: 100%;
        background: var(--accent);
        border-radius: 99px;
        width: 0;
        transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* =========================================
       TIMELINE
       ========================================= */
    .pf-timeline-cols {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
    }
    .pf-timeline-title {
        font-size: 14px;
        font-family: var(--font-mono);
        text-transform: uppercase;
        color: var(--ink-light);
        margin-bottom: 32px;
        font-weight: 500;
        letter-spacing: 1px;
    }
    .pf-timeline {
        position: relative;
        padding-left: 32px;
    }
    .pf-timeline::before {
        content: '';
        position: absolute;
        left: 0; top: 8px; bottom: 0;
        width: 1px;
        background: var(--border);
    }
    .pf-timeline-item {
        position: relative;
        padding-bottom: 48px;
    }
    .pf-timeline-item:last-child { padding-bottom: 0; }
    .pf-timeline-item::before {
        content: '';
        position: absolute;
        left: -36px;
        top: 6px;
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: var(--bg);
        border: 2px solid var(--accent);
        transition: var(--transition);
    }
    .pf-timeline-item:hover::before {
        background: var(--accent);
        transform: scale(1.2);
    }
    .pf-t-date {
        font-family: var(--font-mono);
        font-size: 12px;
        color: var(--accent-dark);
        margin-bottom: 8px;
        display: block;
        font-weight: 500;
    }
    .pf-timeline-item h3 { 
        font-size: 18px; 
        margin-bottom: 6px; 
        font-weight: 700;
        letter-spacing: -0.3px;
    }
    .pf-t-sub {
        font-size: 14px;
        color: var(--ink-light);
        margin-bottom: 14px;
        font-weight: 500;
    }
    .pf-timeline-item p { 
        font-size: 15px; 
        color: var(--ink-light); 
        line-height: 1.7; 
    }

    /* =========================================
       SERVICES
       ========================================= */
    .pf-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }
    .pf-service-card { text-align: left; }
    .pf-service-card .pf-icon {
        width: 48px;
        height: 48px;
        background: var(--bg-cream);
        color: var(--accent-dark);
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 24px;
        font-weight: 700;
    }
    .pf-service-card h3 { font-size: 18px; margin-bottom: 10px; font-weight: 700; }
    .pf-service-card p { font-size: 15px; color: var(--ink-light); line-height: 1.7; }

    /* =========================================
       PROJECTS
       ========================================= */
    .pf-projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
        gap: 32px;
    }
    .pf-project-card {
        padding: 0;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        transition: var(--transition);
    }
    .pf-project-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.12);
        border-color: #d6d3d1;
    }
    .pf-project-card .pf-thumb {
        width: 100%;
        height: 220px;
        overflow: hidden;
        position: relative;
        background: var(--bg-warm);
    }
    .pf-project-card .pf-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .pf-project-card:hover .pf-thumb img { transform: scale(1.08); }
    .pf-featured-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: var(--accent-dark);
        color: white;
        padding: 6px 14px;
        border-radius: 99px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }
    .pf-project-card .pf-body { padding: 28px; }
    .pf-project-card .pf-tag {
        font-family: var(--font-mono);
        font-size: 11px;
        color: var(--accent-dark);
        text-transform: uppercase;
        margin-bottom: 10px;
        font-weight: 500;
        letter-spacing: 1px;
    }
    .pf-project-card h3 { font-size: 20px; margin-bottom: 10px; font-weight: 700; letter-spacing: -0.3px; }
    .pf-project-card .pf-desc { 
        font-size: 15px; 
        color: var(--ink-light); 
        margin-bottom: 18px; 
        line-height: 1.6; 
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .pf-project-card .pf-stack {
        font-family: var(--font-mono);
        font-size: 12px;
        color: var(--ink-light);
        background: var(--bg-warm);
        padding: 6px 12px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 20px;
        border: 1px solid var(--border);
    }
    .pf-project-card .pf-links { display: flex; gap: 20px; }
    .pf-project-card .pf-links a {
        font-size: 14px;
        font-weight: 600;
        color: var(--ink);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: color 0.2s;
    }
    .pf-project-card .pf-links a:hover { color: var(--accent-dark); }

    /* =========================================
       TESTIMONIALS
       ========================================= */
    .pf-testimonial-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
    }
    .pf-testimonial-card { display: flex; flex-direction: column; }
    .pf-testimonial-card .pf-stars { 
        color: #f59e0b; 
        font-size: 16px; 
        margin-bottom: 20px; 
        letter-spacing: 2px; 
    }
    .pf-testimonial-card .pf-msg {
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 28px;
        color: var(--ink);
        font-style: italic;
        flex-grow: 1;
    }
    .pf-testimonial-card .pf-client {
        display: flex;
        align-items: center;
        gap: 16px;
        border-top: 1px solid var(--border);
        padding-top: 24px;
        margin-top: auto;
    }
    .pf-testimonial-card .pf-client img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--border);
    }
    .pf-testimonial-card .pf-client b { display: block; font-size: 14px; margin-bottom: 2px; font-weight: 700; }
    .pf-testimonial-card .pf-client span { font-size: 13px; color: var(--ink-light); font-weight: 500; }

    /* =========================================
       CONTACT
       ========================================= */
    .pf-contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 80px;
        align-items: start;
    }
    .pf-contact-info p { 
        font-size: 17px; 
        color: var(--ink-light); 
        margin-bottom: 40px; 
        line-height: 1.7; 
    }
    .pf-contact-info .pf-row {
        padding: 18px 0;
        border-bottom: 1px solid var(--border);
        font-size: 15px;
        color: var(--ink-light);
    }
    .pf-contact-info .pf-row b { 
        color: var(--ink); 
        display: block; 
        margin-bottom: 4px; 
        font-size: 12px; 
        text-transform: uppercase; 
        letter-spacing: 1px; 
        font-weight: 600;
    }

    /* Forms */
    .pf-field { margin-bottom: 24px; }
    .pf-field label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--ink-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .pf-field input,
    .pf-field textarea {
        width: 100%;
        padding: 14px 18px;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        font-family: var(--font-sans);
        font-size: 15px;
        background: var(--bg);
        color: var(--ink);
        transition: var(--transition);
    }
    .pf-field input:focus,
    .pf-field textarea:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(139, 154, 109, 0.1);
    }
    .pf-field textarea { min-height: 140px; resize: vertical; }

    .pf-alert-success {
        background: #f0fdf4;
        color: #166534;
        padding: 16px;
        border-radius: var(--radius-sm);
        margin-bottom: 24px;
        font-size: 14px;
        border: 1px solid #bbf7d0;
        font-weight: 500;
    }
    .pf-alert-error {
        background: #fef2f2;
        color: #991b1b;
        padding: 16px;
        border-radius: var(--radius-sm);
        margin-bottom: 24px;
        font-size: 14px;
        border: 1px solid #fecaca;
        font-weight: 500;
    }

    /* =========================================
       ANIMATIONS
       ========================================= */
    .pf-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .pf-reveal.pf-active {
        opacity: 1;
        transform: translateY(0);
    }

    /* =========================================
       RESPONSIVE
       ========================================= */
    @media (max-width: 968px) {
        .pf-hero-grid { grid-template-columns: 1fr; text-align: center; gap: 60px; }
        .pf-hero-photo { justify-self: center; order: -1; }
        .pf-hero-photo img { max-width: 300px; height: 380px; }
        .pf-hero-actions { justify-content: center; }
        
        .pf-about-section { grid-template-columns: 1fr; gap: 40px; }
        .pf-about-photo img { height: 400px; }
        .pf-about-content { padding-top: 0; }
        
        .pf-timeline-cols { grid-template-columns: 1fr; gap: 60px; }
        .pf-contact-grid { grid-template-columns: 1fr; gap: 60px; }
        .pf-projects-grid { grid-template-columns: 1fr; }
        .pf-section-head { margin-bottom: 48px; }
        .pf-block { padding: 80px 0; }
    }
    @media (max-width: 640px) {
        .pf-hero { padding: 140px 0 80px; }
        .pf-hero h1 { font-size: 36px; }
        .pf-timeline-cols { gap: 40px; }
        .pf-info-label { min-width: 90px; font-size: 13px; }
        .pf-info-value { font-size: 13px; }
        .pf-interests { gap: 12px; }
        .pf-interest-item { padding: 8px 14px; }
    }
</style>

<div class="portfolio-wrap">

{{-- ============ HERO ============ --}}
<section class="pf-hero">
    <div class="pf-container">
        <div class="pf-hero-grid">
            <div class="pf-hero-text pf-reveal">
                <div class="pf-eyebrow">FIG. 01 — INTRODUCTION</div>
                <h1>Hi, I'm {{ $about->name ?? 'Your Name' }}.<br><span class="pf-accent">{{ $about->title ?? 'Full-Stack Developer' }}</span></h1>
                <p class="pf-lead">{{ $settings['site_tagline'] ?? ($about->bio ?? 'I build clean, reliable web applications.') }}</p>
                <div class="pf-hero-actions">
                    <a href="#projects" class="pf-btn pf-btn-primary">View Projects</a>
                    <a href="#contact" class="pf-btn pf-btn-outline">Get In Touch</a>
                </div>
            </div>
            @if($about && $about->avatar)
            <div class="pf-hero-photo pf-reveal">
                <img 
                    src="{{ Storage::url($about->avatar) }}" 
                    alt="{{ $about->name }}"
                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($about->name) }}&size=420&background=8b9a6d&color=fff'"
                >
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ============ ABOUT — NEW UI/UX LAYOUT ============ --}}
<section id="about" class="pf-block">
    <div class="pf-container">
        <div class="pf-about-section">
            
            {{-- Left: Photo --}}
            <div class="pf-about-photo pf-reveal">
                @if($about && $about->avatar)
                    <img 
                        src="{{ Storage::url($about->avatar) }}" 
                        alt="{{ $about->name }}"
                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($about->name) }}&size=520&background=8b9a6d&color=fff'"
                    >
                @else
                    <img 
                        src="https://ui-avatars.com/api/?name={{ urlencode($about->name ?? 'Your Name') }}&size=520&background=8b9a6d&color=fff" 
                        alt="Profile Photo"
                    >
                @endif
            </div>

            {{-- Right: Content --}}
            <div class="pf-about-content pf-reveal">
                <div class="pf-eyebrow">MY INTRO</div>
                <h2>About Me</h2>
                
                <p class="pf-about-bio">
                    {{ $about->bio ?? 'I am a student majoring in Web and Mobile Application Development at the School of Business. I have gained valuable experience through projects, including creating an e-commerce website. I am a Full-Stack Developer capable of developing both websites and mobile applications. I am seeking opportunities to apply my skills. My strengths include problem-solving, adaptability, and a strong desire for professional growth.' }}
                </p>

                {{-- Info Grid --}}
                <div class="pf-info-grid">
                    @if($about?->name)
                    <div class="pf-info-row">
                        <span class="pf-info-label">Name:</span>
                        <span class="pf-info-value">{{ $about->name }}</span>
                    </div>
                    @endif
                    
                    {{-- You can add a 'dob' field to your About model, or remove this --}}
                    @if($about?->dob)
                    <div class="pf-info-row">
                        <span class="pf-info-label">Date of birth:</span>
                        <span class="pf-info-value">{{ $about->dob }}</span>
                    </div>
                    @endif
                    
                    @if($about?->address)
                    <div class="pf-info-row">
                        <span class="pf-info-label">Address:</span>
                        <span class="pf-info-value">{{ $about->address }}</span>
                    </div>
                    @endif
                    
                    @if($about?->email)
                    <div class="pf-info-row">
                        <span class="pf-info-label">Email:</span>
                        <span class="pf-info-value">{{ $about->email }}</span>
                    </div>
                    @endif
                    
                    @if($about?->phone)
                    <div class="pf-info-row">
                        <span class="pf-info-label">Phone:</span>
                        <span class="pf-info-value">{{ $about->phone }}</span>
                    </div>
                    @endif
                </div>

                {{-- Interests --}}
                <div class="pf-interests">
                    <div class="pf-interest-item">
                        <div class="pf-interest-icon">🎵</div>
                        <span class="pf-interest-text">Music</span>
                    </div>
                    <div class="pf-interest-item">
                        <div class="pf-interest-icon">✈️</div>
                        <span class="pf-interest-text">Travel</span>
                    </div>
                    <div class="pf-interest-item">
                        <div class="pf-interest-icon">🎬</div>
                        <span class="pf-interest-text">Movie</span>
                    </div>
                    <div class="pf-interest-item">
                        <div class="pf-interest-icon">⚽</div>
                        <span class="pf-interest-text">Sports</span>
                    </div>
                </div>

                {{-- Social + CV --}}
                <div style="margin-top: 32px; display: flex; gap: 16px; flex-wrap: wrap; align-items: center;">
                    <div class="pf-social-row" style="display: flex; gap: 20px;">
                        @if($about?->github)<a href="{{ $about->github }}" target="_blank" style="color: var(--ink-light); text-decoration: none; font-size: 14px; font-weight: 500;">GitHub</a>@endif
                        @if($about?->linkedin)<a href="{{ $about->linkedin }}" target="_blank" style="color: var(--ink-light); text-decoration: none; font-size: 14px; font-weight: 500;">LinkedIn</a>@endif
                        @if($about?->facebook)<a href="{{ $about->facebook }}" target="_blank" style="color: var(--ink-light); text-decoration: none; font-size: 14px; font-weight: 500;">Facebook</a>@endif
                        @if($about?->twitter)<a href="{{ $about->twitter }}" target="_blank" style="color: var(--ink-light); text-decoration: none; font-size: 14px; font-weight: 500;">Twitter</a>@endif
                    </div>
                    @if($about?->cv_file)
                        <a href="{{ asset('storage/'.$about->cv_file) }}" class="pf-btn pf-btn-dark" target="_blank" style="margin-left: auto;">Download CV</a>
                    @endif
                </div> 

            </div>
        </div>
    </div>
</section>

{{-- ============ SKILLS ============ --}}
@if($skills->count())
<section id="skills" class="pf-block pf-block-alt">
    <div class="pf-container">
        <div class="pf-section-head pf-reveal">
            <div class="pf-eyebrow">FIG. 03 — SKILLS</div>
            <h2>What I work with</h2>
        </div>
        <div class="pf-skills-grid pf-reveal">
            @foreach($skills as $skill)
                <div class="pf-skill-row">
                    <div class="pf-skill-top">
                        <span>{{ $skill->name }} @if($skill->category)<span class="pf-cat">/ {{ $skill->category }}</span>@endif</span>
                        <span>{{ $skill->percentage }}%</span>
                    </div>
                    <div class="pf-bar-track">
                        <div class="pf-bar-fill" data-width="{{ $skill->percentage }}"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ EXPERIENCE + EDUCATION ============ --}}
@if($experiences->count() || $education->count())
<section id="experience" class="pf-block">
    <div class="pf-container">
        <div class="pf-section-head pf-reveal">
            <div class="pf-eyebrow">FIG. 04 — EXPERIENCE &amp; EDUCATION</div>
            <h2>Where I've been</h2>
        </div>
        <div class="pf-timeline-cols">
            @if($experiences->count())
            <div class="pf-reveal">
                <h3 class="pf-timeline-title">Experience</h3>
                <div class="pf-timeline">
                    @foreach($experiences as $exp)
                        <div class="pf-timeline-item">
                            <span class="pf-t-date">{{ $exp->start_date?->format('M Y') }} — {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}</span>
                            <h3>{{ $exp->position }}</h3>
                            <div class="pf-t-sub">{{ $exp->company }}@if($exp->location) · {{ $exp->location }}@endif</div>
                            <p>{{ $exp->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            @if($education->count())
            <div class="pf-reveal">
                <h3 class="pf-timeline-title">Education</h3>
                <div class="pf-timeline">
                    @foreach($education as $edu)
                        <div class="pf-timeline-item">
                            <span class="pf-t-date">{{ $edu->start_date?->format('M Y') }} — {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}</span>
                            <h3>{{ $edu->degree }}</h3>
                            <div class="pf-t-sub">{{ $edu->school }}@if($edu->field_of_study) · {{ $edu->field_of_study }}@endif</div>
                            <p>{{ $edu->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

{{-- ============ SERVICES ============ --}}
@if($services->count())
<section id="services" class="pf-block pf-block-alt">
    <div class="pf-container">
        <div class="pf-section-head pf-reveal">
            <div class="pf-eyebrow">FIG. 05 — SERVICES</div>
            <h2>What I can do for you</h2>
        </div>
        <div class="pf-services-grid">
            @foreach($services as $service)
                <div class="pf-card pf-service-card pf-reveal">
                    <div class="pf-icon">{{ $service->icon ?? '◆' }}</div>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ PROJECTS ============ --}}
@if($projects->count())
<section id="projects" class="pf-block">
    <div class="pf-container">
        <div class="pf-section-head pf-reveal">
            <div class="pf-eyebrow">FIG. 06 — SELECTED WORK</div>
            <h2>Portfolio projects</h2>
        </div>
        <div class="pf-projects-grid">
            @foreach($projects as $project)
                <div class="pf-project-card pf-reveal">
                    @if($project->featured)<span class="pf-featured-badge">Featured</span>@endif
                    @if($project->image)
                        <div class="pf-thumb">
                            <img 
                                src="{{ Storage::url($project->image) }}" 
                                alt="{{ $project->title }}"
                                onerror="this.src='https://via.placeholder.com/600x400/e7e5e4/78716c?text=No+Image'"
                            >
                        </div>
                    @endif
                    <div class="pf-body">
                        <div class="pf-tag">{{ $project->category?->name ?? 'Project' }}</div>
                        <h3>{{ $project->title }}</h3>
                        <p class="pf-desc">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>
                        @if($project->technologies)<div class="pf-stack">{{ $project->technologies }}</div>@endif
                        <div class="pf-links">
                            @if($project->project_url)<a href="{{ $project->project_url }}" target="_blank">Live ↗</a>@endif
                            @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank">Code ↗</a>@endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ TESTIMONIALS ============ --}}
@if($testimonials->count())
<section class="pf-block pf-block-alt">
    <div class="pf-container">
        <div class="pf-section-head pf-reveal">
            <div class="pf-eyebrow">FIG. 07 — TESTIMONIALS</div>
            <h2>What people say</h2>
        </div>
        <div class="pf-testimonial-grid">
            @foreach($testimonials as $t)
                <div class="pf-card pf-testimonial-card pf-reveal">
                    <div class="pf-stars">{{ str_repeat('★', $t->rating) }}{{ str_repeat('☆', 5 - $t->rating) }}</div>
                    <p class="pf-msg">"{{ $t->message }}"</p>
                    <div class="pf-client">
                        @if($t->client_image)
                            <img 
                                src="{{ Storage::url($t->client_image) }}" 
                                alt="{{ $t->client_name }}"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($t->client_name) }}&background=f5f5f0&color=78716c'"
                            >
                        @else
                            <img 
                                src="https://ui-avatars.com/api/?name={{ urlencode($t->client_name) }}&background=f5f5f0&color=78716c" 
                                alt="{{ $t->client_name }}"
                            >
                        @endif
                        <div>
                            <b>{{ $t->client_name }}</b>
                            @if($t->client_position)<span>{{ $t->client_position }}</span>@endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ CONTACT ============ --}}
<section id="contact" class="pf-block">
    <div class="pf-container">
        <div class="pf-section-head pf-reveal">
            <div class="pf-eyebrow">FIG. 08 — CONTACT</div>
            <h2>Let's work together</h2>
        </div>
        <div class="pf-contact-grid">
            <div class="pf-contact-info pf-reveal">
                <p>Have a project in mind, or just want to say hello? Fill out the form and I'll get back to you.</p>
                @if($settings['contact_email'] ?? false)
                    <div class="pf-row"><b>Email</b> {{ $settings['contact_email'] }}</div>
                @endif
                @if($about?->phone)<div class="pf-row"><b>Phone</b> {{ $about->phone }}</div>@endif
                @if($about?->address)<div class="pf-row"><b>Location</b> {{ $about->address }}</div>@endif
            </div>

            <div class="pf-reveal">
                @if(session('status'))
                    <div class="pf-alert-success">{{ session('status') }}</div>
                @endif
                @if($errors->any())
                    <div class="pf-alert-error">Please check the form: {{ $errors->first() }}</div>
                @endif
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="pf-field">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Your name">
                    </div>
                    <div class="pf-field">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="your@email.com">
                    </div>
                    <div class="pf-field">
                        <label>Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Project inquiry">
                    </div>
                    <div class="pf-field">
                        <label>Message</label>
                        <textarea name="message" required placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="pf-btn pf-btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

</div>{{-- End portfolio-wrap --}}

<script>
    // Scroll Reveal Animation
    const pfObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('pf-active');
                
                // Animate skill bars
                const bars = entry.target.querySelectorAll('.pf-bar-fill');
                bars.forEach(bar => {
                    const width = bar.getAttribute('data-width');
                    if(width) bar.style.width = width + '%';
                });
            }
        });
    }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

    document.querySelectorAll('.pf-reveal').forEach(el => pfObserver.observe(el));
</script>

@endsection