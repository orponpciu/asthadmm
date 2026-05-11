// --- MODERN MOBILE MENU TOGGLE LOGIC ---
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuBtn = document.getElementById('mobile-menu');
    const navWrapper = document.getElementById('nav-wrapper');

    if (mobileMenuBtn && navWrapper) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('active');
            navWrapper.classList.toggle('active');
        });
    }
});

// --- 2. TECH NETWORK PARTICLE BACKGROUND LOGIC (HERO SECTION) ---
const canvas = document.getElementById('canvas-bg');
if (canvas) {
    const ctx = canvas.getContext('2d');
    let particles = [];

    function resizeHero() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener('resize', resizeHero);
    resizeHero();

    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2;
            this.speedX = Math.random() * 0.5 - 0.25;
            this.speedY = Math.random() * 0.5 - 0.25;
        }
        
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
        }
        
        draw() {
            ctx.fillStyle = 'rgba(255, 255, 255, 0.6)';
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    function initHeroParticles() {
        particles = [];
        const particleCount = window.innerWidth < 768 ? 50 : 90;
        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }
    }

    function animateHero() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();
            for (let j = i; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                if (distance < 110) {
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(255, 255, 255, ${(1 - distance/110) * 0.25})`;
                    ctx.lineWidth = 0.8;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
        requestAnimationFrame(animateHero);
    }

    initHeroParticles();
    animateHero();
}

// --- 3. NEW AUDIT SECTION DATA-STREAM BACKGROUND ---
const auditCanvas = document.getElementById('audit-canvas');
if (auditCanvas) {
    const auditCtx = auditCanvas.getContext('2d');
    let dataStreams = [];

    function resizeAudit() {
        const auditSection = document.querySelector('.audit-section');
        if (auditSection) {
            auditCanvas.width = window.innerWidth;
            auditCanvas.height = auditSection.offsetHeight;
        }
    }

    window.addEventListener('resize', resizeAudit);
    setTimeout(resizeAudit, 100); 

    class DataStream {
        constructor() {
            this.reset();
            this.x = Math.random() * auditCanvas.width;
        }
        reset() {
            this.x = -100;
            this.y = Math.random() * auditCanvas.height;
            this.length = Math.random() * 150 + 50;
            this.speed = Math.random() * 2 + 1;
            this.opacity = Math.random() * 0.5 + 0.1;
            this.color = Math.random() > 0.5 ? '#9E208C' : '#00d2ff';
        }
        update() {
            this.x += this.speed;
            if (this.x > auditCanvas.width + this.length) {
                this.reset();
            }
        }
        draw() {
            auditCtx.beginPath();
            auditCtx.moveTo(this.x, this.y);
            auditCtx.lineTo(this.x + this.length, this.y);
            
            let gradient = auditCtx.createLinearGradient(this.x, this.y, this.x + this.length, this.y);
            gradient.addColorStop(0, "rgba(255,255,255,0)");
            gradient.addColorStop(1, this.color);
            
            auditCtx.strokeStyle = gradient;
            auditCtx.lineWidth = 2;
            auditCtx.globalAlpha = this.opacity;
            auditCtx.stroke();
            auditCtx.globalAlpha = 1;
        }
    }

    function initAuditStreams() {
        dataStreams = [];
        const streamCount = window.innerWidth < 768 ? 20 : 40;
        for (let i = 0; i < streamCount; i++) {
            dataStreams.push(new DataStream());
        }
    }

    function animateAudit() {
        auditCtx.clearRect(0, 0, auditCanvas.width, auditCanvas.height);
        for (let i = 0; i < dataStreams.length; i++) {
            dataStreams[i].update();
            dataStreams[i].draw();
        }
        requestAnimationFrame(animateAudit);
    }

    setTimeout(() => {
        initAuditStreams();
        animateAudit();
    }, 150);
}

// --- 4. NUMBER COUNTER ANIMATION LOGIC (UPDATED FOR DYNAMIC CLASSES) ---
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter-val');

    counters.forEach(counter => {
        const endValue = parseInt(counter.getAttribute('data-target')) || 0;
        const duration = 2000;
        let startTimestamp = null;

        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            
            counter.innerHTML = Math.floor(progress * endValue);
            
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                counter.innerHTML = endValue; 
            }
        };

        setTimeout(() => {
            window.requestAnimationFrame(step);
        }, 500);
    });
});

// --- 5. BRAND SLIDER LOGIC (SEAMLESS INFINITE LOOP) ---
const slider = document.getElementById('brand-slider');
const track = document.getElementById('brand-track');

const gapSize = 25; 
const resetPoint = track.scrollWidth + gapSize;
const originalItems = Array.from(track.children);

for (let i = 0; i < 3; i++) {
    originalItems.forEach(item => {
        const clone = item.cloneNode(true);
        track.appendChild(clone);
    });
}

let isDown = false;
let startX;
let scrollLeft;
let autoSlideInterval;

function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        if(!isDown) {
            slider.scrollLeft += 1;
            if (slider.scrollLeft >= resetPoint) {
                slider.scrollLeft -= resetPoint;
            }
        }
    }, 15);
}

startAutoSlide();

slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.style.cursor = 'grabbing';
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    clearInterval(autoSlideInterval);
});

slider.addEventListener('mouseleave', () => {
    if(isDown) {
        isDown = false;
        slider.style.cursor = 'grab';
        startAutoSlide();
    }
});

slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.style.cursor = 'grab';
    startAutoSlide();
});

slider.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeft - walk;

    if (slider.scrollLeft <= 0) {
        slider.scrollLeft += resetPoint;
        scrollLeft += resetPoint; 
    } 
    else if (slider.scrollLeft >= resetPoint * 2) {
        slider.scrollLeft -= resetPoint;
        scrollLeft -= resetPoint;
    }
});

slider.addEventListener('touchstart', (e) => {
    isDown = true;
    startX = e.touches[0].pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    clearInterval(autoSlideInterval);
});

slider.addEventListener('touchend', () => {
    isDown = false;
    startAutoSlide();
});

slider.addEventListener('touchmove', (e) => {
    if (!isDown) return;
    const x = e.touches[0].pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeft - walk;

    if (slider.scrollLeft <= 0) {
        slider.scrollLeft += resetPoint;
        scrollLeft += resetPoint;
    } else if (slider.scrollLeft >= resetPoint * 2) {
        slider.scrollLeft -= resetPoint;
        scrollLeft -= resetPoint;
    }
});

document.addEventListener("DOMContentLoaded", () => {
    // 1. DATA INITIALIZATION
    const portfolioRawData = document.getElementById('portfolio-data');
    if (!portfolioRawData) return;
    
    const projects = JSON.parse(portfolioRawData.textContent);
    let currentIndex = 0;

    // --- Select All Dynamic Elements ---
    const elTitle = document.getElementById('dynamic-title');
    const elDesc = document.getElementById('dynamic-desc');
    const elLink = document.getElementById('dynamic-link');
    const elTagline = document.getElementById('dynamic-tagline');
    const elImg = document.getElementById('dynamic-img');
    const elSearchText = document.getElementById('dynamic-search-text');
    const statsContainer = document.getElementById('stats-container');

    // 2. CONTENT UPDATE FUNCTION
    function updateContent(index) {
        const data = projects[index];
        if (!data) return;

        // Update Text Content
        elTitle.innerHTML = data.title;
        elDesc.innerText = data.description;
        elLink.setAttribute('href', data.url);
        elTagline.innerText = data.tagline;
        elImg.setAttribute('src', data.hero_image);
        elSearchText.innerText = data.title.replace(/<[^>]*>?/gm, ''); // Strip HTML tags for search bar

        // Update Stats (Rebuild the HTML grid)
        statsContainer.innerHTML = '';
        if (data.stats && Array.isArray(data.stats)) {
            data.stats.forEach(stat => {
                // Clean the number (e.g. "12+" becomes "12") for the counter
                const targetNum = stat.number.replace(/[^0-9]/g, '');
                const symbol = stat.number.replace(/[0-9]/g, '');

                statsContainer.innerHTML += `
                    <div class="cs-stat-box">
                        <div class="stat-number">
                            <span class="counter" data-target="${targetNum}">0</span>
                            <span class="symbol">${symbol}</span>
                        </div>
                        <p>${stat.label}</p>
                    </div>
                `;
            });
        }
        
        // Re-trigger the counter animation for the new stats
        animateCounters();
    }

    // Initial load for the first item's stats
    updateContent(0);

    // --- 3. UPDATED SLIDE ANIMATION ---
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const leftSlideWrapper = document.getElementById('left-slide-wrapper');
    const rightSlideWrapper = document.querySelector('.portfolio-showcase');
    let isAnimating = false;

    function slideEntireSection(direction) {
        if (isAnimating || projects.length <= 1) return; 
        isAnimating = true;

        const slideOutX = direction === 'next' ? '-50vw' : '50vw';
        const slideInX = direction === 'next' ? '50vw' : '-50vw';

        // Animate Out
        [leftSlideWrapper, rightSlideWrapper].forEach(el => {
            if(el) {
                el.style.transform = `translateX(${slideOutX}) scale(0.95)`;
                el.style.opacity = '0';
            }
        });

        setTimeout(() => {
            // Update the index
            if (direction === 'next') {
                currentIndex = (currentIndex + 1) % projects.length;
            } else {
                currentIndex = (currentIndex - 1 + projects.length) % projects.length;
            }

            // --- INJECT NEW CONTENT WHILE INVISIBLE ---
            updateContent(currentIndex);

            [leftSlideWrapper, rightSlideWrapper].forEach(el => {
                if(el) {
                    el.style.transition = 'none';
                    el.style.transform = `translateX(${slideInX}) scale(0.95)`;
                }
            });

            void leftSlideWrapper.offsetWidth; // Force Reflow

            // Animate In
            [leftSlideWrapper, rightSlideWrapper].forEach(el => {
                if(el) {
                    el.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.5s ease-out';
                    el.style.transform = 'translateX(0) scale(1)';
                    el.style.opacity = '1';
                }
            });

            setTimeout(() => { isAnimating = false; }, 600);
        }, 500); 
    }

    // --- 4. REMAINDER OF EXISTING CODE (Tilt & Counter Logic) ---

    // [Interactive 3D Tilt Effect - KEEP AS IS]
    const tiltMockup = document.getElementById('tilt-mockup');
    const showcaseContainer = document.querySelector('.portfolio-showcase');
    let isTicking = false;

    if (window.innerWidth > 1024 && showcaseContainer) {
        showcaseContainer.addEventListener('mousemove', (e) => {
            if (!isTicking) {
                requestAnimationFrame(() => {
                    const rect = showcaseContainer.getBoundingClientRect();
                    const rotateX = ((e.clientY - rect.top - rect.height / 2) / (rect.height / 2)) * -15; 
                    const rotateY = ((e.clientX - rect.left - rect.width / 2) / (rect.width / 2)) * 15;
                    tiltMockup.style.transform = `perspective(1200px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                    isTicking = false;
                });
                isTicking = true;
            }
        });
        showcaseContainer.addEventListener('mouseleave', () => {
            tiltMockup.style.transform = `perspective(1200px) rotateX(0deg) rotateY(0deg)`;
        });
    }

    // [Scroll-Triggered Number Counter - Re-usable]
    function animateCounters() {
        const counters = document.querySelectorAll('.case-study-stats .counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const duration = 2000;
            let startTime = null;
            const step = (currentTime) => {
                if (!startTime) startTime = currentTime;
                const progress = Math.min((currentTime - startTime) / duration, 1);
                const currentVal = Math.floor(progress * target);
                counter.innerText = currentVal >= 1000 ? currentVal.toLocaleString() : currentVal;
                if (progress < 1) requestAnimationFrame(step);
                else counter.innerText = target >= 1000 ? target.toLocaleString() : target;
            };
            requestAnimationFrame(step);
        });
    }

    // Event Listeners for Buttons
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => slideEntireSection('prev'));
        nextBtn.addEventListener('click', () => slideEntireSection('next'));
    }
});

