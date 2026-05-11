<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio->title }} - Work Details</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    
    @include('frontend.home.css')
    
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/work-details.css') }}">
</head>
<body>

    @include('frontend.home.nav')

    <div class="container">
        
        <header class="hero animate-up">
            <div class="tagline">{{ $portfolio->tagline ?? 'Case Study' }}</div>
            
            {{-- Make the title uppercase to match your design --}}
            <h1>{!! nl2br(e(strtoupper($portfolio->title))) !!}</h1>
            
            <div class="services-tags">
                @if($portfolio->services_tags)
                    @foreach($portfolio->services_tags as $tag)
                        <span class="tag">{{ $tag }}</span>
                    @endforeach
                @endif
            </div>
        </header>

        <main class="details-grid">
            <div class="overview animate-up delay-1">
                <h2>The Challenge & Strategy</h2>
                {{-- nl2br preserves the line breaks from your Filament textarea --}}
                <p>{!! nl2br(e($portfolio->description)) !!}</p>
            </div>

            <div class="stats-container animate-up delay-2">
                @if($portfolio->stats)
                    @foreach($portfolio->stats as $stat)
                        <div class="stat-card">
                            {{-- Assuming users might type "12+" in the backend, we print it directly --}}
                            <div class="stat-number">{{ $stat['number'] }}</div>
                            <div class="stat-label">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </main>

        @if($portfolio->hero_image)
            <section class="mockup-section animate-up delay-3">
                <img src="{{ asset('storage/' . $portfolio->hero_image) }}" alt="{{ $portfolio->title }} Mockup" class="mockup-image" style="opacity: 0.6;">
                
                {{-- Decorative search bar (Static for aesthetic, or make dynamic if needed) --}}
                <div class="search-bar">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" value="{{ $portfolio->title }}" readonly>
                    <button class="search-btn">Search</button>
                </div>

                <div class="badge">#1</div>
            </section>
        @endif

        <section class="execution-section animate-up delay-4">
            <h2 class="section-title">How We Achieved It</h2>
            <div class="execution-grid">
                @if($portfolio->execution_steps)
                    @foreach($portfolio->execution_steps as $step)
                        <div class="execution-card">
                            {{-- $loop->iteration automatically numbers the steps 01, 02, 03... --}}
                            <div class="step-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['description'] }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <section class="cta-section animate-up delay-4">
            <h2>Ready to dominate your industry?</h2>
            <p>Stop losing high-value clients to your competitors. Let's build a search engine strategy that drives real revenue.</p>
            
            {{-- Use the CTA link from the backend, fallback to contact page if empty --}}
            <a href="{{ $portfolio->cta_link ?? route('contact') }}" class="btn-primary">Start Your Project</a>
        </section>

    </div>
    
    @include('frontend.home.footer')
    
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
</body>
</html>