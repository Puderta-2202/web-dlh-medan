import './bootstrap';
import { createIcons, Menu, X, ArrowRight, Shield, Users, Award, Sparkles, Building, Target, Eye, FileCheck, BarChart3, CheckCircle, Settings, FileText, ClipboardList, ArrowUpRight, MapPin, Phone, Mail, Clock, ExternalLink, MessageCircle, Send, Facebook, Twitter, Instagram, Youtube, Heart, Star } from 'lucide';

// Initialize Lucide icons
document.addEventListener('DOMContentLoaded', function() {
    // Create all icons
    createIcons({
        icons: {
            Menu, X, ArrowRight, Shield, Users, Award, Sparkles, Building, Target, Eye,
            FileCheck, BarChart3, CheckCircle, Settings, FileText, ClipboardList, ArrowUpRight,
            MapPin, Phone, Mail, Clock, ExternalLink, MessageCircle, Send,
            Facebook, Twitter, Instagram, Youtube, Heart, Star
        }
    });
    
    initializeHeaderScroll();
    initializeMobileMenu();
    initializeSmoothScroll();
    initializeFormHandlers();
    initializeAnimations();
});

// Header scroll effects
function initializeHeaderScroll() {
    const header = document.getElementById('main-header');
    if (!header) return;
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
}

// Mobile menu functionality
function initializeMobileMenu() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            
            const menuIcon = this.querySelector('[data-lucide="menu"]');
            const xIcon = this.querySelector('[data-lucide="x"]');
            
            if (mobileMenu.classList.contains('hidden')) {
                if (menuIcon) menuIcon.style.display = 'block';
                if (xIcon) xIcon.style.display = 'none';
            } else {
                if (menuIcon) menuIcon.style.display = 'none';
                if (xIcon) xIcon.style.display = 'block';
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                const menuIcon = mobileMenuButton.querySelector('[data-lucide="menu"]');
                const xIcon = mobileMenuButton.querySelector('[data-lucide="x"]');
                if (menuIcon) menuIcon.style.display = 'block';
                if (xIcon) xIcon.style.display = 'none';
            }
        });
    }
}

// Smooth scrolling for anchor links
function initializeSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            
            if (target) {
                const headerHeight = document.getElementById('main-header')?.offsetHeight || 80;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    const mobileMenuButton = document.getElementById('mobile-menu-button');
                    if (mobileMenuButton) {
                        const menuIcon = mobileMenuButton.querySelector('[data-lucide="menu"]');
                        const xIcon = mobileMenuButton.querySelector('[data-lucide="x"]');
                        if (menuIcon) menuIcon.style.display = 'block';
                        if (xIcon) xIcon.style.display = 'none';
                    }
                }
            }
        });
    });
}

// Form handlers
function initializeFormHandlers() {
    // Contact form
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.classList.add('loading');
                submitButton.disabled = true;
            }
        });
    }
    
    // Newsletter form
    const newsletterForms = document.querySelectorAll('form[action*="newsletter"]');
    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.classList.add('loading');
                submitButton.disabled = true;
            }
        });
    });
    
    // Show success/error messages
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success')) {
        showNotification('Pesan berhasil dikirim!', 'success');
    }
    if (urlParams.get('newsletter_success')) {
        showNotification('Berhasil berlangganan newsletter!', 'success');
    }
}

// Animations and interactions
function initializeAnimations() {
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.group, .card, .service-item').forEach(el => {
        observer.observe(el);
    });
    
    // Parallax effect for hero background elements
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax');
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });
}

// Utility functions
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
        type === 'success' ? 'bg-green-500 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Auto remove
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Loading states
function setLoading(element, isLoading) {
    if (isLoading) {
        element.classList.add('loading');
        element.disabled = true;
    } else {
        element.classList.remove('loading');
        element.disabled = false;
    }
}

// Copy to clipboard functionality
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        showNotification('Disalin ke clipboard!', 'success');
    }).catch(() => {
        showNotification('Gagal menyalin', 'error');
    });
}

// Lazy loading for images
function initializeLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// Initialize lazy loading
document.addEventListener('DOMContentLoaded', initializeLazyLoading);

// Export utilities for global use
window.DLHUtils = {
    showNotification,
    setLoading,
    copyToClipboard
};