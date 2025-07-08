@extends('layouts.admin')

{{-- Mengirim judul halaman ke layout utama --}}
@section('page-title', 'Detail Media')

@section('content')
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
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                        <a href="{{ route('admin.media.index') }}" class="ms-1 text-sm font-medium text-neutral-700 hover:text-primary-600 md:ms-2">Kelola Media</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                        <span class="ms-1 text-sm font-medium text-neutral-500 md:ms-2">Detail</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.media.index') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-50 focus:outline-none">
                Kembali
            </a>
            <a href="{{ route('admin.media.edit', $medium) }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg shadow-sm hover:bg-primary-700 focus:outline-none">
                Edit Media Ini
            </a>
        </div>
    </div>
    
    {{-- Konten Detail --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Kiri: Gambar Cover --}}
        <div class="lg:col-span-1">
             <img src="{{ $medium->gambar_cover ? asset('storage/' . $medium->gambar_cover) : 'https://via.placeholder.com/600x400?text=No+Image' }}" alt="Cover" class="w-full h-auto object-cover rounded-xl shadow-lg border border-neutral-200/80">
        </div>

        {{-- Kolom Kanan: Detail Teks --}}
        <div class="lg:col-span-2 bg-white p-8 rounded-xl border border-neutral-200/80 shadow-sm">
            <h1 class="text-3xl font-extrabold text-neutral-900 mb-2">{{ $medium->judul }}</h1>
            <p class="text-md text-neutral-500 mb-6">
                Oleh: <span class="font-semibold text-primary-600">{{ $medium->mahasiswa->nama_lengkap ?? 'N/A' }}</span>
                <span class="mx-2 text-neutral-300">|</span>
                Tahun: <span class="font-semibold">{{ $medium->tahun_terbit }}</span>
            </p>

            <div class="prose prose-sm max-w-none text-neutral-700 mb-6">
                <p>{!! nl2br(e($medium->deskripsi)) !!}</p>
            </div>

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 text-sm mb-6">
                <div class="border-t border-neutral-200 pt-3">
                    <dt class="font-medium text-neutral-800">Program Studi</dt>
                    <dd class="text-neutral-600 mt-1">{{ $medium->mahasiswa->prodi->nama_prodi ?? 'N/A' }}</dd>
                </div>
                <div class="border-t border-neutral-200 pt-3">
                    <dt class="font-medium text-neutral-800">Kategori</dt>
                    <dd class="text-neutral-600 mt-1">{{ $medium->kategori->nama_kategori ?? 'Tidak Berkategori' }}</dd>
                </div>
                <div class="border-t border-neutral-200 pt-3 md:col-span-2">
                    <dt class="font-medium text-neutral-800">Judul Penelitian/Proyek Terkait</dt>
                    <dd class="text-neutral-600 mt-1">{{ $medium->judul_penelitian }}</dd>
                </div>
            </dl>

            <div class="border-t border-neutral-200 pt-6">
                <a href="{{ $medium->link_media }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-medium text-white bg-neutral-800 border border-transparent rounded-lg shadow-sm hover:bg-neutral-900 focus:outline-none">
                    Lihat Media/Proyek
                    <svg class="w-4 h-4 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-4.5 0V6.375c0-.621.504-1.125 1.125-1.125h4.125c.621 0 1.125.504 1.125 1.125V10.5m-7.5-4.125h7.5" /></svg>
                </a>
            </div>
        </div>
    </div>
@endsection