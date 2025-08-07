<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display the homepage with all sections
     */
    public function index()
    {
        $services = $this->getServices();
        $stats = $this->getStats();
        $values = $this->getValues();
        $contactInfo = $this->getContactInfo();

        return view('home', compact('services', 'stats', 'values', 'contactInfo'));
    }

    /**
     * Display about page
     */
    public function about()
    {
        $values = $this->getValues();
        $stats = $this->getStats();

        return view('about', compact('values', 'stats'));
    }

    /**
     * Display services page
     */
    public function services()
    {
        $services = $this->getServices();

        return view('services', compact('services'));
    }

    /**
     * Display contact page
     */
    public function contact()
    {
        $contactInfo = $this->getContactInfo();
        $quickLinks = $this->getQuickLinks();

        return view('contact', compact('contactInfo', 'quickLinks'));
    }

    /**
     * Handle contact form submission
     */
    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Here you would typically send an email
        // Mail::to('info@dlh.pemkomedan.go.id')->send(new ContactMail($request->all()));

        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera merespons.');
    }

    /**
     * Handle newsletter subscription
     */
    public function subscribeNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        // Here you would typically save to database or send to email service
        // Newsletter::create(['email' => $request->email]);

        return redirect()->back()->with('newsletter_success', 'Terima kasih! Anda telah berhasil mendaftar newsletter.');
    }

    /**
     * Get services data with detailed requirements
     */
    private function getServices()
    {
        return [
            [
                'id' => 'persetujuan-lingkungan',
                'icon' => 'file-check',
                'title' => 'Persetujuan Lingkungan',
                'description' => 'Penerbitan persetujuan untuk kegiatan yang berpotensi menimbulkan dampak lingkungan.',
                'features' => ['Evaluasi dokumen', 'Verifikasi lapangan', 'Penerbitan surat persetujuan'],
                'gradient' => 'from-orange-500 to-red-500',
                'bgGradient' => 'from-orange-50 to-red-50',
                'borderGradient' => 'from-orange-200 to-red-200',
                'download_url' => asset('asset/Document/example.pdf'),
                'wa_messages' => [
                    'Saya ingin bertanya tentang persyaratan Persetujuan Lingkungan.',
                    'Saya ingin membuat janji konsultasi Persetujuan Lingkungan.',
                ],
                'requirements' => [
                    'documents' => [
                        'Surat permohonan yang ditandatangani di atas materai',
                        'Fotocopy KTP/Identitas pemohon',
                        'Fotocopy Akta Pendirian Perusahaan',
                        'Fotocopy NPWP Perusahaan',
                        'Fotocopy Surat Izin Usaha',
                        'Dokumen UKL-UPL yang telah disahkan',
                        'Peta lokasi skala 1:10.000',
                        'Denah layout kegiatan',
                        'Surat pernyataan kesanggupan mentaati ketentuan'
                    ],
                    'timeframe' => '14 hari kerja',
                    'cost' => 'Sesuai Perda Kota Medan',
                    'validity' => '5 tahun',
                    'note' => 'Persetujuan lingkungan wajib dimiliki sebelum memulai kegiatan usaha yang berpotensi mencemari lingkungan.'
                ]
            ],
            [
                'id' => 'amdal',
                'icon' => 'bar-chart-3',
                'title' => 'AMDAL',
                'description' => 'Analisis Mengenai Dampak Lingkungan Hidup untuk kegiatan besar yang berpotensi menimbulkan dampak penting.',
                'features' => ['Penyusunan ANDAL', 'RKL-RPL', 'Komisi penilai AMDAL'],
                'gradient' => 'from-emerald-500 to-green-500',
                'bgGradient' => 'from-emerald-50 to-green-50',
                'borderGradient' => 'from-emerald-200 to-green-200',
                'download_url' => asset('asset/Document/example.pdf'),
                'wa_messages' => [
                    'Saya ingin bertanya tentang persyaratan AMDAL.',
                    'Saya ingin membuat janji konsultasi AMDAL.',
                    'Saya ingin menanyakan status permohonan AMDAL saya.',
                ],
                'requirements' => [
                    'documents' => [
                        'Surat permohonan yang ditandatangani di atas materai',
                        'Formulir isian AMDAL',
                        'Dokumen ANDAL (Analisis Dampak Lingkungan)',
                        'Dokumen RKL (Rencana Kelola Lingkungan)',
                        'Dokumen RPL (Rencana Pemantauan Lingkungan)',
                        'Fotocopy akta pendirian perusahaan',
                        'Fotocopy NPWP dan SIUP',
                        'Peta topografi skala 1:25.000',
                        'Dokumen studi kelayakan',
                        'Fotocopy IMB/surat keterangan lokasi',
                        'Surat pernyataan kesanggupan melaksanakan RKL-RPL'
                    ],
                    'timeframe' => '75 hari kerja',
                    'cost' => 'Sesuai tingkat kompleksitas studi',
                    'validity' => 'Sesuai masa operasi kegiatan',
                    'note' => 'AMDAL wajib untuk kegiatan yang menimbulkan dampak penting bagi lingkungan sesuai kriteria dalam PP 22/2021.'
                ]
            ],
            [
                'id' => 'skkl',
                'icon' => 'check-circle',
                'title' => 'SKKL',
                'description' => 'Keputusan Kelayakan Lingkungan Hidup sebagai hasil penilaian AMDAL.',
                'features' => ['Penilaian kelayakan', 'Penetapan persyaratan', 'Monitoring berkala'],
                'gradient' => 'from-blue-500 to-cyan-500',
                'bgGradient' => 'from-blue-50 to-cyan-50',
                'borderGradient' => 'from-blue-200 to-cyan-200',
                'download_url' => asset('asset/Document/example.pdf'),
                'wa_messages' => [
                    'Saya ingin bertanya tentang SKKL.',
                    'Saya ingin menanyakan status permohonan SKKL saya.',
                ],
                'requirements' => [
                    'documents' => [
                        'Dokumen AMDAL yang telah disetujui komisi penilai',
                        'Surat permohonan SKKL bermaterai',
                        'Berita acara rapat komisi penilai AMDAL',
                        'Dokumen ANDAL yang telah disahkan',
                        'Dokumen RKL-RPL yang telah disahkan',
                        'Surat pernyataan kesanggupan melaksanakan RKL-RPL',
                        'Fotocopy izin lokasi/HGB',
                        'Peta detail lokasi kegiatan'
                    ],
                    'timeframe' => '14 hari kerja setelah AMDAL disetujui',
                    'cost' => 'Tidak dipungut biaya',
                    'validity' => 'Sesuai dengan masa berlaku AMDAL',
                    'note' => 'SKKL diterbitkan berdasarkan hasil penilaian AMDAL yang telah disetujui komisi penilai.'
                ]
            ],
            [
                'id' => 'ukl-upl',
                'icon' => 'settings',
                'title' => 'UKL-UPL',
                'description' => 'Upaya Pengelolaan dan Pemantauan Lingkungan Hidup untuk kegiatan dengan dampak penting tidak besar.',
                'features' => ['Formulir UKL-UPL', 'Evaluasi dampak', 'Rekomendasi pengelolaan'],
                'gradient' => 'from-purple-500 to-indigo-500',
                'bgGradient' => 'from-purple-50 to-indigo-50',
                'borderGradient' => 'from-purple-200 to-indigo-200',
                'download_url' => asset('asset/Document/example.pdf'),
                'wa_messages' => [
                    'Saya ingin bertanya tentang UKL-UPL.',
                    'Saya ingin membuat janji konsultasi UKL-UPL.',
                ],
                'requirements' => [
                    'documents' => [
                        'Formulir UKL-UPL yang telah diisi lengkap',
                        'Surat permohonan bermaterai',
                        'Fotocopy KTP direktur/penanggung jawab',
                        'Fotocopy akta pendirian perusahaan',
                        'Fotocopy NPWP perusahaan',
                        'Fotocopy SIUP/NIB',
                        'Peta lokasi kegiatan skala 1:10.000',
                        'Denah layout/site plan',
                        'Uraian rencana kegiatan',
                        'Surat pernyataan kebenaran dokumen'
                    ],
                    'timeframe' => '12 hari kerja',
                    'cost' => 'Sesuai Perda Kota Medan',
                    'validity' => 'Sesuai masa operasi kegiatan',
                    'note' => 'UKL-UPL diperlukan untuk kegiatan yang tidak termasuk dalam kriteria wajib AMDAL.'
                ]
            ],
            [
                'id' => 'pkplh',
                'icon' => 'file-text',
                'title' => 'PKPLH',
                'description' => 'Pernyataan Kesanggupan Pengelolaan Lingkungan Hidup untuk usaha atau kegiatan tertentu.',
                'features' => ['Formulir pernyataan', 'Komitmen pengelolaan', 'Pemantauan mandiri'],
                'gradient' => 'from-teal-500 to-emerald-500',
                'bgGradient' => 'from-teal-50 to-emerald-50',
                'borderGradient' => 'from-teal-200 to-emerald-200',
                'download_url' => asset('asset/Document/example.pdf'),
                'wa_messages' => [
                    'Saya ingin bertanya tentang persyaratan PKPLH.',
                    'Saya ingin membuat janji konsultasi PKPLH.',
                ],
                'requirements' => [
                    'documents' => [
                        'Formulir PKPLH yang telah diisi dan ditandatangani',
                        'Surat permohonan bermaterai',
                        'Fotocopy KTP pemohon',
                        'Fotocopy NPWP (jika ada)',
                        'Fotocopy surat izin usaha',
                        'Denah lokasi kegiatan',
                        'Deskripsi kegiatan usaha',
                        'Surat pernyataan kebenaran data',
                        'Foto kegiatan (jika sudah beroperasi)'
                    ],
                    'timeframe' => '7 hari kerja',
                    'cost' => 'Tidak dipungut biaya',
                    'validity' => '3 tahun',
                    'note' => 'PKPLH untuk usaha mikro dan kecil yang tidak termasuk kategori wajib UKL-UPL atau AMDAL.'
                ]
            ],
            [
                'id' => 'sppl',
                'icon' => 'clipboard-list',
                'title' => 'SPPL',
                'description' => 'Surat Pernyataan Kesanggupan Pengelolaan dan Pemantauan Lingkungan Hidup.',
                'features' => ['Registrasi online', 'Self assessment', 'Laporan berkala'],
                'gradient' => 'from-amber-500 to-yellow-500',
                'bgGradient' => 'from-amber-50 to-yellow-50',
                'borderGradient' => 'from-amber-200 to-yellow-200',
                'download_url' => asset('asset/Document/example.pdf'),
                'wa_messages' => [
                    'Saya ingin bertanya tentang persyaratan SPPL.',
                    'Saya ingin menanyakan status permohonan SPPL saya.',
                ],
                'requirements' => [
                    'documents' => [
                        'Formulir SPPL online',
                        'Fotocopy KTP pemohon',
                        'Fotocopy NPWP (jika ada)',
                        'Surat keterangan domisili usaha',
                        'Denah sederhana lokasi usaha',
                        'Deskripsi singkat kegiatan usaha',
                        'Bukti pembayaran (jika dikenakan retribusi)',
                        'Surat pernyataan kesanggupan'
                    ],
                    'timeframe' => '3 hari kerja',
                    'cost' => 'Gratis',
                    'validity' => '3 tahun',
                    'note' => 'SPPL dapat diajukan secara online untuk usaha dengan dampak lingkungan minimal.'
                ]
            ]
        ];
    }

    /**
     * Get statistics data
     */
    private function getStats()
    {
        return [
            ['icon' => 'shield', 'value' => '6', 'label' => 'Layanan Utama', 'color' => 'from-orange-500 to-red-500'],
            ['icon' => 'users', 'value' => '1000+', 'label' => 'Masyarakat Terlayani', 'color' => 'from-red-500 to-yellow-500'],
            ['icon' => 'award', 'value' => '15+', 'label' => 'Tahun Pengalaman', 'color' => 'from-yellow-500 to-orange-500']
        ];
    }

    /**
     * Get values data
     */
    private function getValues()
    {
        return [
            [
                'icon' => 'target',
                'title' => 'Misi Kami',
                'description' => 'Melindungi dan melestarikan lingkungan hidup Kota Medan melalui pengelolaan yang berkelanjutan.',
                'gradient' => 'from-orange-500 to-red-500',
                'bgGradient' => 'from-orange-50 to-red-50'
            ],
            [
                'icon' => 'eye',
                'title' => 'Visi Kami',
                'description' => 'Menjadi dinas terdepan dalam pengelolaan lingkungan hidup yang bersih dan berkelanjutan.',
                'gradient' => 'from-emerald-500 to-green-500',
                'bgGradient' => 'from-emerald-50 to-green-50'
            ],
            [
                'icon' => 'users',
                'title' => 'Tim Profesional',
                'description' => 'Didukung oleh tim ahli lingkungan yang berpengalaman dan berdedikasi tinggi.',
                'gradient' => 'from-blue-500 to-cyan-500',
                'bgGradient' => 'from-blue-50 to-cyan-50'
            ],
            [
                'icon' => 'award',
                'title' => 'Standar Tinggi',
                'description' => 'Menerapkan standar internasional dalam setiap layanan pengelolaan lingkungan.',
                'gradient' => 'from-purple-500 to-indigo-500',
                'bgGradient' => 'from-purple-50 to-indigo-50'
            ]
        ];
    }

    /**
     * Get contact information
     */
    private function getContactInfo()
    {
        return [
            [
                'icon' => 'map-pin',
                'title' => 'Alamat Kantor',
                'content' => 'Jl. Pinang Baris No.114, Lalang, Kec. Medan Sunggal, Kota Medan, Sumatera Utara 20127',
                'gradient' => 'from-orange-500 to-red-500',
                'bgGradient' => 'from-orange-50 to-red-50'
            ],
            [
                'icon' => 'whatsapp',
                'title' => 'WhatsApp',
                'content' => '+6282386993101',
                'gradient' => 'from-emerald-500 to-green-500',
                'bgGradient' => 'from-emerald-50 to-green-50'
            ],
            [
                'icon' => 'mail',
                'title' => 'Email',
                'content' => 'dlhmedan@gmail.com',
                'gradient' => 'from-blue-500 to-cyan-500',
                'bgGradient' => 'from-blue-50 to-cyan-50'
            ],
            [
                'icon' => 'clock',
                'title' => 'Jam Operasional',
                'content' => "Senin - Jumat: 08:00 - 16:00 WIB\nJum'at: 08:00 - 17:00 WIB\nSabtu - Minggu: Tutup",
                'gradient' => 'from-purple-500 to-indigo-500',
                'bgGradient' => 'from-purple-50 to-indigo-50'
            ]
        ];
    }

    /**
     * Get quick links
     */
    private function getQuickLinks()
    {
        return [
            ['label' => 'Website Resmi DLH Kota Medan', 'href' => 'https://dlh.medan.go.id/web/', 'icon' => 'external-link'],
            ['label' => 'Pengaduan Lingkungan', 'href' => '#', 'icon' => 'message-circle'],
            ['label' => 'Download Formulir', 'href' => '#', 'icon' => 'external-link'],
            ['label' => 'Panduan Layanan', 'href' => '#', 'icon' => 'external-link']
        ];
    }
}
