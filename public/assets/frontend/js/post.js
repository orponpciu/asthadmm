document.addEventListener('DOMContentLoaded', () => {
    
    // Smooth Scroll Reveal Animation setup
    const animateElements = document.querySelectorAll('[data-aos]');

    // Initialize elements to be hidden initially via inline styles 
    // (Ensures it works even if CSS doesn't load instantly)
    animateElements.forEach(el => {
        el.style.opacity = '0';
        // Determine starting position based on data attribute
        if(el.getAttribute('data-aos') === 'fade-left') {
            el.style.transform = 'translateX(40px)';
        } else if(el.getAttribute('data-aos') === 'fade-right') {
            el.style.transform = 'translateX(-40px)';
        } else {
            el.style.transform = 'translateY(40px)';
        }
        
        el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        
        // Add delay if specified
        const delay = el.getAttribute('data-aos-delay');
        if (delay) {
            el.style.transitionDelay = `${delay}ms`;
        }
    });

    // Intersection Observer to trigger animations on scroll
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1 // Trigger when 10% of the element is visible
    };

    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Apply visible styles
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translate(0, 0)';
                
                // Stop observing once animated so it doesn't repeat
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Attach observer to all elements
    animateElements.forEach(el => scrollObserver.observe(el));

    // Simple sticky sidebar logic for desktop
    const sidebar = document.querySelector('.post-sidebar');
    if (window.innerWidth > 991 && sidebar) {
        sidebar.style.position = 'sticky';
        sidebar.style.top = '100px'; // Adjust based on your navigation bar height
    }
});