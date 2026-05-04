@php
    // Fetch the hero settings from the Filament backend
    $hero = \App\Models\HeroSection::first();
@endphp

@if(!isset($hero) || $hero->is_active)
    <section class="hero">
        <div class="hero-content">
            <h1>{{ $hero->headline ?? 'EXPLORE NEW HEIGHTS' }}</h1>
            <h2>{{ $hero->subheadline ?? 'TOP DIGITAL MARKETING MANAGEMENT AGENCY IN DUBAI UAE FOR GROWTH' }}</h2>
            
            <div class="stats">
                @if(!empty($hero->stats))
                    @foreach($hero->stats as $stat)
                        <div class="stat-item">
                            <h3>
                                <span class="counter-val" data-target="{{ $stat['number'] }}">0</span>
                                <span class="symbol">{{ $stat['symbol'] ?? '' }}</span>
                            </h3>
                            <p>{!! nl2br(e($stat['label'])) !!}</p>
                        </div>
                    @endforeach
                @else
                    <div class="stat-item">
                        <h3><span class="counter-val" data-target="15">0</span><span class="symbol">+</span></h3>
                        <p>YEARS OF<br>EXPERIENCE</p>
                    </div>
                    <div class="stat-item">
                        <h3><span class="counter-val" data-target="22">0</span><span class="symbol">+</span></h3>
                        <p>TEAM OF<br>EXPERTS</p>
                    </div>
                    <div class="stat-item">
                        <h3><span class="counter-val" data-target="4200">0</span><span class="symbol">+</span></h3>
                        <p>SUCCESSFUL<br>PROJECTS</p>
                    </div>
                    <div class="stat-item">
                        <h3><span class="counter-val" data-target="95">0</span><span class="symbol">%</span></h3>
                        <p>CLIENT<br>RETENTION</p>
                    </div>
                @endif
            </div>

            <div class="partners-row">
                @if(!empty($hero->partners))
                    @foreach($hero->partners as $index => $partner)
                        
                        @if(isset($partner['badge_type']) && in_array($partner['badge_type'], ['google_ads', 'shopping_ads']))
                            <div class="partner-card">
                                <div class="badge-circle">
                                     <div class="badge-inner">
                                        <svg class="badge-icon" viewBox="0 0 24 24">
                                            <path fill="#FABB05" d="M11.9 2.5l5.3 9.3H1.3L6.6 2.5c1.4-2.5 4-2.5 5.3 0z"/>
                                            <path fill="#4285F4" d="M17.2 11.8L11.9 21c-1.4 2.5-4 2.5-5.3 0L1.3 11.8h15.9z"/>
                                            @if($partner['badge_type'] === 'google_ads')
                                                <path fill="#34A853" d="M22.7 11.8h-5.5L11.9 21c1.4 2.5 4 2.5 5.3 0l5.5-9.2z"/>
                                            @else
                                                <path fill="#EA4335" d="M22.7 11.8h-5.5L11.9 21c1.4 2.5 4 2.5 5.3 0l5.5-9.2z"/>
                                            @endif
                                            <circle cx="12" cy="12" r="3" fill="#fff"/>
                                            <circle cx="12" cy="12" r="1.5" fill="#4285F4"/>
                                        </svg>
                                     </div>
                                     <svg viewBox="0 0 100 100" style="position:absolute; width:100%; height:100%; transform: rotate(-90deg);">
                                        <path id="curve{{ $index }}" d="M 15, 50 a 35,35 0 1,1 70,0 a 35,35 0 1,1 -70,0" fill="transparent"/>
                                        <text width="100" font-size="8" fill="#555" letter-spacing="1">
                                            <textPath href="#curve{{ $index }}" startOffset="0">{{ strtoupper($partner['name']) }}</textPath>
                                        </text>
                                     </svg>
                                </div>
                            </div>
                        
                        @else
                            <div class="partner-card">
                                <div style="border: 1px solid #ddd; padding: 15px 10px; border-radius: 8px; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    
                                    @if(isset($partner['badge_type']) && $partner['badge_type'] === 'meta')
                                        <div class="meta-logo" style="display: flex; align-items: center; gap: 5px;">
                                            <svg viewBox="0 0 36 36" style="width: 24px; height: 24px;"><path d="M28.1,14.6c-2.4,0-4.6,1.2-6,3.1c-1.4-1.9-3.6-3.1-6-3.1c-4.2,0-7.6,3.4-7.6,7.6s3.4,7.6,7.6,7.6c2.4,0,4.6-1.2,6-3.1 c1.4,1.9,3.6,3.1,6,3.1c4.2,0,7.6-3.4,7.6-7.6S32.3,14.6,28.1,14.6z M16.1,26.7c-2.5,0-4.5-2-4.5-4.5s2-4.5,4.5-4.5 c1.7,0,3.3,1,4,2.5c-0.8,1.4-1.3,3-1.3,4.6c0,0.5,0.1,1,0.1,1.5C18.2,26.5,17.2,26.7,16.1,26.7z M28.1,26.7c-1.1,0-2.1-0.3-2.9-0.8 c0.1-0.5,0.1-1,0.1-1.5c0-1.6-0.5-3.2-1.3-4.6c0.7-1.5,2.3-2.5,4-2.5c2.5,0,4.5,2,4.5,4.5S30.6,26.7,28.1,26.7z"/></svg>
                                            {{ $partner['name'] }}
                                        </div>
                                    @elseif(isset($partner['badge_type']) && $partner['badge_type'] === 'google')
                                        <div class="google-logo" style="display: flex; align-items: center; justify-content: center; width: 100%;">
                                            <svg viewBox="0 0 100 30" style="width: 70px;">
                                                <path fill="#4285F4" d="M12.9 25.5C5.8 25.5 0 19.8 0 12.8S5.8 0 12.9 0c3.9 0 7.2 1.5 9.6 4l-2.6 2.6c-1.8-1.7-4.2-2.8-7-2.8-5.6 0-10.2 4.7-10.2 10.4S7.3 24.6 12.9 24.6c5.1 0 8.2-2.5 9.2-5.4H12.9v-3.7h12.8c.1.6.2 1.4.2 2.2 0 6.6-4.5 11.2-13 11.2z"/>
                                                <path fill="#EA4335" d="M27.2 18.2c0-4 3.1-7.2 7.1-7.2s7.1 3.2 7.1 7.2-3.1 7.2-7.1 7.2-7.1-3.2-7.1-7.2zm10.7 0c0-2.4-1.7-4.1-3.6-4.1s-3.6 1.7-3.6 4.1 1.7 4.1 3.6 4.1 3.6-1.7 3.6-4.1z"/>
                                                <path fill="#FBBC05" d="M43.3 18.2c0-4 3.1-7.2 7.1-7.2s7.1 3.2 7.1 7.2-3.1 7.2-7.1 7.2-7.1-3.2-7.1-7.2zm10.7 0c0-2.4-1.7-4.1-3.6-4.1s-3.6 1.7-3.6 4.1 1.7 4.1 3.6 4.1 3.6-1.7 3.6-4.1z"/>
                                                <path fill="#4285F4" d="M60.3 11.6v13.3c0 5.4-3.5 7.6-6.8 7.6-3.5 0-5.6-2.3-6.4-4.2l3.1-1.3c.5 1.2 1.8 2.5 3.3 2.5 2.2 0 3.6-1.4 3.6-4v-1h-.1c-.8 1-2.3 1.9-4.3 1.9-4 0-7.5-3.3-7.5-7.5 0-4.2 3.5-7.5 7.5-7.5 2 0 3.5.9 4.3 1.8h.1v-1.4h3.4zm-3.1 6.7c0-2.3-1.6-4.1-3.6-4.1-2.1 0-3.8 1.8-3.8 4.1 0 2.4 1.7 4.1 3.8 4.1 2 .1 3.6-1.6 3.6-4.1z"/>
                                                <path fill="#34A853" d="M66.4 1.2h3.5v24.2h-3.5V1.2z"/>
                                                <path fill="#EA4335" d="M72.9 18.2c0 2.6 1.7 4.1 3.7 4.1 1.8 0 3-1 3.5-2l-2.8-1.9c-.4.7-1 1.1-1.8 1.1-1.2 0-2-.5-2.5-1.5l6.9-2.9-.3-.9c-.6-1.5-2.2-4.1-5.3-4.1-3.1 0-6.4 2.4-6.4 7.2zm7.1-4c-.3-1.2-1.5-2-2.7-2-1.3 0-2.4.7-2.7 2l5.4-2.3v2.3z"/>
                                            </svg>
                                        </div>
                                    @elseif(isset($partner['logo']))
                                        <div style="display: flex; align-items: center; gap: 5px; font-weight: bold;">
                                            <img src="{{ Storage::url($partner['logo']) }}" alt="{{ $partner['name'] }}" style="max-height: 24px;">
                                            {{ $partner['name'] }}
                                        </div>
                                    @endif

                                    <div class="small-text" style="font-size: 0.8rem; margin-top: 8px;">{{ $partner['role'] ?? '' }}</div>
                                </div>
                            </div>
                        @endif
                        
                    @endforeach
                @else
                    <div class="partner-card">
                        <div style="border: 1px solid #ddd; padding: 15px 10px; border-radius: 8px; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div class="meta-logo">
                                <svg viewBox="0 0 36 36"><path d="M28.1,14.6c-2.4,0-4.6,1.2-6,3.1c-1.4-1.9-3.6-3.1-6-3.1c-4.2,0-7.6,3.4-7.6,7.6s3.4,7.6,7.6,7.6c2.4,0,4.6-1.2,6-3.1 c1.4,1.9,3.6,3.1,6,3.1c4.2,0,7.6-3.4,7.6-7.6S32.3,14.6,28.1,14.6z M16.1,26.7c-2.5,0-4.5-2-4.5-4.5s2-4.5,4.5-4.5 c1.7,0,3.3,1,4,2.5c-0.8,1.4-1.3,3-1.3,4.6c0,0.5,0.1,1,0.1,1.5C18.2,26.5,17.2,26.7,16.1,26.7z M28.1,26.7c-1.1,0-2.1-0.3-2.9-0.8 c0.1-0.5,0.1-1,0.1-1.5c0-1.6-0.5-3.2-1.3-4.6c0.7-1.5,2.3-2.5,4-2.5c2.5,0,4.5,2,4.5,4.5S30.6,26.7,28.1,26.7z"/></svg>
                                Meta
                            </div>
                            <div class="small-text">Business Partner</div>
                        </div>
                    </div>
                    <div class="partner-card">
                        <div style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div class="google-logo">
                                <svg viewBox="0 0 100 30">
                                    <path fill="#4285F4" d="M12.9 25.5C5.8 25.5 0 19.8 0 12.8S5.8 0 12.9 0c3.9 0 7.2 1.5 9.6 4l-2.6 2.6c-1.8-1.7-4.2-2.8-7-2.8-5.6 0-10.2 4.7-10.2 10.4S7.3 24.6 12.9 24.6c5.1 0 8.2-2.5 9.2-5.4H12.9v-3.7h12.8c.1.6.2 1.4.2 2.2 0 6.6-4.5 11.2-13 11.2z"/>
                                    <path fill="#EA4335" d="M27.2 18.2c0-4 3.1-7.2 7.1-7.2s7.1 3.2 7.1 7.2-3.1 7.2-7.1 7.2-7.1-3.2-7.1-7.2zm10.7 0c0-2.4-1.7-4.1-3.6-4.1s-3.6 1.7-3.6 4.1 1.7 4.1 3.6 4.1 3.6-1.7 3.6-4.1z"/>
                                    <path fill="#FBBC05" d="M43.3 18.2c0-4 3.1-7.2 7.1-7.2s7.1 3.2 7.1 7.2-3.1 7.2-7.1 7.2-7.1-3.2-7.1-7.2zm10.7 0c0-2.4-1.7-4.1-3.6-4.1s-3.6 1.7-3.6 4.1 1.7 4.1 3.6 4.1 3.6-1.7 3.6-4.1z"/>
                                    <path fill="#4285F4" d="M60.3 11.6v13.3c0 5.4-3.5 7.6-6.8 7.6-3.5 0-5.6-2.3-6.4-4.2l3.1-1.3c.5 1.2 1.8 2.5 3.3 2.5 2.2 0 3.6-1.4 3.6-4v-1h-.1c-.8 1-2.3 1.9-4.3 1.9-4 0-7.5-3.3-7.5-7.5 0-4.2 3.5-7.5 7.5-7.5 2 0 3.5.9 4.3 1.8h.1v-1.4h3.4zm-3.1 6.7c0-2.3-1.6-4.1-3.6-4.1-2.1 0-3.8 1.8-3.8 4.1 0 2.4 1.7 4.1 3.8 4.1 2 .1 3.6-1.6 3.6-4.1z"/>
                                    <path fill="#34A853" d="M66.4 1.2h3.5v24.2h-3.5V1.2z"/>
                                    <path fill="#EA4335" d="M72.9 18.2c0 2.6 1.7 4.1 3.7 4.1 1.8 0 3-1 3.5-2l-2.8-1.9c-.4.7-1 1.1-1.8 1.1-1.2 0-2-.5-2.5-1.5l6.9-2.9-.3-.9c-.6-1.5-2.2-4.1-5.3-4.1-3.1 0-6.4 2.4-6.4 7.2zm7.1-4c-.3-1.2-1.5-2-2.7-2-1.3 0-2.4.7-2.7 2l5.4-2.3v2.3z"/>
                                </svg>
                            </div>
                            <div class="small-text" style="font-size: 0.8rem;">Partner</div>
                        </div>
                    </div>
                    <div class="partner-card">
                        <div class="badge-circle">
                             <div class="badge-inner">
                                <svg class="badge-icon" viewBox="0 0 24 24">
                                    <path fill="#FABB05" d="M11.9 2.5l5.3 9.3H1.3L6.6 2.5c1.4-2.5 4-2.5 5.3 0z"/>
                                    <path fill="#4285F4" d="M17.2 11.8L11.9 21c-1.4 2.5-4 2.5-5.3 0L1.3 11.8h15.9z"/>
                                    <path fill="#34A853" d="M22.7 11.8h-5.5L11.9 21c1.4 2.5 4 2.5 5.3 0l5.5-9.2z"/>
                                    <circle cx="12" cy="12" r="3" fill="#fff"/>
                                    <circle cx="12" cy="12" r="1.5" fill="#4285F4"/>
                                </svg>
                             </div>
                             <svg viewBox="0 0 100 100" style="position:absolute; width:100%; height:100%; transform: rotate(-90deg);">
                                <path id="curve-fallback-1" d="M 15, 50 a 35,35 0 1,1 70,0 a 35,35 0 1,1 -70,0" fill="transparent"/>
                                <text width="100" font-size="8" fill="#555" letter-spacing="1">
                                    <textPath href="#curve-fallback-1" startOffset="0">GOOGLE ADS AI-POWERED PERFORMANCE</textPath>
                                </text>
                             </svg>
                        </div>
                    </div>
                    <div class="partner-card">
                        <div class="badge-circle">
                             <div class="badge-inner">
                                <svg class="badge-icon" viewBox="0 0 24 24">
                                    <path fill="#FABB05" d="M11.9 2.5l5.3 9.3H1.3L6.6 2.5c1.4-2.5 4-2.5 5.3 0z"/>
                                    <path fill="#4285F4" d="M17.2 11.8L11.9 21c-1.4 2.5-4 2.5-5.3 0L1.3 11.8h15.9z"/>
                                    <path fill="#EA4335" d="M22.7 11.8h-5.5L11.9 21c1.4 2.5 4 2.5 5.3 0l5.5-9.2z"/>
                                    <circle cx="12" cy="12" r="3" fill="#fff"/>
                                    <circle cx="12" cy="12" r="1.5" fill="#4285F4"/>
                                </svg>
                             </div>
                             <svg viewBox="0 0 100 100" style="position:absolute; width:100%; height:100%; transform: rotate(-90deg);">
                                <path id="curve-fallback-2" d="M 15, 50 a 35,35 0 1,1 70,0 a 35,35 0 1,1 -70,0" fill="transparent"/>
                                <text width="100" font-size="9" fill="#555" letter-spacing="2">
                                    <textPath href="#curve-fallback-2" startOffset="10">SHOPPING ADS CERTIFIED</textPath>
                                </text>
                             </svg>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="hero-right">
            <div class="tech-ring"></div>
            <div class="decor cross d1">+</div>
            <div class="decor cross d2">+</div>
            <div class="decor cross d3">+</div>
            <div class="decor cross d4">+</div>
            <div class="decor circle-decor d5"></div>

            <svg class="rocket-img" viewBox="0 0 200 300" xmlns="http://www.w3.org/2000/svg">
                <path fill="#4A001A" d="M70,220 Q100,310 130,220 Z"/>
                <path fill="#7A002A" d="M85,220 Q100,280 115,220 Z"/>
                <path fill="#ffffff" d="M100,20 Q150,80 140,180 C140,220 120,230 100,230 C80,230 60,220 60,180 Q50,80 100,20 Z" stroke="#000000" stroke-width="4"/>
                <path fill="#EA2B5A" d="M100,20 Q123,47 129,80 L71,80 Q77,47 100,20 Z" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                <path fill="#EA2B5A" d="M60,160 Q40,170 30,200 L65,190 Z" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                <path fill="#EA2B5A" d="M140,160 Q160,170 170,200 L135,190 Z" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                <path fill="#EA2B5A" d="M90,230 L100,260 L110,230 Z" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                <circle cx="100" cy="120" r="22" fill="#EAEAEA" stroke="#000000" stroke-width="4"/>
                <circle cx="100" cy="120" r="16" fill="#C3CFF4"/>
                <path fill="#ffffff" d="M90,108 A16,16 0 0,1 110,110 A16,16 0 0,0 90,125 Z" opacity="0.6"/>
            </svg>
        </div>
    </section>
@endif