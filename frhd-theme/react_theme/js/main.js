/**
 * Main JavaScript for React.dev Blog Theme
 */
(function() {
    'use strict';

    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const mainNavigation = document.querySelector('.main-navigation');

        if (mobileMenuToggle && mainNavigation) {
            mobileMenuToggle.addEventListener('click', function() {
                mainNavigation.classList.toggle('toggled');

                if (mainNavigation.classList.contains('toggled')) {
                    mobileMenuToggle.setAttribute('aria-expanded', 'true');
                } else {
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // Add smooth scrolling to anchor links
        const anchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');

        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjust for header height
                        behavior: 'smooth'
                    });
                }
            });
        });

        const header = document.querySelector('.site-header');
        let lastScrollY = window.scrollY;

        function updateHeader() {
            if (window.scrollY > 0) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
            lastScrollY = window.scrollY;
        }

        // Add throttling to improve performance
        let ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateHeader();
                    ticking = false;
                });
                ticking = true;
            }
        });
    });
})();
