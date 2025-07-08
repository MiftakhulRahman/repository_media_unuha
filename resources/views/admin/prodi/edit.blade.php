@extends('layouts.admin')

{{-- [REVISI] Mengirim judul halaman ke layout utama --}}
@section('page-title', 'Edit Program Studi')

@section('content')
    {{-- [REVISI] Menambahkan Breadcrumb --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-neutral-700 hover:text-primary-600">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('admin.prodi.index') }}" class="ms-1 text-sm font-medium text-neutral-700 hover:text-primary-600 md:ms-2">Kelola Prodi</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-neutral-500 md:ms-2">Edit Prodi</span>
                </div>
            </li>
        </ol>
    </nav>

    <h1 class="text-2xl font-bold text-neutral-800 mt-4 mb-6">Edit Program Studi</h1>

    {{-- [REVISI] Mengubah form menjadi card modern --}}
    <div class="bg-white p-8 rounded-xl border border-neutral-200/80 shadow-sm">
        <form action="{{ route('admin.prodi.update', $prodi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                {{-- Input Nama Prodi --}}
                <div>
                    <label for="nama_prodi" class="block text-sm font-medium text-neutral-700">Nama Prodi</label>
                    <input type="text" id="nama_prodi" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" required
                           class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm placeholder-neutral-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                </div>
                
                {{-- Input Singkatan --}}
                <div>
                    <label for="singkatan" class="block text-sm font-medium text-neutral-700">Singkatan</label>
                    <input type="text" id="singkatan" name="singkatan" value="{{ old('singkatan', $prodi->singkatan) }}" required
                           class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm placeholder-neutral-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end items-center space-x-4 mt-8 pt-6 border-t border-neutral-200">
                <a href="{{ route('admin.prodi.index') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-50 focus:outline-none">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg shadow-sm hover:bg-primary-700 focus:outline-none">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
@endsection