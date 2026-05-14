<section class="ai-section" id="ai-digital-world">
        <canvas id="ai-canvas-bg"></canvas>
        <div class="ai-orb ai-orb-1"></div>
        <div class="ai-orb ai-orb-2"></div>

        <div class="ai-container">
            <div class="ai-content-wrapper">
                
                <div class="ai-text-content">
                    @if($aiSection)
                        <h2 class="ai-title">{{ $aiSection->title_white }} <span>{{ $aiSection->title_pink }}</span></h2>
                        
                        @if($aiSection->subtitle)
                            <h3 class="ai-subtitle">{{ $aiSection->subtitle }}</h3>
                        @endif
                        
                        @if($aiSection->paragraph_1) {!! $aiSection->paragraph_1 !!} @endif
                        @if($aiSection->paragraph_2) {!! $aiSection->paragraph_2 !!} @endif
                        @if($aiSection->paragraph_3) {!! $aiSection->paragraph_3 !!} @endif
                        
                        @if($aiSection->button_text)
                            <button class="ai-btn" onclick="window.location.href='{{ $aiSection->button_link ?? '#' }}'">
                                {{ $aiSection->button_text }} ➔
                            </button>
                        @endif
                    @else
                        <h2 class="ai-title">EXPLORE NEW HEIGHTS – <span>STEP INTO THE AI DIGITAL WORLD</span></h2>
                        <p>Please configure this section in the admin panel.</p>
                    @endif
                </div>

                <div class="ai-graphic-wrapper">
                    <svg class="ai-svg-node" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" stroke="var(--primary-pink)" stroke-width="8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M220,150 L270,100 L320,100" class="ai-pulse-path"/>
                            <circle cx="320" cy="100" r="10" fill="var(--primary-pink)"/>
                            <path d="M270,100 L270,50" class="ai-pulse-path"/>
                            <circle cx="270" cy="50" r="10" fill="var(--primary-pink)"/>

                            <path d="M250,200 L340,200 L340,150" class="ai-pulse-path"/>
                            <path d="M340,200 L340,250" class="ai-pulse-path"/>

                            <path d="M220,250 L270,300 L320,300" class="ai-pulse-path" stroke="#ff0f7b"/>
                            <circle cx="320" cy="300" r="10" fill="#ff0f7b"/>
                            <path d="M270,300 L270,350" class="ai-pulse-path" stroke="#ff0f7b"/>
                            <circle cx="270" cy="350" r="10" fill="#ff0f7b"/>

                            <path d="M180,250 L130,300 L80,300" class="ai-pulse-path"/>
                            <circle cx="80" cy="300" r="10" fill="var(--primary-pink)"/>
                            <path d="M130,300 L130,350" class="ai-pulse-path"/>
                            <circle cx="130" cy="350" r="10" fill="var(--primary-pink)"/>

                            <path d="M150,200 L60,200 L60,150" class="ai-pulse-path" stroke="#ff0f7b"/>
                            <path d="M60,200 L60,250" class="ai-pulse-path" stroke="#ff0f7b"/>

                            <path d="M180,150 L130,100 L80,100" class="ai-pulse-path"/>
                            <circle cx="80" cy="100" r="10" fill="var(--primary-pink)"/>
                            <path d="M130,100 L130,50" class="ai-pulse-path"/>
                            <circle cx="130" cy="50" r="10" fill="var(--primary-pink)"/>
                        </g>

                        <polygon points="200,120 265,160 265,240 200,280 135,240 135,160" fill="var(--primary-pink)" stroke="#ff0f7b" stroke-width="6"/>
                        <polygon points="200,135 250,165 250,235 200,265 150,235 150,165" fill="#7A002A" opacity="0.4"/>
                        <text x="200" y="220" font-family="Inter, sans-serif" font-weight="900" font-size="60" fill="white" text-anchor="middle" letter-spacing="2">AI</text>
                    </svg>
                </div>

            </div>

            @if(isset($recognitionSection) && $recognitionSection->is_active)
            <div class="ai-platforms">
                <h4 class="platforms-title">{{ $recognitionSection->section_title }}</h4>
                <div class="platforms-logos">
                    
                    @if(!empty($recognitionSection->platforms))
                        @foreach($recognitionSection->platforms as $platform)
                            <a href="{{ $platform['link'] ?? '#' }}" 
                               target="_blank" 
                               class="plat-card" 
                               style="background-color: {{ !empty($platform['bg_color']) ? $platform['bg_color'] : 'transparent' }}; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                
                                @if(!empty($platform['logo']))
                                    <img src="{{ asset('storage/' . $platform['logo']) }}" alt="{{ $platform['name'] }}" style="max-height: 40px; max-width: 100%; object-fit: contain;">
                                @else
                                    <span style="color: white;">{{ $platform['name'] }}</span>
                                @endif
                                
                            </a>
                        @endforeach
                    @endif
                    
                </div>
            </div>
            @endif

        </div>
    </section>