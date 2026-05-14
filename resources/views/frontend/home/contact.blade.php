<section class="contact-section" id="contact">
    <div class="contact-bg-tech"></div>
    <canvas id="contact-canvas-bg"></canvas>
    <div class="contact-orb contact-orb-1"></div>
    <div class="contact-orb contact-orb-2"></div>

    <div class="contact-container">
        
        <div class="contact-info-side">
            <h2 class="contact-main-title">LET'S EXPLORE NEW<br><span>HEIGHTS, TOGETHER</span></h2>
            <p class="contact-desc">Dubai's result driven digital marketing agency expertise at your call</p>
            
            <div class="contact-details-list">
                <!-- Email Link -->
                <a href="mailto:info@asthadmm.com" class="contact-detail-item" style="text-decoration: none; color: inherit;">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <span>info@asthadmm.com</span>
                </a>

                <!-- Phone Call Link -->
                <a href="tel:+971503259908" class="contact-detail-item" style="text-decoration: none; color: inherit;">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <span>+971 50 325 9908</span>
                </a>

                <!-- WhatsApp Live Chat Link -->
                <a href="https://wa.me/971503259908" target="_blank" class="contact-detail-item" style="text-decoration: none; color: inherit;">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    </div>
                    <span>Live Chat : Connect via WhatsApp</span>
                </a>

                <!-- Updated Address Link -->
                <a href="https://www.google.com/maps/search/?api=1&query=12+41st+St+Naif+Deira+Dubai" target="_blank" class="contact-detail-item" style="text-decoration: none; color: inherit;">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <span>12 41st St - Naif - 273553 55.313360 - Deira - Dubai - United Arab Emirates</span>
                </a>
            </div>
        </div>

        <div class="contact-form-side">
            <div class="glass-form contact-glass-form">
                <h3 class="contact-form-title">BOOK A FREE DIGITAL MARKETING CONSULTATION WITH OUR STRATEGISTS</h3>
                
                <!-- Dynamic Form Start -->
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-row">
                        <div class="input-group">
                            <input type="text" name="name" required placeholder="Name">
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" required placeholder="Email">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="input-group flag-input-group">
                            <div class="flag-placeholder">
                                🇦🇪 <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </div>
                            <input type="tel" name="phone" required placeholder="Phone" style="padding-left: 65px;">
                        </div>
                        <div class="input-group">
                            <input type="text" name="company" required placeholder="Company">
                        </div>
                    </div>

                    <div class="input-group">
                        <select name="service" required>
                            <option value="" disabled selected>Search Engine Optimization</option>
                            <option value="seo">Search Engine Optimization</option>
                            <option value="smm">Social Media Marketing</option>
                            <option value="ppc">Search Advertising (PPC)</option>
                        </select>
                        <div class="select-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </div>
                    </div>

                    <div class="input-group">
                        <textarea name="message" required placeholder="Message" rows="4"></textarea>
                    </div>

                    <!-- Fake Captcha has been removed -->

                    <button type="submit" class="btn-submit-gradient btn-contact-submit">SEND MESSAGE</button>
                </form>
                <!-- Dynamic Form End -->

            </div>
        </div>

    </div>
</section>