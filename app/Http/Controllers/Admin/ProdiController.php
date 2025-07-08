<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::withCount('mahasiswas')->get(); // withCount untuk hitung mahasiswa
        return view('admin.prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'singkatan' => 'required|string|max:10',
        ]);

        Prodi::create($request->all());

        return redirect()->route('admin.prodi.index')
                        ->with('success', 'Prodi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        return view('admin.prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'singkatan' => 'required|string|max:10',
        ]);

        $prodi->update($request->all());

        return redirect()->route('admin.prodi.index')
                        ->with('success', 'Prodi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        // Cek apakah prodi masih punya mahasiswa
        if ($prodi->mahasiswas()->count() > 0) {
            return redirect()->route('admin.prodi.index')
                            ->with('error', 'Prodi tidak bisa dihapus karena masih memiliki mahasiswa.');
        }

        $prodi->delete();

        return redirect()->route('admin.prodi.index')
                        ->with('success', 'Prodi berhasil dihapus.');
    }
}