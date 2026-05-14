@php
    // Use a fallback to prevent site crash if DB is empty
    $footer = \App\Models\FooterSetting::first() ?? new \App\Models\FooterSetting();

    // Helper to extract URL if the whole <iframe> tag was pasted
    $mapUrl = $footer->map_url;
    if (preg_match('/src="([^"]+)"/', $mapUrl, $match)) {
        $mapUrl = $match[1];
    }
@endphp

<footer class="main-footer">
    <div class="footer-tech-bg">
        <canvas id="footer-canvas"></canvas>
    </div>

    <div class="footer-container">
        <div class="footer-brand-side">
            <div class="footer-logo">
                <img src="{{ $footer->logo ? asset('storage/' . $footer->logo) : asset('img/logo.png') }}" alt="ASTHA Logo">
            </div>
            <p class="footer-tagline">{{ $footer->tagline ?? 'YOUR DIGITAL GROWTH EXPERTS' }}</p>
            <div class="footer-socials">
                @if(!empty($footer->social_links))
                    @foreach($footer->social_links as $social)
                        <a href="{{ $social['url'] }}" class="social-icon" target="_blank">
                            {!! $social['icon'] !!}
                        </a>
                    @endforeach
                @else
                    <a href="#" class="social-icon">f</a>
                    <a href="#" class="social-icon">ig</a>
                    <a href="#" class="social-icon">in</a>
                    <a href="#" class="social-icon">yt</a>
                @endif
            </div>
        </div>

        <div class="footer-links">
            <h4>{{ $footer->quick_links_title ?? 'QUICK LINKS' }}</h4>
            <ul>
                @if(!empty($footer->quick_links))
                    @foreach($footer->quick_links as $link)
                        <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                    @endforeach
                @else
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Case Studies</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Insights</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Contact Us</a></li>
                @endif
            </ul>
        </div>

        <div class="footer-links">
            <h4>{{ $footer->services_title ?? 'SERVICES' }}</h4>
            <ul>
                @if(!empty($footer->services))
                    @foreach($footer->services as $service)
                        <li><a href="{{ $service['url'] }}">{{ $service['label'] }}</a></li>
                    @endforeach
                @else
                    <li><a href="#">Digital Marketing</a></li>
                    <li><a href="#">SEO</a></li>
                    <li><a href="#">Social Media</a></li>
                    <li><a href="#">B2B Lead Generation</a></li>
                    <li><a href="#">Video Production</a></li>
                    <li><a href="#">Web Design & Development</a></li>
                @endif
            </ul>
        </div>

        <div class="footer-contact-map">
            <div class="contact-box">
                <h4>{{ $footer->contact_title ?? 'CONTACT US' }}</h4>
                
                @if(!empty($footer->contact_items))
                    @foreach($footer->contact_items as $item)
                        <div class="contact-item">
                            <span class="c-icon">{!! $item['icon'] !!}</span>
                            <div>
                                <p class="label">{{ $item['label'] }}</p>
                                <p class="value">{{ $item['value'] }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="contact-item">
                        <span class="c-icon">✉</span>
                        <div>
                            <p class="label">EMAIL ADDRESS</p>
                            <p class="value">info@asthadmm.com</p>
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="footer-map">
                <iframe 
                    src="{{ $mapUrl ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.834784910323!2d55.3373!3d25.242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE0JzMxLjIiTiA1NcKwMjAnMTQuMyJF!5e0!3m2!1sen!2sae!4v1620000000000!5m2!1sen!2sae' }}" 
                    width="100%" 
                    height="150" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <p>© COPYRIGHT 2026 | ASTHA DMM LLC</p>
    </div>
</footer>