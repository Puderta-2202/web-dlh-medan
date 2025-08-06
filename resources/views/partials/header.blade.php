<header id="main-header" class="sticky top-0 z-50 transition-all duration-500 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-3">
            <!-- Logo -->
            <div class="flex items-center group cursor-pointer">
    <div class="relative">
        <img 
            src="{{ asset('asset/logo-dlh.png') }}" 
            alt="Dinas Lingkungan Hidup Kota Medan" 
            class="h-16 w-auto object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-lg"
        />
    </div>
</div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-1">
                <a href="{{ route('home') }}#home" 
                   class="px-6 py-3 text-gray-700 hover:text-orange-600 rounded-xl hover:bg-orange-50/50 transition-all duration-300 relative group font-medium">
                    Beranda
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-orange-500 to-red-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                </a>
                <a href="{{ route('home') }}#about" 
                   class="px-6 py-3 text-gray-700 hover:text-orange-600 rounded-xl hover:bg-orange-50/50 transition-all duration-300 relative group font-medium">
                    Tentang
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-orange-500 to-red-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                </a>
                <a href="{{ route('home') }}#services" 
                   class="px-6 py-3 text-gray-700 hover:text-orange-600 rounded-xl hover:bg-orange-50/50 transition-all duration-300 relative group font-medium">
                    Layanan
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-orange-500 to-red-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                </a>
                <a href="{{ route('home') }}#contact" 
                   class="px-6 py-3 text-gray-700 hover:text-orange-600 rounded-xl hover:bg-orange-50/50 transition-all duration-300 relative group font-medium">
                    Kontak
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-orange-500 to-red-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                </a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden hover:bg-orange-50/50 transition-colors duration-300 p-2 rounded-lg">
                <i data-lucide="menu" class="h-6 w-6"></i>
                <i data-lucide="x" class="h-6 w-6" style="display: none;"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden py-4 border-t border-gray-200/50 backdrop-blur-sm hidden">
            <nav class="flex flex-col space-y-2">
                <a href="{{ route('home') }}#home" 
                   class="px-4 py-3 text-gray-700 hover:text-orange-600 hover:bg-orange-50/50 rounded-xl transition-all duration-300 font-medium">
                    Beranda
                </a>
                <a href="{{ route('home') }}#about" 
                   class="px-4 py-3 text-gray-700 hover:text-orange-600 hover:bg-orange-50/50 rounded-xl transition-all duration-300 font-medium">
                    Tentang
                </a>
                <a href="{{ route('home') }}#services" 
                   class="px-4 py-3 text-gray-700 hover:text-orange-600 hover:bg-orange-50/50 rounded-xl transition-all duration-300 font-medium">
                    Layanan
                </a>
                <a href="{{ route('home') }}#contact" 
                   class="px-4 py-3 text-gray-700 hover:text-orange-600 hover:bg-orange-50/50 rounded-xl transition-all duration-300 font-medium">
                    Kontak
                </a>
            </nav>
        </div>
    </div>
</header>

<style>
#main-header.scrolled {
    @apply bg-white/80 backdrop-blur-xl border-b border-white/20 shadow-lg shadow-orange-500/5;
}
</style>