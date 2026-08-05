/**
 * Main JavaScript File
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

(function($) {
    'use strict';
    
    // Wait for DOM to be ready
    $(document).ready(function() {
        
        // ============================================
        // Hero Section Enhancements
        // ============================================
        
        const heroSection = document.querySelector('.hero-section');
        
        if (heroSection) {
            // Parallax effect on scroll
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const rate = scrolled * 0.3;
                
                if (heroSection) {
                    heroSection.style.backgroundPositionY = rate + 'px';
                }
            }, { passive: true });
            
            // Smooth scroll for CTA button
            const ctaButton = heroSection.querySelector('.hero-cta-button');
            if (ctaButton) {
                const href = ctaButton.getAttribute('href');
                if (href && href.startsWith('#')) {
                    ctaButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);
                        
                        if (targetElement) {
                            const offsetTop = targetElement.getBoundingClientRect().top + window.pageYOffset - 50;
                            window.scrollTo({
                                top: offsetTop,
                                behavior: 'smooth'
                            });
                        }
                    });
                }
            }
            
            // Intersection Observer for animation
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const content = entry.target.querySelector('.hero-content');
                        const image = entry.target.querySelector('.hero-product-image');
                        
                        if (content) {
                            content.style.opacity = '1';
                            content.style.transform = 'translateY(0)';
                        }
                        if (image) {
                            image.style.opacity = '1';
                            image.style.transform = 'translateY(0)';
                        }
                    }
                });
            }, {
                threshold: 0.1
            });
            
            // Set initial states
            const content = heroSection.querySelector('.hero-content');
            const image = heroSection.querySelector('.hero-product-image');
            
            if (content) {
                content.style.opacity = '0';
                content.style.transform = 'translateY(30px)';
                content.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            }
            if (image) {
                image.style.opacity = '0';
                image.style.transform = 'translateY(30px)';
                image.style.transition = 'opacity 0.8s ease 0.2s, transform 0.8s ease 0.2s';
            }
            
            observer.observe(heroSection);
        }
        
        // ============================================
        // Lazy Loading Images
        // ============================================
        
        if ('IntersectionObserver' in window) {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
        
        // ============================================
        // Mobile Menu Toggle (if needed)
        // ============================================
        
        // Will be implemented if required
        
    });
    
    // ============================================
    // Window Load
    // ============================================
    
    $(window).on('load', function() {
        // Additional init after everything loads
    });
    
})(jQuery);