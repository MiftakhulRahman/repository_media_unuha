@extends('layouts.app')

@section('title', 'Galeri Media')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

        {{-- Header Halaman --}}
        <div class="text-center mb-8 sm:mb-12" data-aos="fade-up">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-neutral-900 mb-2 sm:mb-3">
                Galeri Repository Media
            </h1>
            <p class="text-sm sm:text-base text-neutral-600 max-w-2xl mx-auto">
                Temukan karya-karya inovatif dan inspiratif dari para mahasiswa berbakat di berbagai bidang.
            </p>
        </div>

        {{-- Filter Section --}}
        <div class="mb-8 sm:mb-12" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white rounded-lg sm:rounded-xl border border-neutral-200 p-4 sm:p-5 shadow-sm">
                
                @if(request()->has('search') || request()->filled('kategori') || request()->filled('prodi') || request()->filled('tahun'))
                <div class="mb-4">
                    <h4 class="text-xs font-medium text-neutral-500 mb-2">Filter aktif:</h4>
                    <div class="flex flex-wrap gap-2">
                        @if(request()->filled('search'))
                            <a href="{{ route('media.index', request()->except('search')) }}" class="inline-flex items-center pl-3 pr-2 py-1 text-xs font-medium rounded-full border bg-neutral-100 text-neutral-700 hover:bg-red-50 hover:text-red-700 hover:border-red-200 transition-colors">
                                <span>Cari: "{{ Str::limit(request('search'), 20) }}"</span>
                                <i data-lucide="x" class="w-3 h-3 ml-1.5"></i>
                            </a>
                        @endif
                        @if(request()->filled('kategori'))
                             <a href="{{ route('media.index', request()->except('kategori')) }}" class="inline-flex items-center pl-3 pr-2 py-1 text-xs font-medium rounded-full border bg-neutral-100 text-neutral-700 hover:bg-red-50 hover:text-red-700 hover:border-red-200 transition-colors">
                                <span>{{ $kategoris->firstWhere('slug', request('kategori'))->nama_kategori ?? request('kategori') }}</span>
                                <i data-lucide="x" class="w-3 h-3 ml-1.5"></i>
                            </a>
                        @endif
                        @if(request()->filled('prodi'))
                             <a href="{{ route('media.index', request()->except('prodi')) }}" class="inline-flex items-center pl-3 pr-2 py-1 text-xs font-medium rounded-full border bg-neutral-100 text-neutral-700 hover:bg-red-50 hover:text-red-700 hover:border-red-200 transition-colors">
                                <span>{{ $prodis->firstWhere('slug', request('prodi'))->nama_prodi ?? request('prodi') }}</span>
                                <i data-lucide="x" class="w-3 h-3 ml-1.5"></i>
                            </a>
                        @endif
                        @if(request()->filled('tahun'))
                             <a href="{{ route('media.index', request()->except('tahun')) }}" class="inline-flex items-center pl-3 pr-2 py-1 text-xs font-medium rounded-full border bg-neutral-100 text-neutral-700 hover:bg-red-50 hover:text-red-700 hover:border-red-200 transition-colors">
                                <span>Tahun: {{ request('tahun') }}</span>
                                <i data-lucide="x" class="w-3 h-3 ml-1.5"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="w-full border-t border-neutral-200 my-4"></div>
                @endif

                <form action="{{ route('media.index') }}" method="GET">
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="search" class="w-5 h-5 text-neutral-400"></i>
                            </div>
                            <input type="text" name="search" id="search" placeholder="Cari berdasarkan judul, penulis, atau topik..."
                                value="{{ request('search') }}"
                                class="block w-full pl-12 pr-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="button" id="toggle-advanced-filter" class="flex items-center space-x-2 text-sm font-medium text-blue-600 hover:text-blue-800">
                            <i data-lucide="sliders-horizontal" class="w-4 h-4"></i>
                            <span id="toggle-filter-text">Filter</span>
                        </button>
                    </div>

                    <div id="advanced-filters" class="hidden mt-4 pt-4 border-t border-neutral-200">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-neutral-700 mb-1">Kategori</label>
                                <select name="kategori" id="kategori"
                                    class="block w-full px-3 py-2.5 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->slug }}"
                                            {{ request('kategori') == $kategori->slug ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="prodi" class="block text-sm font-medium text-neutral-700 mb-1">Program Studi</label>
                                <select name="prodi" id="prodi"
                                    class="block w-full px-3 py-2.5 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <option value="">Semua Prodi</option>
                                    @foreach ($prodis as $prodi)
                                        <option value="{{ $prodi->slug }}"
                                            {{ request('prodi') == $prodi->slug ? 'selected' : '' }}>
                                            {{ $prodi->nama_prodi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="tahun" class="block text-sm font-medium text-neutral-700 mb-1">Tahun</label>
                                <select name="tahun" id="tahun"
                                    class="block w-full px-3 py-2.5 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <option value="">Semua Tahun</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                            {{ $tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-3 mt-4 pt-4 border-t border-neutral-200">
                             <a href="{{ route('media.index') }}"
                                class="px-4 py-2 border border-neutral-300 hover:bg-neutral-50 text-neutral-700 text-sm font-medium rounded-lg transition-colors">
                                Reset Semua
                            </a>
                            <button type="submit"
                                class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Terapkan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Daftar Media --}}
        <div data-aos="fade-up" data-aos-delay="200">
            @if ($media->isNotEmpty())
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($media as $item)
                        <article
                            class="group bg-white rounded-lg sm:rounded-xl shadow-sm border border-neutral-200 overflow-hidden hover:shadow-md hover:border-neutral-300 transition-all duration-200">
                             <a href="{{ route('media.show', $item) }}" class="block">
                                <div class="aspect-w-16 aspect-h-9 bg-neutral-100 overflow-hidden">
                                    @if ($item->gambar_cover)
                                        <img src="{{ asset('storage/' . $item->gambar_cover) }}"
                                            alt="Cover {{ $item->judul }}"
                                            class="w-full h-32 sm:h-40 object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div
                                            class="w-full h-32 sm:h-40 bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center">
                                            <i data-lucide="image" class="w-8 h-8 sm:w-10 sm:h-10 text-neutral-400"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-2 sm:mb-3">
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-blue-100 text-blue-700" title="{{ $item->kategori->nama_kategori ?? '' }}">
                                            {{ Str::limit($item->kategori->nama_kategori ?? 'Tidak Berkategori', 12) }}
                                        </span>
                                        <span class="text-xs text-neutral-500">{{ $item->tahun_terbit }}</span>
                                    </div>

                                    <h3
                                        class="text-sm sm:text-base font-semibold text-neutral-900 mb-2 sm:mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                        {{ $item->judul }}
                                    </h3>

                                    <div class="space-y-1 text-xs text-neutral-600">
                                        <p class="font-medium truncate">
                                            {{ $item->mahasiswa->nama_lengkap ?? 'N/A' }}
                                            @if($item->mahasiswa->nim)
                                                <span class="text-neutral-500">({{ $item->mahasiswa->nim }})</span>
                                            @endif
                                        </p>
                                        <p class="text-neutral-500 truncate">
                                            {{ $item->mahasiswa->prodi->nama_prodi ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-8 sm:mt-12">
                    {{ $media->appends(request()->query())->links() }}
                </div>
            @else
                <div class="bg-neutral-50 border border-neutral-200 rounded-lg sm:rounded-xl p-6 sm:p-12 text-center">
                    <div class="w-12 h-12 bg-neutral-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="search-x" class="w-6 h-6 text-neutral-500"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-medium text-neutral-700 mb-2">Tidak Ada Media Ditemukan</h3>
                    <p class="text-sm text-neutral-500 mb-4">Coba gunakan kata kunci atau filter yang berbeda.</p>
                    <a href="{{ route('media.index') }}" 
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 hover:text-blue-700">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        Kembali ke Semua Media
                    </a>
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        #advanced-filters {
            transition: all 0.3s ease-in-out;
            max-height: 0;
            overflow: hidden;
        }
        #advanced-filters.open {
            max-height: 500px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
            const searchInput = document.getElementById('search');
            
            // MODIFIKASI: Bagian auto-focus dihapus
            if (searchInput) {
                // Hanya menambahkan event listener untuk 'Enter'
                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        // Mencegah form submit default jika diperlukan, lalu submit manual
                        e.preventDefault();
                        this.closest('form').submit();
                    }
                });
            }

            const toggleButton = document.getElementById('toggle-advanced-filter');
            const advancedFilters = document.getElementById('advanced-filters');
            const toggleText = document.getElementById('toggle-filter-text');
            const toggleIcon = toggleButton.querySelector('i');

            toggleButton.addEventListener('click', function() {
                const isOpen = advancedFilters.classList.contains('open');
                
                advancedFilters.classList.toggle('hidden');
                setTimeout(() => {
                    advancedFilters.classList.toggle('open', !isOpen);
                }, 10);

                if (!isOpen) {
                    toggleText.textContent = 'Tutup';
                    toggleIcon.setAttribute('data-lucide', 'chevron-up');
                } else {
                    toggleText.textContent = 'Filter';
                    toggleIcon.setAttribute('data-lucide', 'sliders-horizontal');
                }
                lucide.createIcons();
            });
        });
    </script>
@endsection