// --- 6. AI SECTION BACKGROUND ANIMATION ---
const aiCanvas = document.getElementById('ai-canvas-bg');
if (aiCanvas) {
    const aiCtx = aiCanvas.getContext('2d');
    let aiNodes = [];

    function resizeAiCanvas() {
        const aiSection = document.querySelector('.ai-section');
        if (aiSection) {
            aiCanvas.width = window.innerWidth;
            aiCanvas.height = aiSection.offsetHeight;
        }
    }

    window.addEventListener('resize', resizeAiCanvas);
    setTimeout(resizeAiCanvas, 100); 

    class AiNode {
        constructor() {
            this.x = Math.random() * aiCanvas.width;
            this.y = Math.random() * aiCanvas.height;
            this.vx = (Math.random() - 0.5) * 0.8;
            this.vy = (Math.random() - 0.5) * 0.8;
            this.radius = Math.random() * 2 + 1;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            if (this.x < 0 || this.x > aiCanvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > aiCanvas.height) this.vy *= -1;
        }

        draw() {
            aiCtx.beginPath();
            aiCtx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            aiCtx.fillStyle = 'rgba(158, 32, 140, 0.8)';
            aiCtx.fill();
        }
    }

    function initAiNetwork() {
        aiNodes = [];
        const numNodes = window.innerWidth < 768 ? 40 : 80;
        for (let i = 0; i < numNodes; i++) {
            aiNodes.push(new AiNode());
        }
    }

    function animateAiNetwork() {
        aiCtx.clearRect(0, 0, aiCanvas.width, aiCanvas.height);
        
        for (let i = 0; i < aiNodes.length; i++) {
            aiNodes[i].update();
            aiNodes[i].draw();
            
            for (let j = i + 1; j < aiNodes.length; j++) {
                const dx = aiNodes[i].x - aiNodes[j].x;
                const dy = aiNodes[i].y - aiNodes[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 120) {
                    aiCtx.beginPath();
                    aiCtx.moveTo(aiNodes[i].x, aiNodes[i].y);
                    aiCtx.lineTo(aiNodes[j].x, aiNodes[j].y);
                    aiCtx.strokeStyle = `rgba(158, 32, 140, ${1 - distance / 120})`;
                    aiCtx.lineWidth = 1;
                    aiCtx.stroke();
                }
            }
        }
        requestAnimationFrame(animateAiNetwork);
    }

    setTimeout(() => {
        initAiNetwork();
        animateAiNetwork();
    }, 200);
}

