<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dinas Lingkungan Hidup Kota Medan')</title>
    <meta name="description" content="@yield('description', 'Dinas Lingkungan Hidup Kota Medan - Melayani masyarakat dalam pengelolaan dan perlindungan lingkungan hidup untuk mewujudkan Kota Medan yang bersih, hijau, dan berkelanjutan.')">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
    @stack('styles')
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
    
    <!-- Scripts -->
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    const menuIcon = this.querySelector('[data-lucide="menu"]');
                    const xIcon = this.querySelector('[data-lucide="x"]');
                    
                    if (mobileMenu.classList.contains('hidden')) {
                        menuIcon.style.display = 'block';
                        xIcon.style.display = 'none';
                    } else {
                        menuIcon.style.display = 'none';
                        xIcon.style.display = 'block';
                    }
                });
            }
        });
        
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('main-header');
            if (header) {
                if (window.scrollY > 10) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>