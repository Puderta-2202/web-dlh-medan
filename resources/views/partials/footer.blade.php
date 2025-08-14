<footer class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-orange-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-orange-900/20 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-red-900/20"></div>
    </div>

    <!-- Floating Elements -->
    <div
        class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-br from-orange-500/10 to-red-500/10 rounded-full blur-3xl">
    </div>
    <div
        class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-br from-red-500/10 to-yellow-500/10 rounded-full blur-3xl">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="py-20 grid md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Organization Info -->
            <div class="lg:col-span-1 space-y-6">
                <div class="flex items-center group cursor-pointer">
                    <img src="{{ asset('asset/Images/logo-dlh.png') }}" alt="Dinas Lingkungan Hidup Kota Medan"
                        class="h-20 w-auto object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-lg" />
                </div>

                <p class="text-gray-300 text-sm leading-relaxed">
                    Berkomitmen untuk menjaga kelestarian lingkungan hidup dan memberikan
                    pelayanan terbaik kepada masyarakat Kota Medan.
                </p>

                <div class="space-y-3">
                    @php
                    $footerContacts = [
                    ['icon' => 'map-pin', 'text' => 'Jl. Pinang Baris No.114, Lalang, Kec. Medan Sunggal, Kota Medan,
                    Sumatera Utara 20127'],
                    ['icon' => 'phone', 'text' => '+62 823-8699-3101'],
                    ['icon' => 'mail', 'text' => 'dlhmedan@gmail.com']
                    ];
                    @endphp

                    @foreach($footerContacts as $contact)
                    <div
                        class="flex items-center space-x-3 text-sm text-gray-300 hover:text-orange-400 transition-colors duration-300 group cursor-pointer">
                        <div
                            class="w-8 h-8 rounded-lg bg-gray-800/50 flex items-center justify-center group-hover:bg-orange-500/20 transition-colors duration-300">
                            <i data-lucide="{{ $contact['icon'] }}" class="h-4 w-4"></i>
                        </div>
                        <span>{{ $contact['text'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Services -->
            <div>
                <h4
                    class="text-lg font-semibold mb-6 bg-gradient-to-r from-orange-400 to-red-400 bg-clip-text text-transparent">
                    Layanan Kami
                </h4>
                <ul class="space-y-3">
                    @foreach($services as $service)
                    <li>
                        <a href="#"
                            class="text-gray-300 hover:text-orange-400 transition-colors duration-300 text-sm flex items-center group open-service-modal" data-service-id="{{ $service['id'] }}" data-service-title="{{ $service['title'] }}">
                            <div
                                class="w-1.5 h-1.5 bg-orange-500 rounded-full mr-3 group-hover:scale-125 transition-transform duration-300">
                            </div>
                            {{ $service['title'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h4
                    class="text-lg font-semibold mb-6 bg-gradient-to-r from-orange-400 to-red-400 bg-clip-text text-transparent">
                    Tautan Cepat
                </h4>
                <ul class="space-y-3">
                    @php
                    $quickLinks = [
                    'Tentang Kami',
                    'Layanan',
                    'Berita',
                    'Kontak',
                    'FAQ',
                    'Panduan'
                    ];
                    @endphp

                    @foreach($quickLinks as $link)
                    <li>
                        <a href="#"
                            class="text-gray-300 hover:text-orange-400 transition-colors duration-300 text-sm flex items-center group">
                            <div
                                class="w-1.5 h-1.5 bg-red-500 rounded-full mr-3 group-hover:scale-125 transition-transform duration-300">
                            </div>
                            {{ $link }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Newsletter & Social -->
            <div>
                <h4
                    class="text-lg font-semibold mb-6 bg-gradient-to-r from-orange-400 to-red-400 bg-clip-text text-transparent">
                    Tetap Terhubung
                </h4>
                <p class="text-gray-300 text-sm mb-6 leading-relaxed">
                    Dapatkan update terbaru tentang program dan kebijakan lingkungan hidup melalui media sosial kami.
                </p>

                <!-- Social Links -->
                <div class="flex space-x-3 mb-8">
                    @php
                    $socialLinks = [
                    ['icon' => 'facebook', 'href' => 'https://www.facebook.com/profile.php?id=100083111581799', 'label' => 'Facebook', 'color' => 'hover:text-blue-500'],
                    ['icon' => 'instagram', 'href' => 'https://www.instagram.com/dlh_kotamedan/', 'label' => 'Instagram', 'color' => 'hover:text-pink-500'],
                    ['icon' => 'youtube', 'href' => 'https://www.youtube.com/@dinaslingkunganhidupkotamedan', 'label' => 'YouTube', 'color' => 'hover:text-red-500']
                    ];
                    @endphp

                    @foreach($socialLinks as $social)
                    <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}"
                        class="w-10 h-10 rounded-xl bg-gray-800/50 flex items-center justify-center text-gray-400 {{ $social['color'] }} transition-all duration-300 hover:scale-110 hover:bg-gray-700/50 hover:shadow-lg">
                        <i data-lucide="{{ $social['icon'] }}" class="h-5 w-5"></i>
                    </a>
                    @endforeach
                </div>

                <!-- Enhanced Newsletter -->
                <!-- <div class="space-y-4">
                    <p class="text-sm font-medium text-gray-200">Newsletter</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="relative">
                        @csrf
                        <input type="email" name="email" required placeholder="Masukkan email Anda"
                            class="w-full px-4 py-3 text-sm bg-gray-800/50 border border-gray-700/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500/50 backdrop-blur-sm text-white placeholder-gray-400 transition-all duration-300">
                        <button type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2 px-3 py-1.5 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 rounded-lg shadow-lg transition-all duration-300">
                            <i data-lucide="send" class="h-4 w-4 text-white"></i>
                        </button>
                    </form>
                    <p class="text-xs text-gray-400">
                        * Kami menghormati privasi Anda dan tidak akan mengirim spam.
                    </p>
                </div> -->
            </div>
        </div>

        <!-- Enhanced Bottom Footer -->
        <div class="py-8 border-t border-gray-700/50">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-2 text-sm text-gray-400">
                    <span>© {{ date('Y') }} Dinas Lingkungan Hidup Kota Medan.</span>
                    <span>Dibuat dengan</span>
                    <i data-lucide="heart" class="h-4 w-4 text-red-500 fill-current animate-pulse"></i>
                    <span>untuk lingkungan yang lebih baik.</span>
                </div>
                <div class="flex space-x-6 text-sm">
                    @foreach(['Kebijakan Privasi', 'Syarat & Ketentuan'] as $item)
                    <a href="#"
                        class="text-gray-400 hover:text-orange-400 transition-colors duration-300 relative group">
                        {{ $item }}
                        <span
                            class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-orange-500 to-red-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>