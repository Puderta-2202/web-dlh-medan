<section id="about" class="py-20 lg:py-32 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-white via-orange-50/20 to-red-50/30">
        <div class="absolute top-20 right-20 w-96 h-96 bg-gradient-to-br from-orange-400/10 to-red-400/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-gradient-to-br from-red-400/10 to-yellow-400/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-6 mb-20">
            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-100 to-red-100 rounded-full border border-orange-200/50 backdrop-blur-sm">
                <i data-lucide="building" class="h-4 w-4 text-orange-600 mr-2"></i>
                <span class="text-sm font-semibold bg-gradient-to-r from-orange-700 to-red-700 bg-clip-text text-transparent">
                    Tentang Kami
                </span>
            </div>
            
            <h2 class="text-4xl lg:text-6xl">
                <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                    Dinas Lingkungan Hidup
                </span>
                <br />
                <span class="bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                    Kota Medan
                </span>
            </h2>
            
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Berkomitmen untuk menjaga kelestarian lingkungan hidup dan memberikan pelayanan terbaik 
                kepada masyarakat Kota Medan dalam bidang pengelolaan lingkungan hidup.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-20 items-center mb-20">
            <!-- Content -->
            <div class="space-y-8">
                <h3 class="text-3xl bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                    Melayani dengan Integritas dan Profesionalisme
                </h3>
                
                <div class="space-y-6 text-gray-600 leading-relaxed">
                    <p class="text-lg">
                        Dinas Lingkungan Hidup Kota Medan adalah institusi pemerintah yang bertanggung jawab 
                        dalam pengelolaan, perlindungan, dan pelestarian lingkungan hidup di wilayah Kota Medan.
                    </p>
                    <p class="text-lg">
                        Kami berkomitmen untuk memberikan pelayanan prima dalam berbagai aspek pengelolaan 
                        lingkungan hidup, mulai dari perizinan, pengawasan, hingga pembinaan kepada masyarakat 
                        dan dunia usaha.
                    </p>
                    <p class="text-lg">
                        Dengan dukungan teknologi terkini dan tim profesional yang berpengalaman, kami terus 
                        berinovasi untuk memberikan layanan yang lebih baik dan efisien.
                    </p>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 gap-6 pt-6">
                    @php
                    $aboutStats = [
                        ['number' => '99%', 'label' => 'Kepuasan Masyarakat'],
                        ['number' => '24/7', 'label' => 'Layanan Darurat'],
                        ['number' => '50+', 'label' => 'Program Aktif'],
                        ['number' => '5★', 'label' => 'Rating Pelayanan']
                    ];
                    @endphp
                    
                    @foreach($aboutStats as $stat)
                    <div class="text-center p-4 rounded-2xl bg-gradient-to-br from-orange-50 to-red-50 border border-orange-100/50">
                        <div class="text-2xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                            {{ $stat['number'] }}
                        </div>
                        <div class="text-sm text-gray-600 mt-1">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Enhanced Image -->
            <div class="relative">
                <div class="relative group">
                    <!-- Glowing backdrop -->
                    <div class="absolute -inset-6 bg-gradient-to-r from-orange-400 via-red-400 to-yellow-400 rounded-3xl blur-2xl opacity-20 group-hover:opacity-30 transition-opacity duration-700"></div>
                    
                    <!-- Main image container -->
                    <div class="relative bg-white/20 backdrop-blur-lg rounded-3xl p-3 border border-white/30 shadow-2xl">
                        <img
                            src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=700&h=500&fit=crop"
                            alt="Tim Dinas Lingkungan Hidup"
                            class="rounded-2xl shadow-xl w-full h-96 object-cover group-hover:scale-105 transition-transform duration-700"
                        />
                        
                        <!-- Overlay gradient -->
                        <div class="absolute inset-3 bg-gradient-to-t from-orange-900/30 via-transparent to-red-900/10 rounded-2xl"></div>
                        
                        <!-- Achievement badges -->
                        <div class="absolute top-8 right-8 space-y-3">
                            <div class="bg-white/90 backdrop-blur-sm rounded-2xl px-4 py-2 shadow-lg">
                                <div class="text-sm font-semibold text-orange-600">ISO 9001:2015</div>
                                <div class="text-xs text-gray-600">Certified</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm rounded-2xl px-4 py-2 shadow-lg">
                                <div class="text-sm font-semibold text-green-600">Green Award</div>
                                <div class="text-xs text-gray-600">2023</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Values Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($values as $value)
            <div class="group relative overflow-hidden border-0 bg-white/70 backdrop-blur-sm hover:bg-white/90 transition-all duration-500 hover:scale-105 rounded-lg shadow-lg">
                <!-- Background Gradient -->
                <div class="absolute inset-0 bg-gradient-to-br {{ $value['bgGradient'] }} opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
                
                <div class="relative z-10 pt-8 pb-6 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-gradient-to-br {{ $value['gradient'] }} p-5 mb-6 shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                        <i data-lucide="{{ $value['icon'] }}" class="h-10 w-10 text-white"></i>
                    </div>
                    <h4 class="text-lg text-gray-900 mb-3 font-semibold">{{ $value['title'] }}</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $value['description'] }}</p>
                </div>
                
                <!-- Hover glow effect -->
                <div class="absolute inset-0 bg-gradient-to-br {{ $value['gradient'] }} opacity-0 group-hover:opacity-5 transition-opacity duration-500 rounded-lg"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>