// --- 7. PARTNER SECTION CANVAS BACKGROUND ---
const pCanvas = document.getElementById('partner-canvas-bg');
if (pCanvas) {
    const pCtx = pCanvas.getContext('2d');
    let pNodes = [];

    function resizePCanvas() {
        const pSection = document.querySelector('.partner-section');
        if (pSection) {
            pCanvas.width = window.innerWidth;
            pCanvas.height = pSection.offsetHeight;
        }
    }

    window.addEventListener('resize', resizePCanvas);
    setTimeout(resizePCanvas, 100);

    class PNode {
        constructor() {
            this.x = Math.random() * pCanvas.width;
            this.y = Math.random() * pCanvas.height;
            this.vx = (Math.random() - 0.5) * 1;
            this.vy = (Math.random() - 0.5) * 1;
            this.radius = Math.random() * 1.5 + 0.5;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            if (this.x < 0 || this.x > pCanvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > pCanvas.height) this.vy *= -1;
        }

        draw() {
            pCtx.beginPath();
            pCtx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            pCtx.fillStyle = 'rgba(0, 210, 255, 0.8)';
            pCtx.fill();
        }
    }

    function initPNetwork() {
        pNodes = [];
        const numNodes = window.innerWidth < 768 ? 30 : 60;
        for (let i = 0; i < numNodes; i++) {
            pNodes.push(new PNode());
        }
    }

    function animatePNetwork() {
        pCtx.clearRect(0, 0, pCanvas.width, pCanvas.height);
        
        for (let i = 0; i < pNodes.length; i++) {
            pNodes[i].update();
            pNodes[i].draw();
            
            for (let j = i + 1; j < pNodes.length; j++) {
                const dx = pNodes[i].x - pNodes[j].x;
                const dy = pNodes[i].y - pNodes[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 150) {
                    pCtx.beginPath();
                    pCtx.moveTo(pNodes[i].x, pNodes[i].y);
                    pCtx.lineTo(pNodes[j].x, pNodes[j].y);
                    pCtx.strokeStyle = `rgba(0, 210, 255, ${(1 - distance / 150) * 0.3})`;
                    pCtx.lineWidth = 1;
                    pCtx.stroke();
                }
            }
        }
        requestAnimationFrame(animatePNetwork);
    }

    setTimeout(() => {
        initPNetwork();
        animatePNetwork();
    }, 200);
}

