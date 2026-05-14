<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Dynamic SEO --}}
    <title>{{ $service->meta_title ?? $service->title }}</title>
    <meta name="description" content="{{ $service->meta_description ?? '' }}">
    
    @if(!empty($service->focus_keywords))
        <meta name="keywords" content="{{ is_array($service->focus_keywords) ? implode(', ', $service->focus_keywords) : $service->focus_keywords }}">
    @endif
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    @include('frontend.home.css')

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/service-details.css') }}">
</head>
<body>

    @include('frontend.home.nav')

    <div class="floating-socials">
        <div>in</div>
        <div>ig</div>
        <div>fb</div>
    </div>

    <main class="service-main-wrapper">
        
        <div class="service-page-header">
            <div class="container">
                <h1>{{ $service->title }}</h1>
            </div>
        </div>

        {{-- THE FIX: Safe loop that checks both common Filament builder column names --}}
        @php
            $blocks = $service->page_sections ?? $service->content ?? [];
        @endphp

        @if(is_array($blocks) || is_iterable($blocks))
            @foreach ($blocks as $block)
                
                {{-- HERO --}}
                @if ($block['type'] === 'hero')
                    <header class="hero">
                        <div id="particles-js" data-color="{{ $block['data']['particle_color'] ?? '#e3003a' }}"></div>
                        <div class="container">
                            <div class="hero-content">
                                <h2>{{ $block['data']['heading'] ?? '' }}</h2>
                                <p>{{ $block['data']['subheading'] ?? '' }}</p>
                                @if(!empty($block['data']['button_text']))
                                    <a href="{{ $block['data']['button_url'] ?? '#' }}" class="btn-red">{{ $block['data']['button_text'] }}</a>
                                @endif
                            </div>
                            @if(!empty($block['data']['image']))
                            <div class="hero-image">
                                <img src="{{ asset('storage/' . $block['data']['image']) }}" alt="Hero Image">
                            </div>
                            @endif
                        </div>
                    </header>
                @endif

                {{-- FEATURE BLOCKS --}}
                @if ($block['type'] === 'feature_block')
                    <section class="page-sections">
                        <div class="container">
                            <div class="feature-block {{ !empty($block['data']['is_reversed']) ? 'reverse' : '' }}">
                                <div class="text-content">
                                    @if(!empty($block['data']['sub_title']))
                                        <span class="sub-title">{{ $block['data']['sub_title'] }}</span>
                                    @endif
                                    <h2>{{ $block['data']['title'] ?? '' }}</h2>
                                    <p>{{ $block['data']['description'] ?? '' }}</p>
                                    
                                    @if(!empty($block['data']['points']))
                                        <ul>
                                            @foreach($block['data']['points'] as $point)
                                                <li>{{ is_array($point) ? ($point['item'] ?? '') : $point }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @if(!empty($block['data']['btn_text']))
                                        <a href="{{ $block['data']['btn_link'] ?? '#' }}" class="btn-black">{{ $block['data']['btn_text'] }}</a>
                                    @endif
                                </div>
                                @if(!empty($block['data']['image']))
                                <div class="image-content">
                                    <img src="{{ asset('storage/' . $block['data']['image']) }}" alt="Feature Image">
                                </div>
                                @endif
                            </div>
                        </div>
                    </section>
                @endif

                {{-- MID BANNER --}}
                @if ($block['type'] === 'mid_banner')
                    <section class="mid-banner" 
                        style="background: @if(!empty($block['data']['bg_image'])) url('{{ asset('storage/' . $block['data']['bg_image']) }}') @else url('https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=1974&auto=format&fit=crop') @endif center/cover;">
                        <div class="container">
                            <h2>{{ $block['data']['title'] ?? '' }}</h2>
                            <p>{{ $block['data']['description'] ?? '' }}</p>
                            <br>
                            @if(!empty($block['data']['btn_text']))
                                <a href="{{ $block['data']['btn_link'] ?? '#' }}" class="btn-red">{{ $block['data']['btn_text'] }}</a>
                            @endif
                        </div>
                    </section>
                @endif

                {{-- FAQ --}}
                @if ($block['type'] === 'faq')
                    <section class="faq-section">
                        <div class="container faq-container">
                            <div class="faq-title">
                                <h2>{!! str_replace(' ', '<br>', $block['data']['section_title'] ?? 'FREQUENTLY ASKED QUESTIONS') !!}</h2>
                            </div>
                            <div class="faq-list">
                                @if(!empty($block['data']['questions']))
                                    @foreach($block['data']['questions'] as $faq)
                                        <div class="accordion-item">
                                            <div class="accordion-header">
                                                {{ $faq['question'] ?? '' }} <span>+</span>
                                            </div>
                                            <div class="accordion-content">
                                                <p>{{ $faq['answer'] ?? '' }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </section>
                @endif

                {{-- PROMISES --}}
                @if ($block['type'] === 'promises')
                    <section class="promises container">
                        <h2>{{ $block['data']['section_title'] ?? 'WE PROMISE' }}</h2>
                        <div class="promises-grid">
                            @if(!empty($block['data']['cards']))
                                @foreach($block['data']['cards'] as $card)
                                    <div class="promise-card">
                                        <h4>{{ $card['title'] ?? '' }}</h4>
                                        <p>{{ $card['description'] ?? '' }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </section>
                @endif

            @endforeach
        @endif
    </main>

    @include('frontend.home.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="{{ asset('assets/frontend/js/service-details.js') }}"></script>

</body>
</html>