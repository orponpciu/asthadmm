<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Dynamic SEO --}}
    <title>{{ $service->seo_title ?? $service->title }}</title>
    <meta name="description" content="{{ $service->seo_description }}">
    @if(!empty($service->seo_keywords))
        <meta name="keywords" content="{{ implode(', ', $service->seo_keywords) }}">
    @endif
    
    <!-- Google Fonts for Modern Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Your Global CSS -->
    @include('frontend.home.css')

    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/service-details.css') }}">
</head>
<body>

    <!-- Your Navigation -->
    @include('frontend.home.nav')

    <!-- Floating Social Icons -->
    <div class="floating-socials">
        <div>in</div>
        <div>ig</div>
        <div>fb</div>
    </div>

    @foreach ($service->content as $block)
        
        {{-- SECTION: HERO --}}
        @if ($block['type'] === 'hero')
            <header class="hero">
                <div id="particles-js" data-color="{{ $block['data']['particle_color'] ?? '#e3003a' }}"></div>
                <div class="container">
                    <div class="hero-content">
                        <h1>{{ $block['data']['heading'] }}</h1>
                        <p>{{ $block['data']['subheading'] }}</p>
                        @if(!empty($block['data']['button_text']))
                            <a href="{{ $block['data']['button_url'] ?? '#' }}" class="btn-red">{{ $block['data']['button_text'] }}</a>
                        @endif
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('storage/' . $block['data']['image']) }}" alt="{{ $block['data']['heading'] }}">
                    </div>
                </div>
            </header>
        @endif

        {{-- SECTION: FEATURE BLOCKS --}}
        @if ($block['type'] === 'feature_block')
            <main class="page-sections">
                <div class="container">
                    <div class="feature-block {{ $block['data']['is_reversed'] ? 'reverse' : '' }}">
                        <div class="text-content">
                            @if(!empty($block['data']['sub_title']))
                                <span class="sub-title">{{ $block['data']['sub_title'] }}</span>
                            @endif
                            <h2>{{ $block['data']['title'] }}</h2>
                            <p>{{ $block['data']['description'] }}</p>
                            
                            @if(!empty($block['data']['points']))
                                <ul>
                                    @foreach($block['data']['points'] as $point)
                                        <li>{{ $point['item'] }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if(!empty($block['data']['btn_text']))
                                <a href="{{ $block['data']['btn_link'] ?? '#' }}" class="btn-black">{{ $block['data']['btn_text'] }}</a>
                            @endif
                        </div>
                        <div class="image-content">
                            <img src="{{ asset('storage/' . $block['data']['image']) }}" alt="{{ $block['data']['title'] }}">
                        </div>
                    </div>
                </div>
            </main>
        @endif

        {{-- SECTION: MID BANNER --}}
        @if ($block['type'] === 'mid_banner')
            <section class="mid-banner" 
                style="background: @if($block['data']['bg_image']) url('{{ asset('storage/' . $block['data']['bg_image']) }}') @else url('https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=1974&auto=format&fit=crop') @endif center/cover;">
                <div class="container">
                    <h2>{{ $block['data']['title'] }}</h2>
                    <p>{{ $block['data']['description'] }}</p>
                    <br>
                    @if(!empty($block['data']['btn_text']))
                        <a href="{{ $block['data']['btn_link'] ?? '#' }}" class="btn-red">{{ $block['data']['btn_text'] }}</a>
                    @endif
                </div>
            </section>
        @endif

        {{-- SECTION: FAQ --}}
        @if ($block['type'] === 'faq')
            <section class="faq-section">
                <div class="container faq-container">
                    <div class="faq-title">
                        <h2>{!! str_replace(' ', '<br>', $block['data']['section_title'] ?? 'FREQUENTLY ASKED QUESTIONS') !!}</h2>
                    </div>
                    <div class="faq-list">
                        @foreach($block['data']['questions'] as $faq)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    {{ $faq['question'] }} <span>+</span>
                                </div>
                                <div class="accordion-content">
                                    <p>{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- SECTION: PROMISES --}}
        @if ($block['type'] === 'promises')
            <section class="promises container">
                <h2>{{ $block['data']['section_title'] ?? 'WE PROMISE' }}</h2>
                <div class="promises-grid">
                    @foreach($block['data']['cards'] as $card)
                        <div class="promise-card">
                            <h4>{{ $card['title'] }}</h4>
                            <p>{{ $card['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    @endforeach

    <!-- Your Footer -->
    @include('frontend.home.footer')
    
    <!-- Particles.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    
    <!-- Your Scripts -->
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>

    {{-- Dynamic Particle Initialization --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const particleEl = document.getElementById('particles-js');
            if (particleEl && typeof particlesJS !== 'undefined') {
                const pColor = particleEl.getAttribute('data-color') || '#e3003a';
                particlesJS("particles-js", {
                    "particles": {
                        "number": { "value": 50, "density": { "enable": true, "value_area": 800 } },
                        "color": { "value": pColor },
                        "shape": { "type": "circle" },
                        "opacity": { "value": 0.4, "random": true },
                        "size": { "value": 4, "random": true },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": pColor,
                            "opacity": 0.3,
                            "width": 1
                        },
                        "move": { "enable": true, "speed": 1.5, "direction": "none", "random": true, "out_mode": "out" }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": { "onhover": { "enable": true, "mode": "grab" }, "onclick": { "enable": true, "mode": "push" }, "resize": true },
                        "modes": { "grab": { "distance": 200, "line_linked": { "opacity": 0.6 } }, "push": { "particles_nb": 3 } }
                    },
                    "retina_detect": true
                });
            }
        });
    </script>
</body>
</html>