// --- 8. NEW FAQ SECTION CANVAS BACKGROUND ---
const fCanvas = document.getElementById('faq-canvas-bg');
if (fCanvas) {
    const fCtx = fCanvas.getContext('2d');
    let fParticles = [];

    function resizeFCanvas() {
        const fSection = document.querySelector('.faq-section');
        if (fSection) {
            fCanvas.width = window.innerWidth;
            fCanvas.height = fSection.offsetHeight;
        }
    }

    window.addEventListener('resize', resizeFCanvas);
    setTimeout(resizeFCanvas, 100);

    class FParticle {
        constructor() {
            this.x = Math.random() * fCanvas.width;
            this.y = Math.random() * fCanvas.height;
            this.vy = (Math.random() * 0.4) + 0.1; // Drift slowly upwards
            this.size = Math.random() * 2 + 0.5;
            this.alpha = Math.random() * 0.5 + 0.1;
        }

        update() {
            this.y -= this.vy;
            if (this.y < 0) {
                this.y = fCanvas.height;
                this.x = Math.random() * fCanvas.width;
            }
        }

        draw() {
            fCtx.beginPath();
            fCtx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            fCtx.fillStyle = `rgba(255, 255, 255, ${this.alpha})`;
            fCtx.fill();
        }
    }

    function initFParticles() {
        fParticles = [];
        const numFParticles = window.innerWidth < 768 ? 40 : 80;
        for (let i = 0; i < numFParticles; i++) {
            fParticles.push(new FParticle());
        }
    }

    function animateFParticles() {
        fCtx.clearRect(0, 0, fCanvas.width, fCanvas.height);
        for (let i = 0; i < fParticles.length; i++) {
            fParticles[i].update();
            fParticles[i].draw();
        }
        requestAnimationFrame(animateFParticles);
    }

    setTimeout(() => {
        initFParticles();
        animateFParticles();
    }, 200);
}

