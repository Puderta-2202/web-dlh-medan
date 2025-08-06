<section id="services" class="py-20 lg:py-32 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-orange-50/30">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-100/20 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-red-100/20"></div>
            <div class="absolute top-20 right-20 w-96 h-96 bg-gradient-to-br from-orange-400/10 to-red-400/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-80 h-80 bg-gradient-to-br from-red-400/10 to-yellow-400/10 rounded-full blur-3xl"></div>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-6 mb-20">
            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-100 to-red-100 rounded-full border border-orange-200/50 backdrop-blur-sm">
                <span class="text-sm font-semibold bg-gradient-to-r from-orange-700 to-red-700 bg-clip-text text-transparent">
                    ✨ Layanan Unggulan Kami
                </span>
            </div>
            
            <h2 class="text-4xl lg:text-6xl">
                <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                    Layanan Lingkungan Hidup
                </span>
            </h2>
            
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Kami menyediakan berbagai layanan perizinan dan pengelolaan lingkungan hidup 
                untuk mendukung pembangunan berkelanjutan di Kota Medan dengan standar profesional terbaik.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
            <div class="group relative overflow-hidden border-0 bg-white/70 backdrop-blur-sm hover:bg-white/90 transition-all duration-500 hover:scale-105 hover:-translate-y-2 rounded-lg shadow-lg">
                <!-- Gradient Border -->
                <div class="absolute inset-0 bg-gradient-to-br {{ $service['borderGradient'] }} opacity-0 group-hover:opacity-20 transition-opacity duration-500 rounded-lg"></div>
                
                <!-- Background Gradient -->
                <div class="absolute inset-0 bg-gradient-to-br {{ $service['bgGradient'] }} opacity-0 group-hover:opacity-30 transition-opacity duration-500"></div>
                
                <div class="relative z-10 p-6 pb-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $service['gradient'] }} p-4 mb-6 shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                        <i data-lucide="{{ $service['icon'] }}" class="h-8 w-8 text-white"></i>
                    </div>
                    <h3 class="text-xl text-gray-900 group-hover:text-gray-800 transition-colors duration-300 font-semibold mb-3">
                        {{ $service['title'] }}
                    </h3>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        {{ $service['description'] }}
                    </p>
                </div>
                
                <div class="relative z-10 p-6 pt-0">
                    <div class="space-y-4">
                        <h4 class="text-sm font-semibold text-gray-900">Fitur Layanan:</h4>
                        <ul class="space-y-3">
                            @foreach($service['features'] as $feature)
                            <li class="flex items-center text-sm text-gray-700">
                                <div class="w-2 h-2 rounded-full bg-gradient-to-r {{ $service['gradient'] }} mr-3 flex-shrink-0"></div>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <button class="w-full mt-6 group/button hover:bg-transparent bg-transparent border-0 text-left p-0 flex items-center justify-between">
                        <span class="bg-gradient-to-r {{ $service['gradient'] }} bg-clip-text text-transparent group-hover/button:text-white transition-colors duration-300">
                            Pelajari Lebih Lanjut
                        </span>
                        <i data-lucide="arrow-up-right" class="ml-2 h-4 w-4 text-gray-400 group-hover/button:text-white transition-all duration-300 group-hover/button:translate-x-1 group-hover/button:-translate-y-1"></i>
                    </button>
                </div>
                
                <!-- Hover effect overlay -->
                <div class="absolute inset-0 bg-gradient-to-br {{ $service['gradient'] }} opacity-0 group-hover:opacity-5 transition-opacity duration-500 rounded-lg"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>