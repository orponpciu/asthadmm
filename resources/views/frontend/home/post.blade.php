<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Dynamic SEO Tags -->
    <title>{{ $post->meta_title ?? $post->title }}</title>
    <meta name="description" content="{{ $post->meta_description ?? Str::limit(strip_tags($post->content), 150) }}">
    @if($post->meta_keywords)
        <meta name="keywords" content="{{ is_array($post->meta_keywords) ? implode(', ', $post->meta_keywords) : $post->meta_keywords }}">
    @endif

    @include('frontend.home.css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/post.css') }}">
</head>
<body>

    @include('frontend.home.nav')

    <section class="post-hero-section">
        <div class="post-container hero-grid">
            
            <div class="hero-content" data-aos="fade-up">
                <h2 class="outline-heading">INSIGHTS</h2>
                <!-- Dynamic Date formatting -->
                <p class="hero-date">{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y') }}</p>
                <!-- Dynamic Title -->
                <h1 class="hero-title">{{ $post->title }}</h1>
                <!-- Dynamic Category -->
                @if($post->category)
                    <span class="category-badge">{{ strtoupper($post->category->name) }}</span>
                @endif
            </div>

            <div class="hero-graphic" data-aos="fade-left">
                <!-- Dynamic Featured Image using Storage facade -->
                <img src="{{ Storage::url($post->featured_image) }}" 
                     alt="{{ $post->title }}" 
                     class="featured-img"
                     onerror="this.src='https://via.placeholder.com/500x400/8b0000/ffffff?text=Featured+Graphic'">
            </div>
            
        </div>
    </section>

    <section class="post-body-section">
        <div class="post-container content-grid">
            
            <article class="main-article" data-aos="fade-up" data-aos-delay="100">
                <!-- Renders the dynamic RichEditor HTML safely -->
                {!! $post->content !!}
            </article>

            <aside class="post-sidebar" data-aos="fade-left" data-aos-delay="200">
                
                <div class="sidebar-widget">
                    <h3 class="widget-title">SEARCH</h3>
                    <form action="{{ url('/search') }}" method="GET" class="search-form">
                        <input type="text" name="query" placeholder="Search..." required>
                        <button type="submit" aria-label="Search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="sidebar-widget">
                    <h3 class="widget-title">RECENT INSIGHTS</h3>
                    <div class="recent-posts-list">
                        
                        <!-- Loop through the backend $recentPosts variable -->
                        @foreach($recentPosts as $recent)
                            <a href="{{ route('posts.show', $recent->slug) }}" class="recent-post-item">
                                <img src="{{ $recent->featured_image ? Storage::url($recent->featured_image) : 'https://via.placeholder.com/80/1a1a1a/ffffff?text=Insight' }}" alt="{{ $recent->title }}">
                                <div class="recent-post-info">
                                    <h4>{{ $recent->title }}</h4>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>

            </aside>
        </div>
    </section>

    @include('frontend.home.footer')
     
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/post.js') }}"></script>
</body>
</html>