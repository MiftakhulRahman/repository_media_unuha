@extends('layouts.admin')

@section('page-title', 'Edit Media')

@section('content')
    <form action="{{ route('admin.media.update', $medium) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Breadcrumb dan Tombol Aksi --}}
        <div class="flex justify-between items-center mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-neutral-700 hover:text-primary-600">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/></svg>
                            Dashboard
                        </a>
                    </li>
                    <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg><a href="{{ route('admin.media.index') }}" class="ms-1 text-sm font-medium text-neutral-700 hover:text-primary-600 md:ms-2">Kelola Media</a></div></li>
                    <li aria-current="page"><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg><span class="ms-1 text-sm font-medium text-neutral-500 md:ms-2">Edit Media</span></div></li>
                </ol>
            </nav>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.media.index') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-50">Batal</a>
                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg shadow-sm hover:bg-primary-700">Perbarui</button>
            </div>
        </div>

        {{-- Layout Form 2 Kolom --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Kolom Utama (Konten) --}}
            <div class="lg:col-span-2 bg-white p-8 rounded-xl border border-neutral-200/80 shadow-sm">
                <div class="space-y-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium text-neutral-700">Judul Karya</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $medium->judul) }}" required class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-neutral-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="8" required class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">{{ old('deskripsi', $medium->deskripsi) }}</textarea>
                    </div>
                     <div>
                        <label for="judul_penelitian" class="block text-sm font-medium text-neutral-700">Judul Penelitian/Proyek Terkait</label>
                        <input type="text" id="judul_penelitian" name="judul_penelitian" value="{{ old('judul_penelitian', $medium->judul_penelitian) }}" class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="link_media" class="block text-sm font-medium text-neutral-700">URL/Link ke Media (Contoh: Youtube, Jurnal, dll)</label>
                        <input type="url" id="link_media" name="link_media" value="{{ old('link_media', $medium->link_media) }}" class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
            </div>

            {{-- Kolom Samping (Metadata) --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-6 rounded-xl border border-neutral-200/80 shadow-sm space-y-6">
                    <div>
                        <label for="mahasiswa_id" class="block text-sm font-medium text-neutral-700">Mahasiswa (Penulis)</label>
                        <select name="mahasiswa_id" id="mahasiswa_id" required class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 bg-white rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500"><option value="">Pilih Mahasiswa</option>@foreach($mahasiswas as $mahasiswa)<option value="{{ $mahasiswa->mahasiswa_id }}" {{ old('mahasiswa_id', $medium->mahasiswa_id) == $mahasiswa->mahasiswa_id ? 'selected' : '' }}>{{ $mahasiswa->nama_lengkap }} ({{ $mahasiswa->prodi->singkatan }})</option>@endforeach</select>
                    </div>
                    <div>
                        <label for="kategori_id" class="block text-sm font-medium text-neutral-700">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 bg-white rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500"><option value="">Tidak ada kategori</option>@foreach($kategoris as $kategori)<option value="{{ $kategori->kategori_id }}" {{ old('kategori_id', $medium->kategori_id) == $kategori->kategori_id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>@endforeach</select>
                    </div>
                    <div>
                        <label for="tahun_terbit" class="block text-sm font-medium text-neutral-700">Tahun Terbit</label>
                        <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $medium->tahun_terbit) }}" required class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
                 <div class="bg-white p-6 rounded-xl border border-neutral-200/80 shadow-sm">
                    <label for="gambar_cover" class="block text-sm font-medium text-neutral-700 mb-2">Gambar Cover Baru</label>
                    <p class="text-xs text-neutral-500 mb-3">Kosongkan jika tidak ingin mengubah cover.</p>
                    @if($medium->gambar_cover)
                        <img src="{{ asset('storage/' . $medium->gambar_cover) }}" alt="Cover saat ini" class="w-full h-auto object-cover rounded-lg mb-4 border">
                    @endif
                    <input type="file" id="gambar_cover" name="gambar_cover" accept="image/*" class="block w-full text-sm text-neutral-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                </div>
            </div>
        </div>
    </form>
@endsection