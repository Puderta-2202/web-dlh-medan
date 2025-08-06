<section id="contact" class="py-20 lg:py-32 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-orange-50/30">
        <div class="absolute inset-0 opacity-40">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-100/20 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-red-100/20"></div>
        </div>
        <div class="absolute top-20 left-20 w-96 h-96 bg-gradient-to-br from-orange-400/10 to-red-400/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 bg-gradient-to-br from-red-400/10 to-yellow-400/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-6 mb-20">
            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-100 to-red-100 rounded-full border border-orange-200/50 backdrop-blur-sm">
                <i data-lucide="message-circle" class="h-4 w-4 text-orange-600 mr-2"></i>
                <span class="text-sm font-semibold bg-gradient-to-r from-orange-700 to-red-700 bg-clip-text text-transparent">
                    Hubungi Kami
                </span>
            </div>
            
            <h2 class="text-4xl lg:text-6xl">
                <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                    Informasi Kontak
                </span>
            </h2>
            
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Hubungi kami untuk informasi lebih lanjut mengenai layanan atau konsultasi 
                terkait pengelolaan lingkungan hidup. Tim kami siap membantu Anda.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Contact Information -->
            <div class="lg:col-span-2 space-y-8">
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($contactInfo as $info)
                    <div class="group relative overflow-hidden border-0 bg-white/70 backdrop-blur-sm hover:bg-white/90 transition-all duration-500 hover:scale-105 rounded-lg shadow-lg">
                        <!-- Background Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br {{ $info['bgGradient'] }} opacity-0 group-hover:opacity-30 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10 p-6 pb-3">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $info['gradient'] }} p-4 mb-4 shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                                <i data-lucide="{{ $info['icon'] }}" class="h-8 w-8 text-white"></i>
                            </div>
                            <h3 class="text-lg text-gray-900 font-semibold">{{ $info['title'] }}</h3>
                        </div>
                        <div class="relative z-10 px-6 pb-6">
                            <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $info['content'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Enhanced Map -->
                <div class="overflow-hidden border-0 bg-white/70 backdrop-blur-sm rounded-lg shadow-lg">
                    <div class="p-6 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-red-500 p-2">
                                <i data-lucide="map-pin" class="h-6 w-6 text-white"></i>
                            </div>
                            <h3 class="text-xl font-semibold">Lokasi Kantor</h3>
                        </div>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="relative bg-gradient-to-br from-orange-100 to-red-100 rounded-2xl h-80 flex items-center justify-center overflow-hidden">
                            <!-- Decorative elements -->
                            <div class="absolute top-4 left-4 w-20 h-20 bg-gradient-to-br from-orange-400/20 to-red-400/20 rounded-full blur-xl"></div>
                            <div class="absolute bottom-4 right-4 w-32 h-32 bg-gradient-to-br from-red-400/20 to-yellow-400/20 rounded-full blur-xl"></div>
                            
                            <div class="relative text-center text-gray-600 z-10">
    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-orange-500 to-red-500 p-5 shadow-lg">
        <i data-lucide="map-pin" class="h-10 w-10 text-white"></i>
    </div>
    <h3 class="text-lg font-semibold text-gray-800 mb-2">Peta Lokasi Kantor</h3>
    <p class="text-sm text-gray-600">Dinas Lingkungan Hidup Kota Medan</p>
    
    <div class="mt-4 rounded-xl overflow-hidden shadow-lg border border-gray-200">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.99632535794!2d98.60805429999999!3d3.5883170999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312ff573e7ac5d%3A0xbc965d852d16d501!2sDinas%20Lingkungan%20Hidup%20Kota%20Medan!5e0!3m2!1sen!2sid!4v1754472174922!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    
    <a href="https://maps.app.goo.gl/7uqKURtkJpBz2VeB7" target="_blank" class="inline-flex items-center mt-4 px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white rounded-xl transition-all duration-300">
        Lihat di Google Maps
        <i data-lucide="external-link" class="ml-2 h-4 w-4"></i>
    </a>
</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Quick Links & Actions -->
            <div class="space-y-6">
                <!-- Quick Links -->
                <div class="overflow-hidden border-0 bg-white/70 backdrop-blur-sm rounded-lg shadow-lg">
                    <div class="p-6 pb-3">
                        <h3 class="text-xl font-semibold">Akses Cepat</h3>
                    </div>
                    <div class="px-6 pb-6 space-y-3">
                        @php
                        $quickLinks = [
                            ['label' => 'Website Resmi DLH Kota Medan', 'href' => 'https://dlh.medan.go.id/web/', 'icon' => 'external-link'],
                            ['label' => 'Pengaduan Lingkungan', 'href' => '#', 'icon' => 'message-circle'],
                            ['label' => 'Download Formulir', 'href' => '#', 'icon' => 'external-link'],
                            ['label' => 'Panduan Layanan', 'href' => '#', 'icon' => 'external-link']
                        ];
                        @endphp
                        
                        @foreach($quickLinks as $link)
                        <a href="{{ $link['href'] }}" 
                           class="w-full flex items-center justify-between p-3 rounded-lg group hover:bg-gradient-to-r hover:from-orange-50 hover:to-red-50 transition-all duration-300">
                            <span class="flex items-center">
                                <i data-lucide="{{ $link['icon'] }}" class="mr-3 h-4 w-4 text-orange-600"></i>
                                {{ $link['label'] }}
                            </span>
                            <i data-lucide="external-link" class="h-4 w-4 text-gray-400 group-hover:text-orange-600 group-hover:translate-x-1 transition-all duration-300"></i>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Help Section -->
                <div class="overflow-hidden border-0 bg-white/70 backdrop-blur-sm rounded-lg shadow-lg">
                    <div class="p-6 pb-3">
                        <h3 class="text-xl font-semibold">Butuh Bantuan?</h3>
                    </div>
                    <div class="px-6 pb-6 space-y-6">
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Tim customer service kami siap membantu Anda dengan pertanyaan atau 
                            masalah terkait layanan lingkungan hidup.
                        </p>
                        <div class="space-y-3">
                            <a href="#" class="w-full flex items-center justify-center px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white rounded-xl shadow-lg hover:shadow-orange-500/25 transition-all duration-300 group">
                                <i data-lucide="message-circle" class="mr-2 h-4 w-4 group-hover:scale-110 transition-transform duration-300"></i>
                                Chat dengan Kami
                            </a>
                            <a href="tel:+6261456789" class="w-full flex items-center justify-center px-6 py-3 border-2 border-orange-200 text-orange-700 hover:bg-orange-50 hover:border-orange-300 rounded-xl transition-all duration-300 group">
                                <i data-lucide="phone" class="mr-2 h-4 w-4 group-hover:scale-110 transition-transform duration-300"></i>
                                Telepon Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 24/7 Service -->
                <div class="overflow-hidden border-0 bg-gradient-to-br from-orange-50 to-red-50 backdrop-blur-sm rounded-lg shadow-lg">
                    <div class="pt-6 px-6 pb-6">
                        <div class="text-center space-y-4">
                            <div class="flex justify-center space-x-1 mb-2">
                                @for($i = 0; $i < 5; $i++)
                                <i data-lucide="star" class="h-5 w-5 fill-yellow-400 text-yellow-400"></i>
                                @endfor
                            </div>
                            <h4 class="text-orange-800 font-semibold">Layanan 24/7</h4>
                            <p class="text-sm text-orange-700 leading-relaxed">
                                Untuk pengaduan darurat lingkungan, hubungi hotline kami kapan saja.
                            </p>
                            <div class="text-2xl font-bold bg-gradient-to-r from-orange-700 to-red-700 bg-clip-text text-transparent">
                                0800-1234-5678
                            </div>
                            <a href="tel:08001234578" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white rounded-xl shadow-lg transition-all duration-300">
                                <i data-lucide="send" class="mr-1 h-3 w-3"></i>
                                Hubungi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>