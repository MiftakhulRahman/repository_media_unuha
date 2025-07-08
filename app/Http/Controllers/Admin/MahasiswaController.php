<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['prodi'])
                              ->withCount('media')
                              ->get();
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('admin.mahasiswa.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim',
            'nama_lengkap' => 'required|string|max:255',
            'prodi_id' => 'required|exists:prodis,prodi_id',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('admin.mahasiswa.index')
                        ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim,' . $mahasiswa->mahasiswa_id . ',mahasiswa_id',
            'nama_lengkap' => 'required|string|max:255',
            'prodi_id' => 'required|exists:prodis,prodi_id',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('admin.mahasiswa.index')
                        ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        // Mahasiswa bisa dihapus, media akan ikut terhapus (CASCADE)
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')
                        ->with('success', 'Mahasiswa dan semua medianya berhasil dihapus.');
    }
}