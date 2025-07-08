@extends('layouts.admin')

{{-- Mengirim judul halaman ke layout utama --}}
@section('page-title', 'Kelola Media')

@section('content')
    {{-- Breadcrumb --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-neutral-700 hover:text-primary-600">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/></svg>
                    Dashboard
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                    <span class="ms-1 text-sm font-medium text-neutral-500 md:ms-2">Kelola Media</span>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Header halaman --}}
    <div class="flex justify-between items-center mt-4 mb-6">
        <h1 class="text-2xl font-bold text-neutral-800">Daftar Media</h1>
        <a href="{{ route('admin.media.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
            <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
            Tambah Media Baru
        </a>
    </div>

    {{-- Tabel data --}}
    <div class="bg-white rounded-xl border border-neutral-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-neutral-600">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100/80">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">Cover</th>
                        <th scope="col" class="px-6 py-3 font-semibold">Judul</th>
                        <th scope="col" class="px-6 py-3 font-semibold">Mahasiswa</th>
                        <th scope="col" class="px-6 py-3 font-semibold">Kategori</th>
                        <th scope="col" class="px-6 py-3 font-semibold text-center">Tahun</th>
                        <th scope="col" class="px-6 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200">
                    @forelse ($media as $item)
                        <tr class="hover:bg-neutral-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <img src="{{ $item->gambar_cover ? asset('storage/' . $item->gambar_cover) : 'https://via.placeholder.com/150x100?text=No+Image' }}" alt="Cover" class="w-24 h-16 object-cover rounded-md bg-neutral-200">
                            </td>
                            <td class="px-6 py-4 font-medium text-neutral-900">{{ $item->judul }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->mahasiswa->nama_lengkap ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $item->kategori->nama_kategori ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-center">{{ $item->tahun_terbit }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center space-x-4">
                                    <a href="{{ route('admin.media.show', $item) }}" title="Lihat" class="text-green-600 hover:text-green-800 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </a>
                                    <a href="{{ route('admin.media.edit', $item) }}" title="Edit" class="text-primary-600 hover:text-primary-800 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.media.destroy', $item) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-delete-form
                                                data-delete-message="Apakah Anda yakin ingin menghapus media berjudul <strong>{{ $item->judul }}</strong>?"
                                                title="Hapus" class="text-red-600 hover:text-red-800 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-neutral-500">
                                Tidak ada data media.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection