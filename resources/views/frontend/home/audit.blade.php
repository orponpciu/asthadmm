<section class="audit-section">
    <canvas id="audit-canvas"></canvas>
    
    <div class="orb orb-pink"></div>
    <div class="orb orb-blue"></div>

    <div class="audit-container">
        <!-- LEFT SIDE DYNAMIC -->
        <div class="audit-content">
            <h2>
                {{ $auditData?->heading_start ?? 'ASTHA DIGITAL MARKETING MANAGEMENT AGENCY WITH' }} 
                <span>{{ $auditData?->heading_highlight ?? '15+ YEARS' }}</span> 
                {{ $auditData?->heading_end ?? 'OF DRIVING GROWTH' }}
            </h2>
            
            <p>{!! nl2br(e($auditData?->paragraph_one ?? "At ASTHA Digital Marketing Management, we've earned our reputation as a leading digital marketing management agency in Dubai through 15+ years of experience transforming businesses online. Our expertise spans a comprehensive range of services including SEO, PPC/Search Ads, Social Media Marketing, and impactful digital campaigns tailored to Dubai's diverse market.")) !!}</p>
            
            <p>{!! nl2br(e($auditData?->paragraph_two ?? "By leveraging cutting-edge tools and data-driven insights, we ensure your brand stands out in a competitive market. Choose ASTHA to experience a partnership built on innovation, trust, and a proven track record.")) !!}</p>
            
            <a href="{{ $auditData?->button_url ?? '#' }}" class="btn-outline-modern">
                {{ $auditData?->button_text ?? 'KNOW MORE' }} <span>➔</span>
            </a>

            <!-- DYNAMIC ICONS -->
            <div class="tech-icons-row">
                @php $icons = $auditData?->active_icons ?? ['google_ads', 'analytics', 'instagram', 'facebook', 'youtube']; @endphp

                @if(in_array('google_ads', $icons))
                    <div class="tech-icon" title="Google Ads">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #4285F4;"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    </div>
                @endif
                @if(in_array('analytics', $icons))
                    <div class="tech-icon" title="Analytics">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #FABB05;"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                @endif
                @if(in_array('instagram', $icons))
                    <div class="tech-icon" title="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #E1306C;"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </div>
                @endif
                @if(in_array('facebook', $icons))
                    <div class="tech-icon" title="Facebook">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #1877F2;"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </div>
                @endif
                @if(in_array('youtube', $icons))
                    <div class="tech-icon" title="YouTube">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #FF0000;"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.33 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                    </div>
                @endif
            </div>
        </div>

        <!-- RIGHT SIDE DYNAMIC -->
        <div class="audit-form-wrapper">
            <div class="glass-form">
                <h3>{{ $auditData?->form_heading ?? 'GET YOUR FREE DIGITAL MARKETING AUDIT' }}</h3>
                
                <!-- Success Message Alert -->
                @if(session('success'))
                    <div style="background: rgba(0, 255, 0, 0.1); color: #00ff00; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; border: 1px solid rgba(0, 255, 0, 0.3);">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('audit.submit') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <!-- Updated name to 'full_name' -->
                        <input type="text" name="full_name" required placeholder="Full Name" value="{{ old('full_name') }}">
                    </div>
                    <div class="input-group">
                        <!-- Name remains 'email' -->
                        <input type="email" name="email" required placeholder="Email Address" value="{{ old('email') }}">
                    </div>
                    <div class="input-group">
                        <!-- Updated name to 'company_name' -->
                        <input type="text" name="company_name" required placeholder="Company Name" value="{{ old('company_name') }}">
                    </div>
                    <div class="input-group">
                        <!-- Updated name to 'mobile_number' -->
                        <input type="tel" name="mobile_number" required placeholder="Mobile Number" value="{{ old('mobile_number') }}">
                    </div>
                    
                    <label class="checkbox-group">
                        <input type="checkbox" name="terms" required>
                        I agree with the terms of Privacy Policy.
                    </label>

                    <button type="submit" class="btn-submit-gradient">
                        {{ $auditData?->form_button_text ?? 'GET MY FREE AUDIT NOW' }}
                    </button>

                    <div class="secure-text">
                        {{ $auditData?->form_secure_text ?? '🔒 Your information is 100% secure and confidential!' }}
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>