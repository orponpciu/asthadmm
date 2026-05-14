@php
    // Fetch the settings from the database
    $settings = \App\Models\SiteSetting::first() ?? new \App\Models\SiteSetting();
@endphp

@if($settings->favicon)
    <link rel="icon" href="{{ Storage::url($settings->favicon) }}" type="image/x-icon">
@endif

<canvas id="canvas-bg"></canvas>

<nav>
    <div class="logo-container">
        <a href="/">
            @if($settings->logo)
                <img src="{{ Storage::url($settings->logo) }}" alt="Website Logo" class="logo-img">
            @else
                <img src="{{ asset('img/logo.png') }}" alt="ASTHA Logo" class="logo-img">
            @endif
        </a>
    </div>
    
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    
    <div class="nav-wrapper" id="nav-wrapper">
        <ul class="nav-links">
            @if($settings->nav_links && count($settings->nav_links) > 0)
                @foreach($settings->nav_links as $link)
                    <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                @endforeach
            @else
                <li><a href="#">About</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Case Studies</a></li>
                <li><a href="#">Insights</a></li>
            @endif
        </ul>
        
        <a href="{{ $settings->cta_link ?? '#' }}" style="text-decoration: none;">
            <button class="btn-say-hello">{{ $settings->cta_text ?? 'CALL NOW ➔' }}</button>
        </a>
    </div>
</nav>