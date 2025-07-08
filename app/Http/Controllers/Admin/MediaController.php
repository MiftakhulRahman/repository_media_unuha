<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Mahasiswa;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::with(['mahasiswa.prodi', 'kategori'])
            ->latest()
            ->get();
        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        $kategoris = Kategori::all();
        return view('admin.media.create', compact('mahasiswas', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'kategori_id' => 'nullable|exists:kategoris,kategori_id',
            'judul' => 'required|string|max:255',
            'gambar_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'judul_penelitian' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'link_media' => 'required|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_cover')) {
            $imagePath = $request->file('gambar_cover')->store('media_covers', 'public');
            $data['gambar_cover'] = $imagePath;
        }

        Media::create($data);

        return redirect()->route('admin.media.index')
            ->with('success', 'Media berhasil ditambahkan.');
    }

    public function show(Media $medium)
    {
        $medium->load(['mahasiswa.prodi', 'kategori']);
        return view('admin.media.show', compact('medium'));
    }

    public function edit(Media $medium)
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        $kategoris = Kategori::all();
        return view('admin.media.edit', compact('medium', 'mahasiswas', 'kategoris'));
    }

    public function update(Request $request, Media $medium)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'kategori_id' => 'nullable|exists:kategoris,kategori_id',
            'judul' => 'required|string|max:255',
            'gambar_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'judul_penelitian' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'link_media' => 'required|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_cover')) {
            // Delete old image if exists
            if ($medium->gambar_cover && Storage::disk('public')->exists($medium->gambar_cover)) {
                Storage::disk('public')->delete($medium->gambar_cover);
            }
            $imagePath = $request->file('gambar_cover')->store('media_covers', 'public');
            $data['gambar_cover'] = $imagePath;
        }

        $medium->update($data);

        return redirect()->route('admin.media.index')
            ->with('success', 'Media berhasil diperbarui.');
    }

    public function destroy(Media $medium)
    {
        $medium->delete();

        return redirect()->route('admin.media.index')
            ->with('success', 'Media berhasil dihapus.');
    }
}
