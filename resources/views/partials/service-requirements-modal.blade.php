<!-- Service Requirements Modal -->
<div id="service-modal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-hidden bg-white rounded-3xl shadow-2xl">
            <!-- Modal Header -->
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

            <!-- Modal Content -->
            <div class="overflow-y-auto max-h-[calc(90vh-80px)]">
                <div class="p-6 space-y-6">
                    <!-- Service Description -->
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 border border-orange-100">
                        <p id="modal-service-description" class="text-gray-700 leading-relaxed"></p>
                    </div>

                    <!-- Quick Info Grid -->
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

                    <!-- Document Requirements -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center">
                                <i data-lucide="file-text" class="h-4 w-4 text-white"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">Dokumen yang Diperlukan</h4>
                        </div>
                        
                        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                            <div id="modal-documents" class="divide-y divide-gray-100">
                                <!-- Documents will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>

                    <!-- Important Note -->
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

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        <button class="flex-1 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center group">
                            <i data-lucide="download" class="mr-2 h-4 w-4 group-hover:scale-110 transition-transform"></i>
                            Download Formulir
                        </button>
                        <button class="flex-1 border-2 border-orange-200 text-orange-700 hover:bg-orange-50 px-6 py-3 rounded-xl transition-all duration-300 flex items-center justify-center group">
                            <i data-lucide="phone" class="mr-2 h-4 w-4 group-hover:scale-110 transition-transform"></i>
                            Konsultasi
                        </button>
                        <button class="flex-1 border-2 border-gray-200 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-xl transition-all duration-300 flex items-center justify-center group">
                            <i data-lucide="map-pin" class="mr-2 h-4 w-4 group-hover:scale-110 transition-transform"></i>
                            Lokasi Kantor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>