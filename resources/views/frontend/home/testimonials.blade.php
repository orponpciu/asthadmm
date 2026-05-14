<section class="testimonial-section" id="testimonials">
    <div class="testi-bg-tech"></div>

    <canvas id="testimonial-canvas"></canvas>
    
    <div class="testimonial-container">
        <h4 class="testi-title">DON'T TAKE OUR WORD</h4>
        <p class="testi-subtitle">Hear from our satisfied digital marketing clients as their stories speak volumes<br>about the quality of our digital marketing services</p>
        
        <div class="testi-slider-wrapper">
            <div class="testi-track" id="testi-track">
                
                @foreach($testimonials as $testimonial)
                    <div class="testi-slide">
                        <span class="quote-icon quote-left">“</span>
                        <p class="testi-text">{{ $testimonial->quote }}</p>
                        <div class="testi-author">{{ $testimonial->author }}</div>
                        <div class="testi-role">{{ $testimonial->role }}</div>
                        <div class="testi-company">{{ $testimonial->company }}</div>
                        <span class="quote-icon quote-right">”</span>
                    </div>
                @endforeach

            </div>
        </div>
        
        <div class="testi-navigation-box">
            <div class="testi-controls">
                <button class="testi-btn" id="testi-prev">←</button>
                <button class="testi-btn" id="testi-next">→</button>
            </div>
            <div class="testi-dots" id="testi-dots">
                
                @foreach($testimonials as $index => $testimonial)
                    <div class="testi-dot {{ $loop->first ? 'active' : '' }}" data-index="{{ $index }}"></div>
                @endforeach

            </div>
        </div>

    </div>
</section>