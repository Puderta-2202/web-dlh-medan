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
     * Get services data
     */
    private function getServices()
    {
        return [
            [
                'icon' => 'file-check',
                'title' => 'Persetujuan Lingkungan',
                'description' => 'Penerbitan persetujuan untuk kegiatan yang berpotensi menimbulkan dampak lingkungan.',
                'features' => ['Evaluasi dokumen', 'Verifikasi lapangan', 'Penerbitan surat persetujuan'],
                'gradient' => 'from-orange-500 to-red-500',
                'bgGradient' => 'from-orange-50 to-red-50',
                'borderGradient' => 'from-orange-200 to-red-200'
            ],
            [
                'icon' => 'bar-chart-3',
                'title' => 'AMDAL',
                'description' => 'Analisis Mengenai Dampak Lingkungan Hidup untuk kegiatan besar yang berpotensi menimbulkan dampak penting.',
                'features' => ['Penyusunan ANDAL', 'RKL-RPL', 'Komisi penilai AMDAL'],
                'gradient' => 'from-emerald-500 to-green-500',
                'bgGradient' => 'from-emerald-50 to-green-50',
                'borderGradient' => 'from-emerald-200 to-green-200'
            ],
            [
                'icon' => 'check-circle',
                'title' => 'SKKL',
                'description' => 'Keputusan Kelayakan Lingkungan Hidup sebagai hasil penilaian AMDAL.',
                'features' => ['Penilaian kelayakan', 'Penetapan persyaratan', 'Monitoring berkala'],
                'gradient' => 'from-blue-500 to-cyan-500',
                'bgGradient' => 'from-blue-50 to-cyan-50',
                'borderGradient' => 'from-blue-200 to-cyan-200'
            ],
            [
                'icon' => 'settings',
                'title' => 'UKL-UPL',
                'description' => 'Upaya Pengelolaan dan Pemantauan Lingkungan Hidup untuk kegiatan dengan dampak penting tidak besar.',
                'features' => ['Formulir UKL-UPL', 'Evaluasi dampak', 'Rekomendasi pengelolaan'],
                'gradient' => 'from-purple-500 to-indigo-500',
                'bgGradient' => 'from-purple-50 to-indigo-50',
                'borderGradient' => 'from-purple-200 to-indigo-200'
            ],
            [
                'icon' => 'file-text',
                'title' => 'PKPLH',
                'description' => 'Pernyataan Kesanggupan Pengelolaan Lingkungan Hidup untuk usaha atau kegiatan tertentu.',
                'features' => ['Formulir pernyataan', 'Komitmen pengelolaan', 'Pemantauan mandiri'],
                'gradient' => 'from-teal-500 to-emerald-500',
                'bgGradient' => 'from-teal-50 to-emerald-50',
                'borderGradient' => 'from-teal-200 to-emerald-200'
            ],
            [
                'icon' => 'clipboard-list',
                'title' => 'SPPL',
                'description' => 'Surat Pernyataan Kesanggupan Pengelolaan dan Pemantauan Lingkungan Hidup.',
                'features' => ['Registrasi online', 'Self assessment', 'Laporan berkala'],
                'gradient' => 'from-amber-500 to-yellow-500',
                'bgGradient' => 'from-amber-50 to-yellow-50',
                'borderGradient' => 'from-amber-200 to-yellow-200'
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
                'icon' => 'phone',
                'title' => 'Telepon',
                'content' => '+62 61 4567890',
                'gradient' => 'from-emerald-500 to-green-500',
                'bgGradient' => 'from-emerald-50 to-green-50'
            ],
            [
                'icon' => 'mail',
                'title' => 'Email',
                'content' => 'info@dlh.pemkomedan.go.id',
                'gradient' => 'from-blue-500 to-cyan-500',
                'bgGradient' => 'from-blue-50 to-cyan-50'
            ],
            [
                'icon' => 'clock',
                'title' => 'Jam Operasional',
                'content' => "Senin - Kamis: 08:00 - 16:30 WIB\n Jumat: 08:00 - 17:00 WIB\nSabtu - Minggu: Tutup",
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
            ['label' => 'Portal Perizinan Online', 'href' => '#', 'icon' => 'external-link'],
            ['label' => 'Pengaduan Lingkungan', 'href' => '#', 'icon' => 'message-circle'],
            ['label' => 'Download Formulir', 'href' => '#', 'icon' => 'external-link'],
            ['label' => 'Panduan Layanan', 'href' => '#', 'icon' => 'external-link']
        ];
    }
}