// --- 9. FAQ ACCORDION LOGIC ---
const accordionHeaders = document.querySelectorAll('.accordion-header');
if (accordionHeaders.length > 0) {
    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector('.icon');
            const isActive = header.classList.contains('active-header');

            // Close all open accordions first
            document.querySelectorAll('.accordion-content').forEach(c => {
                c.style.maxHeight = null;
            });
            document.querySelectorAll('.accordion-header').forEach(h => {
                h.classList.remove('active-header');
            });

            // Open clicked one if it wasn't already open
            if (!isActive) {
                header.classList.add('active-header');
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
}

// --- 10. TESTIMONIAL SLIDER LOGIC ---
const testiTrack = document.getElementById('testi-track');
const testiPrev = document.getElementById('testi-prev');
const testiNext = document.getElementById('testi-next');
const testiDots = document.querySelectorAll('.testi-dot');
let currentTesti = 0;
const totalTesti = 3;

function updateTestiSlider() {
    if(!testiTrack) return;
    testiTrack.style.transform = `translateX(-${currentTesti * 100}%)`;
    testiDots.forEach(dot => dot.classList.remove('active'));
    if(testiDots[currentTesti]) testiDots[currentTesti].classList.add('active');
}

if (testiPrev && testiNext) {
    testiNext.addEventListener('click', () => {
        currentTesti = (currentTesti + 1) % totalTesti;
        updateTestiSlider();
    });
    testiPrev.addEventListener('click', () => {
        currentTesti = (currentTesti - 1 + totalTesti) % totalTesti;
        updateTestiSlider();
    });
    
    testiDots.forEach(dot => {
        dot.addEventListener('click', (e) => {
            currentTesti = parseInt(e.target.getAttribute('data-index'));
            updateTestiSlider();
        });
    });

    // Touch Swipe Logic for Testimonials
    let tStartX = 0;
    let tEndX = 0;
    const testiWrapper = document.querySelector('.testi-slider-wrapper');

    if(testiWrapper) {
        testiWrapper.addEventListener('touchstart', e => {
            tStartX = e.changedTouches[0].screenX;
        }, {passive: true});

        testiWrapper.addEventListener('touchend', e => {
            tEndX = e.changedTouches[0].screenX;
            if (tEndX < tStartX - 50) {
                currentTesti = (currentTesti + 1) % totalTesti;
                updateTestiSlider();
            }
            if (tEndX > tStartX + 50) {
                currentTesti = (currentTesti - 1 + totalTesti) % totalTesti;
                updateTestiSlider();
            }
        }, {passive: true});
    }
}

// --- 11. TESTIMONIAL SCROLL ANIMATION ---
const testiElements = document.querySelectorAll('.testi-title, .testi-subtitle, .testi-slider-wrapper');
if (testiElements.length > 0) {
    const testiObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('testi-animate-in');
                testiObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    testiElements.forEach(el => testiObserver.observe(el));
}

// --- 12. TESTIMONIAL CANVAS BACKGROUND (Floating Tech Nodes) ---
const tCanvas = document.getElementById('testimonial-canvas');
if (tCanvas) {
    const tCtx = tCanvas.getContext('2d');
    let tParticles = [];

    function resizeTCanvas() {
        const tSection = document.querySelector('.testimonial-section');
        if (tSection) {
            tCanvas.width = window.innerWidth;
            tCanvas.height = tSection.offsetHeight;
        }
    }
    window.addEventListener('resize', resizeTCanvas);
    setTimeout(resizeTCanvas, 100);

    class TParticle {
        constructor() {
            this.x = Math.random() * tCanvas.width;
            this.y = Math.random() * tCanvas.height;
            this.vx = (Math.random() - 0.5) * 0.5;
            this.vy = (Math.random() - 0.5) * 0.5;
            this.size = Math.random() * 2 + 1;
        }
        update() {
            this.x += this.vx;
            this.y += this.vy;
            if (this.x < 0 || this.x > tCanvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > tCanvas.height) this.vy *= -1;
        }
        draw() {
            // Bright colored nodes matching the theme
            tCtx.fillStyle = Math.random() > 0.5 ? '#9E208C' : '#00d2ff';
            tCtx.beginPath();
            tCtx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            tCtx.fill();
        }
    }

    function initTParticles() {
        tParticles = [];
        const numTParticles = window.innerWidth < 768 ? 40 : 80;
        for (let i = 0; i < numTParticles; i++) {
            tParticles.push(new TParticle());
        }
    }

    function animateTParticles() {
        tCtx.clearRect(0, 0, tCanvas.width, tCanvas.height);
        for (let i = 0; i < tParticles.length; i++) {
            tParticles[i].update();
            tParticles[i].draw();
            
            // Draw connecting lines if close enough
            for (let j = i + 1; j < tParticles.length; j++) {
                const dx = tParticles[i].x - tParticles[j].x;
                const dy = tParticles[i].y - tParticles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 100) {
                    tCtx.beginPath();
                    tCtx.moveTo(tParticles[i].x, tParticles[i].y);
                    tCtx.lineTo(tParticles[j].x, tParticles[j].y);
                    tCtx.strokeStyle = `rgba(255, 255, 255, ${(1 - distance / 100) * 0.15})`; // Faint white lines
                    tCtx.lineWidth = 1;
                    tCtx.stroke();
                }
            }
        }
        requestAnimationFrame(animateTParticles);
    }
    
    setTimeout(() => {
        initTParticles();
        animateTParticles();
    }, 200);
}

