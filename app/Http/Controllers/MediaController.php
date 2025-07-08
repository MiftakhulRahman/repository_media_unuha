<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Kategori;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::with(['mahasiswa.prodi', 'kategori']);
        
        // Filter berdasarkan search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('judul_penelitian', 'like', '%' . $search . '%')
                  ->orWhereHas('mahasiswa', function($q) use ($search) {
                      $q->where('nama_lengkap', 'like', '%' . $search . '%');
                  });
            });
        }
        
        // Filter berdasarkan slug kategori
        if ($request->filled('kategori')) {
            $kategoriSlug = $request->kategori;
            $query->whereHas('kategori', function($q) use ($kategoriSlug) {
                $q->where('slug', $kategoriSlug);
            });
        }
        
        // --- MODIFIKASI DI SINI ---
        // Filter berdasarkan slug prodi
        if ($request->filled('prodi')) {
            $prodiSlug = $request->prodi;
            $query->whereHas('mahasiswa.prodi', function($q) use ($prodiSlug) {
                $q->where('slug', $prodiSlug);
            });
        }
        
        // Filter berdasarkan tahun
        if ($request->filled('tahun')) {
            $query->where('tahun_terbit', $request->tahun);
        }
        
        // Urutkan dan paginate
        $media = $query->latest()->paginate(12);
        
        // Data untuk filter dropdown
        $kategoris = Kategori::all();
        $prodis = Prodi::all();
        $tahuns = Media::distinct()->orderBy('tahun_terbit', 'desc')->pluck('tahun_terbit');
        
        return view('media.index', compact('media', 'kategoris', 'prodis', 'tahuns'));
    }
    
    public function show(Media $medium)
    {
        $medium->load(['mahasiswa.prodi', 'kategori']);
        
        // Media terkait (sama kategori, exclude yang sedang dilihat)
        $related_media = Media::with(['mahasiswa.prodi', 'kategori'])
                             ->where('kategori_id', $medium->kategori_id)
                             ->where('media_id', '!=', $medium->media_id)
                             ->take(4)
                             ->get();


        // Mengambil 3 media terbaru sebagai "Media Lainnya", tidak termasuk media yang sedang dilihat.
        $media_lainnya = Media::with(['mahasiswa.prodi', 'kategori'])
                               ->where('media_id', '!=', $medium->media_id)
                               ->latest() 
                               ->take(3)
                               ->get();

        // Menambahkan variabel $media_lainnya untuk dikirim ke view.
        return view('media.show', compact('medium', 'related_media', 'media_lainnya'));
    }
}