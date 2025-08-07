<div id="service-modal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-hidden bg-white rounded-3xl shadow-2xl">
            <div class="sticky top-0 z-10 bg-gradient-to-r from-orange-500 to-red-500 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                            <i id="modal-service-icon" data-lucide="file-check" class="h-5 w-5 text-white"></i>
                        </div>
                        <div>
                            <h3 id="modal-service-title" class="text-xl font-semibold text-white">
                                Persyaratan Layanan
                            </h3>
                            <p class="text-orange-100 text-sm">Dinas Lingkungan Hidup Kota Medan</p>
                        </div>
                    </div>
                    <button id="close-modal" class="w-8 h-8 rounded-lg bg-white/20 hover:bg-white/30 flex items-center justify-center transition-colors duration-200">
                        <i data-lucide="x" class="h-5 w-5 text-white"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-y-auto max-h-[calc(90vh-80px)]">
                <div class="p-6 space-y-6">
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 border border-orange-100">
                        <p id="modal-service-description" class="text-gray-700 leading-relaxed"></p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 text-center border border-blue-100">
                            <div class="w-10 h-10 mx-auto mb-2 rounded-lg bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center">
                                <i data-lucide="clock" class="h-5 w-5 text-white"></i>
                            </div>
                            <div class="text-sm text-gray-600 mb-1">Waktu Proses</div>
                            <div id="modal-timeframe" class="font-semibold text-gray-800">-</div>
                        </div>
                        
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 text-center border border-green-100">
                            <div class="w-10 h-10 mx-auto mb-2 rounded-lg bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center">
                                <i data-lucide="calendar" class="h-5 w-5 text-white"></i>
                            </div>
                            <div class="text-sm text-gray-600 mb-1">Masa Berlaku</div>
                            <div id="modal-validity" class="font-semibold text-gray-800">-</div>
                        </div>
                        
                        <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-xl p-4 text-center border border-purple-100">
                            <div class="w-10 h-10 mx-auto mb-2 rounded-lg bg-gradient-to-br from-purple-500 to-indigo-500 flex items-center justify-center">
                                <i data-lucide="credit-card" class="h-5 w-5 text-white"></i>
                            </div>
                            <div class="text-sm text-gray-600 mb-1">Biaya</div>
                            <div id="modal-cost" class="font-semibold text-gray-800">-</div>
                        </div>
                    </div>

                    <div id="wa-message-container" class="space-y-2 hidden">
                        <label for="wa-message-select" class="block text-sm font-medium text-gray-700">Pilih Pesan Konsultasi:</label>
                        <select id="wa-message-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md"></select>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center">
                                <i data-lucide="file-text" class="h-4 w-4 text-white"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">Dokumen yang Diperlukan</h4>
                        </div>
                        
                        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden p-4">
                            <img id="modal-requirements-image" src="" alt="Persyaratan Layanan" class="w-full h-auto rounded-lg hidden">
                            <div id="modal-documents" class="divide-y divide-gray-100">
                                </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-amber-50 to-yellow-50 border border-amber-200 rounded-2xl p-6">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-amber-500 to-yellow-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i data-lucide="alert-circle" class="h-4 w-4 text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-amber-800 mb-2">Catatan Penting</h5>
                                <p id="modal-note" class="text-amber-700 text-sm leading-relaxed"></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        <button id="download-form-btn" class="flex-1 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center group">
                            <i data-lucide="download" class="mr-2 h-4 w-4 group-hover:scale-110 transition-transform"></i>
                            Download Formulir
                        </button>
                        <button id="consultation-btn" class="flex-1 border-2 border-orange-200 text-orange-700 hover:bg-orange-50 px-6 py-3 rounded-xl transition-all duration-300 flex items-center justify-center group">
                            <svg class="mr-2 h-4 w-4 fill-current text-green-500 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339.6 50.8 281.3 25.1 219.7 25.1c-109.9 0-199 89.1-199 199 0 34.3 8.9 67.6 25.8 96.9L4 468.9l104.9-27.6c28.6 15.6 61.1 23.9 96.6 23.9h.1c109.9 0 199-89.1 199-199.1 0-58.4-25.5-111.4-66.5-149.9zM219.7 435.2h-.1c-29.8 0-57.8-8-82.5-23.3l-5.6-3.3-58.5 15.4 15.6-56.7-3.7-5.9c-16.7-26.6-25.5-57.6-25.5-89.9 0-85.3 69.1-154.4 154.4-154.4 44.5 0 85.8 18.5 115.9 48.6s48.6 71.4 48.6 115.9c0 85.3-69.1 154.4-154.4 154.4zm100.9-106.1c-5.5-2.7-32.9-16.1-38-18.1-5.1-2.7-8.8-4.2-12.5-4.2-3.8 0-7.5 2.7-11.2 5.5s-14.7 17.8-18 21.6-6.6 4.1-12.1 1.4-23.7-8.7-45.2-27.9c-16.9-14.8-28.4-33.1-31.7-38.7-3.3-5.5-.3-8.6 2.4-11.2 2.4-2.4 5.5-6.5 8.3-9.7 2.7-3 3.6-5.5 5.5-9.2s1.4-7 1-12.5c-.4-4.8-4.1-11.9-8.5-16.4s-9.3-8.3-13.3-10.4c-4-2.1-8.7-5.1-12.5-4.5s-7.8 0-11.9 0c-4.1 0-7.5-1.4-11.2 5.5-3.7 6.9-14.2 17.3-14.2 42.2s14.6 48.9 16.7 52.6 28.5 43.1 69.3 62.1 100.8 41.5 119.7 39.2c18.9-2.3 30.2-15.5 35-31.7 4.7-16.2 4.7-30 3.3-32.9s-5.5-2.7-11.2-5.5z"/>
                            </svg>
                            Konsultasi
                        </button>
                        <button id="location-btn" class="flex-1 border-2 border-gray-200 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-xl transition-all duration-300 flex items-center justify-center group">
                            <i data-lucide="map-pin" class="mr-2 h-4 w-4 group-hover:scale-110 transition-transform"></i>
                            Lokasi Kantor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>