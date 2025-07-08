@extends('layouts.app')

@section('title', $medium->judul)

@section('content')
<div class="bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        
        {{-- Breadcrumb dengan styling konsisten --}}
        <nav class="flex mb-8" aria-label="Breadcrumb" data-aos="fade-down">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-neutral-600 hover:text-primary-600 transition-colors">
                        <i data-lucide="home" class="w-4 h-4 me-2"></i>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i data-lucide="chevron-right" class="w-4 h-4 text-neutral-400 mx-1"></i>
                        <a href="{{ route('media.index') }}" class="text-sm font-medium text-neutral-600 hover:text-primary-600 transition-colors">Galeri</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i data-lucide="chevron-right" class="w-4 h-4 text-neutral-400 mx-1"></i>
                        <span class="text-sm font-medium text-neutral-500 line-clamp-1">{{ $medium->judul }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- Layout Utama --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 lg:gap-12">
            
            {{-- Kolom Kiri (Konten Utama) --}}
            <div class="xl:col-span-2" data-aos="fade-right" data-aos-delay="100">
                
                {{-- Gambar Cover untuk Mobile --}}
                <div class="xl:hidden mb-8" data-aos="zoom-in">
                    <div class="bg-white rounded-xl shadow-sm border border-neutral-200/80 overflow-hidden">
                        @if ($medium->gambar_cover)
                            <img src="{{ asset('storage/' . $medium->gambar_cover) }}" alt="Cover {{ $medium->judul }}" class="w-full h-64 sm:h-80 object-cover">
                        @else
                            <div class="w-full h-64 sm:h-80 bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center">
                                <i data-lucide="image-off" class="w-16 h-16 text-neutral-400"></i>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Header Card --}}
                <div class="bg-white rounded-xl shadow-sm border border-neutral-200/80 p-6 sm:p-8 mb-8">
                    {{-- Judul Utama --}}
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-neutral-900 mb-6 leading-tight">{{ $medium->judul }}</h1>

                    {{-- Metadata --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        {{-- Detail Mahasiswa, NIM, Prodi, Kategori, dll. --}}
                        <div class="flex items-center gap-3 p-3 bg-neutral-50/50 rounded-lg border border-neutral-100">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i data-lucide="user-round" class="w-5 h-5 text-primary-600"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-medium text-neutral-500 uppercase tracking-wider">Mahasiswa</p>
                                <p class="text-sm font-semibold text-neutral-800 truncate">{{ $medium->mahasiswa->nama_lengkap ?? 'N/A' }}</p>
                            </div>
                        </div>
                        @if($medium->mahasiswa->nim)
                        <div class="flex items-center gap-3 p-3 bg-neutral-50/50 rounded-lg border border-neutral-100">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i data-lucide="contact" class="w-5 h-5 text-primary-600"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-medium text-neutral-500 uppercase tracking-wider">NIM</p>
                                <p class="text-sm font-semibold text-neutral-800">{{ $medium->mahasiswa->nim }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="flex items-center gap-3 p-3 bg-neutral-50/50 rounded-lg border border-neutral-100">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i data-lucide="graduation-cap" class="w-5 h-5 text-primary-600"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-medium text-neutral-500 uppercase tracking-wider">Program Studi</p>
                                <p class="text-sm font-semibold text-neutral-800 truncate">{{ $medium->mahasiswa->prodi->nama_prodi ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-neutral-50/50 rounded-lg border border-neutral-100">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i data-lucide="folder-open" class="w-5 h-5 text-primary-600"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-medium text-neutral-500 uppercase tracking-wider">Kategori</p>
                                <p class="text-sm font-semibold text-neutral-800 truncate">{{ $medium->kategori->nama_kategori ?? 'Tidak Berkategori' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-neutral-50/50 rounded-lg border border-neutral-100 sm:col-span-2">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i data-lucide="calendar" class="w-5 h-5 text-primary-600"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-medium text-neutral-500 uppercase tracking-wider">Tahun Terbit</p>
                                <p class="text-sm font-semibold text-neutral-800">{{ $medium->tahun_terbit }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- [MODIFIED] Tombol Aksi --}}
                    <div class="flex flex-wrap items-center gap-4 mt-8">
                        @if($medium->link_media)
                        <a href="{{ $medium->link_media }}" target="_blank" rel="noopener noreferrer" 
                           class="inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-neutral-900 hover:bg-neutral-800 rounded-lg shadow-sm transition-all duration-200 hover:shadow-md hover:scale-[1.02] will-change-transform">
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                            <span>Kunjungi Media</span>
                        </a>
                        @endif
                        <a href="{{ route('media.index') }}" 
                           class="inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold text-neutral-700 bg-white border border-neutral-300 rounded-lg hover:bg-neutral-50 hover:border-neutral-400 transition-all duration-200 shadow-sm hover:shadow-md">
                            <i data-lucide="arrow-left" class="w-4 h-4"></i>
                            <span>Kembali ke Galeri</span>
                        </a>
                    </div>
                </div>

                {{-- Deskripsi Card --}}
                <div class="bg-white rounded-xl shadow-sm border border-neutral-200/80 p-6 sm:p-8 mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                            <i data-lucide="file-text" class="w-4 h-4 text-primary-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-neutral-900">Deskripsi Karya</h2>
                    </div>
                    <div class="prose prose-neutral max-w-none text-neutral-700 leading-relaxed">
                        {!! nl2br(e($medium->deskripsi)) !!}
                    </div>
                </div>

                {{-- Judul Penelitian Card --}}
                @if($medium->judul_penelitian)
                <div class="bg-white rounded-xl shadow-sm border border-neutral-200/80 p-6 sm:p-8 mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                            <i data-lucide="search" class="w-4 h-4 text-primary-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-neutral-900">Judul Penelitian</h2>
                    </div>
                    <div class="bg-primary-50/50 border border-primary-200/50 rounded-lg p-4">
                        <p class="text-neutral-800 font-medium text-lg italic">"{{ $medium->judul_penelitian }}"</p>
                    </div>
                </div>
                @endif
            </div>

            {{-- Kolom Kanan (Sidebar) --}}
            <div class="space-y-8" data-aos="fade-left" data-aos-delay="200">
                
                {{-- Gambar Cover untuk Desktop --}}
                <div class="hidden xl:block">
                    <div class="bg-white rounded-xl shadow-sm border border-neutral-200/80 overflow-hidden sticky top-24">
                        @if ($medium->gambar_cover)
                            <img src="{{ asset('storage/' . $medium->gambar_cover) }}" alt="Cover {{ $medium->judul }}" class="w-full h-auto object-cover">
                        @else
                            <div class="aspect-square bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center">
                                <i data-lucide="image-off" class="w-16 h-16 text-neutral-400"></i>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Karya Terkait Card --}}
                @if($related_media->isNotEmpty())
                <div class="bg-white rounded-xl shadow-sm border border-neutral-200/80 p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                            <i data-lucide="layers" class="w-4 h-4 text-primary-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-neutral-900">Karya Terkait</h2>
                    </div>
                    <div class="space-y-3">
                        @foreach($related_media as $related)
                            <a href="{{ route('media.show', $related) }}" class="group flex items-center gap-4 p-3 rounded-lg border border-neutral-200/50 hover:border-primary-300 hover:bg-primary-50/30 transition-all duration-200 hover:shadow-sm">
                                <div class="flex-shrink-0 w-12 h-12 rounded-lg overflow-hidden bg-neutral-200">
                                    @if($related->gambar_cover)
                                        <img src="{{ asset('storage/' . $related->gambar_cover) }}" alt="Cover {{ $related->judul }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i data-lucide="image" class="w-5 h-5 text-neutral-400"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-neutral-800 group-hover:text-primary-700 line-clamp-1 transition-colors">{{ $related->judul }}</p>
                                    <p class="text-xs text-neutral-500 line-clamp-1">{{ $related->mahasiswa->nama_lengkap }}</p>
                                </div>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-neutral-400 group-hover:text-primary-600 transition-colors flex-shrink-0"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Bagian Media Lainnya --}}
        @isset($media_lainnya)
            @if ($media_lainnya->isNotEmpty())
                <div class="mt-16 pt-12 border-t border-neutral-200" data-aos="fade-up">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl sm:text-4xl font-bold text-neutral-900">Media Lainnya</h2>
                        <p class="text-neutral-600 mt-2">Jelajahi karya-karya lain yang mungkin Anda sukai.</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                        @foreach ($media_lainnya as $item)
                            <article
                                class="group bg-white rounded-xl sm:rounded-2xl shadow-sm border border-neutral-200/50 overflow-hidden hover:shadow-xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-1 will-change-transform">
                                <div class="aspect-w-16 aspect-h-9 bg-neutral-100 overflow-hidden">
                                    @if ($item->gambar_cover)
                                        <img src="{{ asset('storage/' . $item->gambar_cover) }}"
                                            alt="Cover {{ $item->judul }}"
                                            class="w-full h-40 sm:h-48 object-cover group-hover:scale-105 transition-transform duration-500 will-change-transform">
                                    @else
                                        <div
                                            class="w-full h-40 sm:h-48 bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center">
                                            <i data-lucide="image" class="w-10 h-10 sm:w-12 sm:h-12 text-neutral-400"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="p-4 sm:p-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <span
                                            class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-primary-100 text-primary-700">
                                            {{ $item->kategori->nama_kategori ?? 'Tidak Berkategori' }}
                                        </span>
                                        <span class="text-xs text-neutral-500 font-medium">{{ $item->tahun_terbit }}</span>
                                    </div>

                                    <h3
                                        class="text-base sm:text-lg font-semibold text-neutral-900 mb-3 line-clamp-2 group-hover:text-primary-600 transition-colors duration-200">
                                        <a href="{{ route('media.show', $item) }}" class="focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            {{ $item->judul }}
                                        </a>
                                    </h3>

                                    <div class="space-y-1 text-sm text-neutral-600">
                                        <p class="font-medium truncate">
                                            {{ $item->mahasiswa->nama_lengkap ?? 'N/A' }}
                                            @if($item->mahasiswa->nim)
                                                <span class="text-neutral-500">({{ $item->mahasiswa->nim }})</span>
                                            @endif
                                        </p>
                                        <p class="text-xs text-neutral-500 truncate">
                                            {{ $item->mahasiswa->prodi->nama_prodi ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        @endisset

        {{-- [REMOVED] Tombol Kembali yang lama sudah dihapus dari sini --}}

    </div>
</div>
@endsection
