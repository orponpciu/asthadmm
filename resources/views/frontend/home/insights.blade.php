<section class="insights-section" id="insights">
    <div class="insights-bg-tech"></div>
    <canvas id="insights-canvas-bg"></canvas>

    <div class="insights-container">
        <h2 class="insights-title">OUR INSIGHTS</h2>

        <div class="insights-grid">
            
            <!-- Loop through the 3 posts passed from the controller -->
            @foreach($insights as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="insight-card">
                    <div class="insight-img-wrapper">
                        <!-- Display the dynamic image, with a fallback if none exists -->
                        <img src="{{ $post->featured_image ? Storage::url($post->featured_image) : 'https://images.unsplash.com/photo-1517976487492-5750f3195933?auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $post->title }}">
                        <div class="insight-img-overlay"></div>
                    </div>
                    <div class="insight-content">
                        <!-- Format the date dynamically -->
                        <div class="insight-date">{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y') }}</div>
                        <!-- Display the dynamic title -->
                        <h3 class="insight-title-text">{{ $post->title }}</h3>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>