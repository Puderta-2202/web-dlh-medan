@extends('layouts.app')

@section('title', 'DLH Kota Medan')
@section('description', 'Dinas Lingkungan Hidup Kota Medan melayani masyarakat dalam pengelolaan dan perlindungan lingkungan hidup untuk mewujudkan Kota Medan yang bersih, hijau, dan berkelanjutan.')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-orange-50 via-red-50 to-yellow-50">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-100/20 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-red-100/20"></div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-orange-400/20 to-red-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-red-400/20 to-yellow-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-gradient-to-br from-yellow-400/20 to-orange-400/20 rounded-full blur-3xl animate-pulse"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Content -->
            <div class="space-y-8 z-10">
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-100 to-red-100 rounded-full border border-orange-200/50 backdrop-blur-sm">
                        <i data-lucide="sparkles" class="h-4 w-4 text-orange-600 mr-2"></i>
                        <span class="text-sm text-orange-700 font-medium">Melayani dengan Dedikasi</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl leading-tight">
                        <span class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent">
                            Dinas Lingkungan Hidup
                        </span>
                        <br />
                        <span class="bg-gradient-to-r from-orange-600 via-red-500 to-yellow-600 bg-clip-text text-transparent">
                            Kota Medan
                        </span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                        Melayani masyarakat dalam pengelolaan dan perlindungan lingkungan hidup 
                        untuk mewujudkan Kota Medan yang <span class="text-orange-600 font-semibold">bersih, hijau, dan berkelanjutan</span>.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#services" 
                       class="inline-flex items-center justify-center px-8 py-4 text-white bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 rounded-2xl shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 transition-all duration-300 hover:scale-105 group font-medium">
                        Lihat Layanan
                        <i data-lucide="arrow-right" class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="#contact" 
                       class="inline-flex items-center justify-center px-8 py-4 text-orange-700 border-2 border-orange-200 hover:bg-orange-50 rounded-2xl backdrop-blur-sm hover:scale-105 transition-all duration-300 font-medium">
                        Hubungi Kami
                    </a>
                </div>

                <!-- Enhanced Stats -->
                <div class="grid grid-cols-3 gap-8 pt-8">
                    @foreach($stats as $stat)
                    <div class="text-center group">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br {{ $stat['color'] }} p-4 mb-3 shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <i data-lucide="{{ $stat['icon'] }}" class="h-8 w-8 text-white"></i>
                        </div>
                        <div class="text-3xl text-gray-900 font-bold mb-1">{{ $stat['value'] }}</div>
                        <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Enhanced Image -->
            <div class="relative z-10">
                <div class="relative group">
                    <!-- Glowing backdrop -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-orange-400 via-red-400 to-yellow-400 rounded-3xl blur-2xl opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                    
                    <!-- Main image container -->
                    <div class="relative bg-white/10 backdrop-blur-lg rounded-3xl p-2 border border-white/20 shadow-2xl">
                        <img
                            src="{{ asset('asset/halo.png') }}"
                            alt="Lingkungan Hidup Medan"
                            class="rounded-2xl shadow-xl w-full h-96 object-cover group-hover:scale-105 transition-transform duration-700"
                        />
                        
                        <!-- Overlay gradient -->
                        <div class="absolute inset-2 bg-gradient-to-t from-orange-900/20 to-transparent rounded-2xl"></div>
                        
                        <!-- Floating badge -->
                        <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-sm rounded-2xl px-4 py-2 shadow-lg">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-medium text-gray-800">Aktif Melayani</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
@include('partials.services', ['services' => $services])

<!-- About Section -->
@include('partials.about', ['values' => $values, 'stats' => $stats])

<!-- Contact Section -->
@include('partials.contact', ['contactInfo' => $contactInfo])

@endsection

@push('scripts')
<script>
// Additional script for service modal if needed
document.addEventListener('DOMContentLoaded', function() {
    // Custom initialization for service modal can go here
    console.log('DLH Website loaded successfully');
    
    // Add any additional modal behaviors
    const modal = document.getElementById('service-modal');
    if (modal) {
        // Add custom modal behaviors here if needed
        modal.addEventListener('show', function() {
            console.log('Service modal opened');
        });
    }
});
</script>
@endpush