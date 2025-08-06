<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dinas Lingkungan Hidup Kota Medan')</title>
    <meta name="description" content="@yield('description', 'Dinas Lingkungan Hidup Kota Medan - Melayani masyarakat dalam pengelolaan dan perlindungan lingkungan hidup untuk mewujudkan Kota Medan yang bersih, hijau, dan berkelanjutan.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS dan JavaScript -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
    
    <style>
        /* Custom styles for modal animations */
        #service-modal {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        #service-modal.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        #service-modal:not(.hidden) {
            opacity: 1;
            visibility: visible;
        }
        
        /* Scrollbar styles for modal */
        #service-modal .overflow-y-auto::-webkit-scrollbar {
            width: 6px;
        }
        
        #service-modal .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        
        #service-modal .overflow-y-auto::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #f97316, #dc2626);
            border-radius: 3px;
        }
        
        #service-modal .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #ea580c, #b91c1c);
        }
        
        /* Modal backdrop blur effect */
        #service-modal {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        
        /* Header scroll effect */
        #main-header.scrolled {
            @apply bg-white/80 backdrop-blur-xl border-b border-white/20 shadow-lg shadow-orange-500/5;
        }
        
        /* Loading animation for buttons */
        .loading {
            position: relative;
            pointer-events: none;
        }
        
        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 16px;
            height: 16px;
            margin: -8px 0 0 -8px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #f97316;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Focus styles for accessibility */
        .open-service-modal:focus {
            outline: 2px solid #f97316;
            outline-offset: 2px;
        }
        
        /* Notification styles */
        .notification {
            animation: slideInRight 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-background text-foreground antialiased">
    <!-- Header -->
    @include('partials.header')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    
    <!-- Global Scripts -->
    <script>
        // Global variables and utilities
        window.DLH = {
            // API endpoints
            endpoints: {
                contact: "{{ route('contact.send') }}",
                newsletter: "{{ route('newsletter.subscribe') }}"
            },
            
            // CSRF token
            csrfToken: "{{ csrf_token() }}",
            
            // Utilities
            utils: {
                showNotification: function(message, type = 'info') {
                    if (window.DLHUtils && window.DLHUtils.showNotification) {
                        window.DLHUtils.showNotification(message, type);
                    }
                },
                
                setLoading: function(element, isLoading) {
                    if (window.DLHUtils && window.DLHUtils.setLoading) {
                        window.DLHUtils.setLoading(element, isLoading);
                    }
                }
            }
        };
        
        // Debug: Check if elements are loaded
        document.addEventListener('DOMContentLoaded', function() {
            console.log('✅ Laravel DLH Website loaded');
            
            // Check modal element
            const modal = document.getElementById('service-modal');
            if (modal) {
                console.log('✅ Modal element found');
            } else {
                console.error('❌ Modal element not found');
            }
            
            // Check modal buttons
            const buttons = document.querySelectorAll('.open-service-modal');
            console.log(`✅ Found ${buttons.length} service modal buttons`);
            
            // Add aria-labels for better accessibility
            buttons.forEach((button, index) => {
                const title = button.dataset.serviceTitle;
                button.setAttribute('aria-label', `Lihat persyaratan untuk ${title}`);
                console.log(`✅ Button ${index + 1}: ${title}`);
            });
            
            // Handle flash messages
            @if(session('success'))
                setTimeout(() => {
                    if (window.DLH.utils.showNotification) {
                        window.DLH.utils.showNotification('{{ session('success') }}', 'success');
                    }
                }, 500);
            @endif
            
            @if(session('newsletter_success'))
                setTimeout(() => {
                    if (window.DLH.utils.showNotification) {
                        window.DLH.utils.showNotification('{{ session('newsletter_success') }}', 'success');
                    }
                }, 500);
            @endif
            
            @if($errors->any())
                setTimeout(() => {
                    if (window.DLH.utils.showNotification) {
                        window.DLH.utils.showNotification('{{ $errors->first() }}', 'error');
                    }
                }, 500);
            @endif
        });
    </script>
    
    @stack('scripts')
</body>
</html>