// --- 13. CONTACT SECTION CANVAS BACKGROUND ---
const cCanvas = document.getElementById('contact-canvas-bg');
if (cCanvas) {
    const cCtx = cCanvas.getContext('2d');
    let cParticles = [];

    function resizeCCanvas() {
        const cSection = document.querySelector('.contact-section');
        if (cSection) {
            cCanvas.width = window.innerWidth;
            cCanvas.height = cSection.offsetHeight;
        }
    }

    window.addEventListener('resize', resizeCCanvas);
    setTimeout(resizeCCanvas, 100);

    class CParticle {
        constructor() {
            this.x = Math.random() * cCanvas.width;
            this.y = Math.random() * cCanvas.height;
            this.vx = (Math.random() - 0.5) * 0.6;
            this.vy = (Math.random() - 0.5) * 0.6;
            this.size = Math.random() * 2 + 0.5;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;
            if (this.x < 0 || this.x > cCanvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > cCanvas.height) this.vy *= -1;
        }

        draw() {
            cCtx.beginPath();
            cCtx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            cCtx.fillStyle = 'rgba(255, 255, 255, 0.4)';
            cCtx.fill();
        }
    }

    function initCParticles() {
        cParticles = [];
        const numCParticles = window.innerWidth < 768 ? 30 : 60;
        for (let i = 0; i < numCParticles; i++) {
            cParticles.push(new CParticle());
        }
    }

    function animateCParticles() {
        cCtx.clearRect(0, 0, cCanvas.width, cCanvas.height);
        for (let i = 0; i < cParticles.length; i++) {
            cParticles[i].update();
            cParticles[i].draw();

            for (let j = i + 1; j < cParticles.length; j++) {
                const dx = cParticles[i].x - cParticles[j].x;
                const dy = cParticles[i].y - cParticles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < 120) {
                    cCtx.beginPath();
                    cCtx.moveTo(cParticles[i].x, cParticles[i].y);
                    cCtx.lineTo(cParticles[j].x, cParticles[j].y);
                    cCtx.strokeStyle = `rgba(255, 255, 255, ${(1 - distance / 120) * 0.1})`;
                    cCtx.lineWidth = 1;
                    cCtx.stroke();
                }
            }
        }
        requestAnimationFrame(animateCParticles);
    }

    setTimeout(() => {
        initCParticles();
        animateCParticles();
    }, 200);
}

