<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\Kategori;
use App\Models\Mahasiswa;
use App\Models\Media;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung statistik untuk dashboard
        $stats = [
            'total_prodi' => Prodi::count(),
            'total_kategori' => Kategori::count(),
            'total_mahasiswa' => Mahasiswa::count(),
            'total_media' => Media::count(),
        ];
        
        // Media terbaru (5 terakhir)
        $recent_media = Media::with(['mahasiswa', 'kategori'])
                            ->latest()
                            ->take(5)
                            ->get();
        
        return view('admin.dashboard', compact('stats', 'recent_media'));
    }
}