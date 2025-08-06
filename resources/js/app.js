import './bootstrap';
import { createIcons, Menu, X, ArrowRight, Shield, Users, Award, Sparkles, Building, Target, Eye, FileCheck, BarChart3, CheckCircle, Settings, FileText, ClipboardList, ArrowUpRight, MapPin, Phone, Mail, Clock, ExternalLink, MessageCircle, Send, Facebook, Twitter, Instagram, Youtube, Heart, Star, Download, Calendar, CreditCard, AlertCircle } from 'lucide';

// Buat objek ikon yang dapat diakses secara global
const allIcons = {
    Menu, X, ArrowRight, Shield, Users, Award, Sparkles, Building, Target, Eye,
    FileCheck, BarChart3, CheckCircle, Settings, FileText, ClipboardList, ArrowUpRight,
    MapPin, Phone, Mail, Clock, ExternalLink, MessageCircle, Send,
    Facebook, Twitter, Instagram, Youtube, Heart, Star, Download, Calendar, CreditCard, AlertCircle
};

// Initialize Lucide icons
document.addEventListener('DOMContentLoaded', function() {
    createIcons({
        icons: allIcons
    });
    
    initializeHeaderScroll();
    initializeMobileMenu();
    initializeSmoothScroll();
    initializeFormHandlers();
    initializeAnimations();
    initializeServiceModal();
});

// Service Modal functionality
function initializeServiceModal() {
    const modal = document.getElementById('service-modal');
    const closeBtn = document.getElementById('close-modal');
    
    const servicesDataScript = document.getElementById('services-data');
    if (!servicesDataScript) {
        console.error('Services data script not found.');
        return;
    }
    const services = JSON.parse(servicesDataScript.textContent);

    if (!modal) return;
    
    document.addEventListener('click', function(e) {
        const button = e.target.closest('.open-service-modal');
        if (button) {
            e.preventDefault();
            e.stopPropagation();
            
            const serviceId = button.dataset.serviceId;
            const service = services.find(s => s.id === serviceId);

            if (service) {
                populateModal(service.title, service.description, service.icon, service.requirements);
                openModal();
            } else {
                console.error(`Service with ID ${serviceId} not found.`);
            }
        }
    });
    
    closeBtn?.addEventListener('click', closeModal);
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
    
    function populateModal(title, description, icon, requirements) {
        document.getElementById('modal-service-title').textContent = `Persyaratan ${title}`;
        document.getElementById('modal-service-description').textContent = description;
        
        const iconElement = document.getElementById('modal-service-icon');
        iconElement.setAttribute('data-lucide', icon);
        
        document.getElementById('modal-timeframe').textContent = requirements.timeframe || '-';
        document.getElementById('modal-validity').textContent = requirements.validity || '-';
        document.getElementById('modal-cost').textContent = requirements.cost || '-';
        document.getElementById('modal-note').textContent = requirements.note || '-';
        
        const documentsContainer = document.getElementById('modal-documents');
        documentsContainer.innerHTML = '';
        
        if (requirements.documents && requirements.documents.length > 0) {
            requirements.documents.forEach((doc, index) => {
                const docElement = document.createElement('div');
                docElement.className = 'flex items-start space-x-3 p-4 hover:bg-gray-50 transition-colors duration-200';
                docElement.innerHTML = `
                    <div class="w-6 h-6 rounded-full bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-white text-xs font-medium">${index + 1}</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-800 leading-relaxed">${doc}</p>
                    </div>
                `;
                documentsContainer.appendChild(docElement);
            });
        }
        
        createIcons({ icons: allIcons });
    }
    
    function openModal() {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        const modalContent = modal.querySelector('.relative');
        modalContent.style.transform = 'scale(0.9) translateY(20px)';
        modalContent.style.opacity = '0';
        
        setTimeout(() => {
            modalContent.style.transform = 'scale(1) translateY(0)';
            modalContent.style.opacity = '1';
            modalContent.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        }, 10);
    }
    
    function closeModal() {
        const modalContent = modal.querySelector('.relative');
        modalContent.style.transform = 'scale(0.9) translateY(20px)';
        modalContent.style.opacity = '0';
        modalContent.style.transition = 'all 0.2s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 200);
    }
}

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
    
    document.querySelectorAll('.group, .card, .service-item').forEach(el => {
        observer.observe(el);
    });
    
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
    
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
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