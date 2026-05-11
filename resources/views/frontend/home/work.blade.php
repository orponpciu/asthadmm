<section class="portfolio-section" id="portfolio">
    <div class="tech-grid-wrapper">
        <div class="tech-grid-bg"></div>
    </div>
    
    <div class="port-orb port-orb-pink"></div>
    <div class="port-orb port-orb-blue"></div>

    {{-- 1. DATA STORE: Pass Laravel Data to JS --}}
    <script id="portfolio-data" type="application/json">
        {!! json_encode($portfolios->map(function($item) {
            return [
                'title' => $item->title,
                'description' => $item->description,
                'tagline' => $item->tagline,
                'hero_image' => asset('storage/' . $item->hero_image),
                'url' => route('work.details', $item->slug),
                'stats' => $item->stats // This is the JSON array from Filament
            ];
        })) !!}
    </script>

    <div class="portfolio-container">
        <div class="portfolio-content">
            <h4 class="section-subtitle">OUR WORK</h4>
            
            <div id="left-slide-wrapper">
                {{-- These IDs remain the same so JS can inject content --}}
                <h2 class="section-title" id="dynamic-title">
                    {{ $portfolios[0]->title ?? 'Search Engine <span>Dominance</span>' }}
                </h2>
                <p class="section-desc" id="dynamic-desc">
                    {{ $portfolios[0]->description ?? '' }}
                </p>

                <div class="case-study-stats" id="stats-container">
                    {{-- Stats will be injected here by JS --}}
                </div>

                <a href="{{ route('work.details', $portfolios[0]->slug ?? '#') }}" class="show-more-btn" id="dynamic-link">Show More</a>
            </div>

            <div class="slider-controls">
                <button class="slider-btn prev-btn" id="prevBtn">←</button>
                <button class="slider-btn next-btn" id="nextBtn">→</button>
            </div>
        </div>

        <div class="portfolio-showcase">
            <div class="mockup-wrapper" id="tilt-mockup">
                
                <div class="glass-dashboard">
                    <div class="browser-header">
                        <span class="dot red"></span>
                        <span class="dot yellow"></span>
                        <span class="dot green"></span>
                        <div class="url-bar" id="dynamic-tagline">{{ $portfolios[0]->tagline ?? '' }}</div>
                    </div>
                    <div class="dashboard-img">
                        <img id="dynamic-img" src="{{ asset('storage/' . ($portfolios[0]->hero_image ?? '')) }}" alt="Case Study">
                        <div class="img-overlay"></div>
                    </div>
                </div>

                <div class="floating-element float-search">
                    <div class="search-input">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <span id="dynamic-search-text">{{ $portfolios[0]->title ?? '' }}</span>
                    </div>
                    <div class="search-btn">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="white"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    </div>
                </div>

                <div class="floating-element float-badge">
                    <div class="badge-ribbon">
                        <span class="hash">#</span>1
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>