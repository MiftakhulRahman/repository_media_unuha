@extends('layouts.admin')

{{-- Mengirim judul 'Dashboard' ke layout utama --}}
@section('page-title', 'Dashboard')

@section('content')
    {{-- Pesan Selamat Datang --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-800">Selamat Datang Kembali, {{ Auth::guard('admin')->user()->name }}!
        </h1>
        <p class="text-neutral-500 mt-1">Berikut adalah ringkasan singkat dari situs Anda.</p>
    </div>

    {{-- Grid untuk Kartu Statistik --}}
    @if (!empty($stats))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            {{-- Kartu: Total Program Studi --}}
            <div class="bg-white p-6 rounded-xl border border-neutral-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500">Total Program Studi</p>
                        <p class="text-3xl font-bold text-neutral-800 mt-1">{{ $stats['total_prodi'] }}</p>
                    </div>
                    <div class="bg-primary-100/80 text-primary-600 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-graduation-cap">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                            <path d="M6 12v5c3.33 1.67 6.67 1.67 10 0v-5" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Kartu: Total Kategori --}}
            <div class="bg-white p-6 rounded-xl border border-neutral-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500">Total Kategori</p>
                        <p class="text-3xl font-bold text-neutral-800 mt-1">{{ $stats['total_kategori'] }}</p>
                    </div>
                    <div class="bg-green-100 text-green-600 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-folder">
                            <path
                                d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Kartu: Total Mahasiswa --}}
            <div class="bg-white p-6 rounded-xl border border-neutral-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500">Total Mahasiswa</p>
                        <p class="text-3xl font-bold text-neutral-800 mt-1">{{ $stats['total_mahasiswa'] }}</p>
                    </div>
                    <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Kartu: Total Media --}}
            <div class="bg-white p-6 rounded-xl border border-neutral-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500">Total Media</p>
                        <p class="text-3xl font-bold text-neutral-800 mt-1">{{ $stats['total_media'] }}</p>
                    </div>
                    <div class="bg-red-100 text-red-600 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-image">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                            <circle cx="9" cy="9" r="2" />
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Tabel Media Terbaru --}}
    {{-- Tabel Media Terbaru --}}
    <h3 class="text-xl font-semibold text-neutral-800 mb-4">Media Terbaru</h3>
    <div class="bg-white rounded-xl border border-neutral-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-neutral-600">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100/80">
                    <tr>
                        {{-- [REVISI] Menambahkan kolom untuk gambar cover --}}
                        <th scope="col" class="px-6 py-3 font-semibold">Cover</th>
                        <th scope="col" class="px-6 py-3 font-semibold">Judul</th>
                        <th scope="col" class="px-6 py-3 font-semibold">Mahasiswa</th>
                        <th scope="col" class="px-6 py-3 font-semibold">Kategori</th>
                        <th scope="col" class="px-6 py-3 font-semibold">Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200">
                    @forelse($recent_media as $media)
                        <tr class="hover:bg-neutral-50 transition-colors duration-200">
                            {{-- [REVISI] Sel untuk menampilkan gambar cover --}}
                            <td class="px-6 py-4">
                                @if ($media->gambar_cover)
                                    <img src="{{ asset('storage/' . $media->gambar_cover) }}" alt="Cover {{ $media->judul }}"
                                        class="w-24 h-14 object-cover rounded-md bg-neutral-200">
                                @else
                                    {{-- Placeholder jika tidak ada gambar --}}
                                    <div class="w-24 h-14 bg-neutral-200 rounded-md flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-image-off text-neutral-400">
                                            <line x1="2" x2="22" y1="2" y2="22" />
                                            <path d="M10.41 10.41a2 2 0 1 1-2.83-2.83" />
                                            <path d="M13.41 13.41a2 2 0 1 1-2.83-2.83" />
                                            <path d="M21 15.79V5c0-1.1-.9-2-2-2H6.21" />
                                            <path
                                                d="M3 3v1a2 2 0 0 0 2 2h1m10.79 10.79A2 2 0 0 1 19 21H5c-1.1 0-2-.9-2-2v-7.79" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">
                                {{-- [REVISI] Memperbaiki link ke route yang benar --}}
                                <a href="{{ route('admin.media.show', $media) }}"
                                    class="text-primary-600 hover:text-primary-800 hover:underline">
                                    {{ $media->judul }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $media->mahasiswa->nama_lengkap ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $media->kategori->nama_kategori ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $media->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            {{-- Sesuaikan colspan menjadi 5 karena ada tambahan kolom --}}
                            <td colspan="5" class="text-center py-10 text-neutral-500">
                                Belum ada media yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