// --- 14. INSIGHTS SECTION CANVAS BACKGROUND (Geometrical Tech Elements) ---
const iCanvas = document.getElementById('insights-canvas-bg');
if (iCanvas) {
    const iCtx = iCanvas.getContext('2d');
    let iParticles = [];

    function resizeICanvas() {
        const iSection = document.querySelector('.insights-section');
        if (iSection) {
            iCanvas.width = window.innerWidth;
            iCanvas.height = iSection.offsetHeight;
        }
    }

    window.addEventListener('resize', resizeICanvas);
    setTimeout(resizeICanvas, 100);

    class IParticle {
        constructor() {
            this.x = Math.random() * iCanvas.width;
            this.y = Math.random() * iCanvas.height;
            this.vx = (Math.random() - 0.5) * 0.8;
            this.vy = (Math.random() - 0.5) * 0.8;
            this.size = Math.random() * 3 + 2;
            this.type = Math.random() > 0.5 ? 'cross' : 'square';
            this.angle = Math.random() * Math.PI * 2;
            this.spin = (Math.random() - 0.5) * 0.02;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;
            this.angle += this.spin;

            if (this.x < 0 || this.x > iCanvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > iCanvas.height) this.vy *= -1;
        }

        draw() {
            iCtx.save();
            iCtx.translate(this.x, this.y);
            iCtx.rotate(this.angle);
            iCtx.strokeStyle = 'rgba(0, 210, 255, 0.4)';
            iCtx.lineWidth = 1.5;

            if (this.type === 'cross') {
                iCtx.beginPath();
                iCtx.moveTo(-this.size, 0); iCtx.lineTo(this.size, 0);
                iCtx.moveTo(0, -this.size); iCtx.lineTo(0, this.size);
                iCtx.stroke();
            } else {
                iCtx.strokeRect(-this.size / 2, -this.size / 2, this.size, this.size);
            }
            iCtx.restore();
        }
    }

    function initIParticles() {
        iParticles = [];
        const numIParticles = window.innerWidth < 768 ? 20 : 40;
        for (let i = 0; i < numIParticles; i++) {
            iParticles.push(new IParticle());
        }
    }

    function animateIParticles() {
        iCtx.clearRect(0, 0, iCanvas.width, iCanvas.height);
        
        for (let i = 0; i < iParticles.length; i++) {
            iParticles[i].update();
            iParticles[i].draw();

            // Connect nearby geometrical nodes with tech lines
            for (let j = i + 1; j < iParticles.length; j++) {
                const dx = iParticles[i].x - iParticles[j].x;
                const dy = iParticles[i].y - iParticles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < 100) {
                    iCtx.beginPath();
                    iCtx.moveTo(iParticles[i].x, iParticles[i].y);
                    iCtx.lineTo(iParticles[j].x, iParticles[j].y);
                    iCtx.strokeStyle = `rgba(0, 210, 255, ${(1 - distance / 100) * 0.2})`;
                    iCtx.lineWidth = 1;
                    iCtx.stroke();
                }
            }
        }
        requestAnimationFrame(animateIParticles);
    }

    setTimeout(() => {
        initIParticles();
        animateIParticles();
    }, 200);
}
// --- FOOTER NEURAL ANIMATION ---
const ftrCanvas = document.getElementById('footer-canvas');
const ftrCtx = ftrCanvas.getContext('2d');
let ftrNodes = [];

