<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Kategori;
use App\Models\Prodi;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 media terbaru untuk landing page
        $latest_media = Media::with(['mahasiswa.prodi', 'kategori'])
                            ->latest()
                            ->take(6)
                            ->get();
        
        // Statistik untuk landing page
        $stats = [
            'total_media' => Media::count(),
            'total_mahasiswa' => \App\Models\Mahasiswa::count(),
            'total_prodi' => Prodi::count(),
        ];

        // --- MODIFIKASI DI SINI ---
        // Ambil 4 kategori dengan jumlah media terbanyak
        $kategoris = Kategori::withCount('media')
                             ->orderBy('media_count', 'desc')
                             ->take(4)
                             ->get();
        
        return view('home', compact('latest_media', 'stats', 'kategoris'));
    }
    
    public function about()
    {
        return view('about');
    }
}