function resizeFooterCanvas() {
    const ftrSection = document.querySelector('.main-footer');
    ftrCanvas.width = window.innerWidth;
    ftrCanvas.height = ftrSection.offsetHeight;
}

window.addEventListener('resize', resizeFooterCanvas);
resizeFooterCanvas();

class FooterNode {
    constructor() {
        this.x = Math.random() * ftrCanvas.width;
        this.y = Math.random() * ftrCanvas.height;
        this.vx = (Math.random() - 0.5) * 0.5;
        this.vy = (Math.random() - 0.5) * 0.5;
    }
    update() {
        this.x += this.vx;
        this.y += this.vy;
        if (this.x < 0 || this.x > ftrCanvas.width) this.vx *= -1;
        if (this.y < 0 || this.y > ftrCanvas.height) this.vy *= -1;
    }
}

function initFooterNodes() {
    for (let i = 0; i < 40; i++) ftrNodes.push(new FooterNode());
}

function animateFooter() {
    ftrCtx.clearRect(0, 0, ftrCanvas.width, ftrCanvas.height);
    ftrNodes.forEach((node, i) => {
        node.update();
        ftrNodes.slice(i + 1).forEach(target => {
            const dist = Math.hypot(node.x - target.x, node.y - target.y);
            if (dist < 150) {
                ftrCtx.beginPath();
                ftrCtx.strokeStyle = `rgba(216, 32, 44, ${1 - dist / 150})`; // Red lines
                ftrCtx.lineWidth = 0.5;
                ftrCtx.moveTo(node.x, node.y);
                ftrCtx.lineTo(target.x, target.y);
                ftrCtx.stroke();
            }
        });
    });
    requestAnimationFrame(animateFooter);
}

initFooterNodes();
animateFooter();

document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Initialize Particles in the Hero Section
    // Requires particles.js library to be loaded in the HTML
    if (typeof particlesJS !== 'undefined') {
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 50, "density": { "enable": true, "value_area": 800 } },
                "color": { "value": "#e3003a" }, 
                "shape": { "type": "circle" },
                "opacity": { "value": 0.4, "random": true },
                "size": { "value": 4, "random": true },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#e3003a",
                    "opacity": 0.3,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1.5,
                    "direction": "none",
                    "random": true,
                    "out_mode": "out"
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": { "enable": true, "mode": "grab" },
                    "onclick": { "enable": true, "mode": "push" },
                    "resize": true
                },
                "modes": {
                    "grab": { "distance": 200, "line_linked": { "opacity": 0.6 } },
                    "push": { "particles_nb": 3 }
                }
            },
            "retina_detect": true
        });
    }

    
    // 2. FAQ Accordion Logic
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('span');

            if (content.style.maxHeight) {
                // Close current
                content.style.maxHeight = null;
                icon.textContent = '+';
                this.style.color = 'var(--brand-black)';
            } else {
                // Close all other open accordions
                document.querySelectorAll('.accordion-content').forEach(item => {
                    item.style.maxHeight = null;
                });
                document.querySelectorAll('.accordion-header').forEach(hdr => {
                    hdr.style.color = 'var(--brand-black)';
                    hdr.querySelector('span').textContent = '+';
                });

                // Open clicked accordion
                content.style.maxHeight = content.scrollHeight + "px";
                icon.textContent = '-';
                this.style.color = 'var(--brand-red)'; // Highlight open question
            }
        });
    });

});