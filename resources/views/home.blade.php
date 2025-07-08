@extends('layouts.app')

@section('title', 'Repository Media')

@section('content')
    <style>
        /* Animasi mengambang untuk elemen dekorasi */
        @keyframes float {
            0%, 100% { transform: translateY(0px) translateX(0px); }
            25% { transform: translateY(-10px) translateX(5px); }
            50% { transform: translateY(-20px) translateX(-5px); }
            75% { transform: translateY(-15px) translateX(10px); }
        }

        @keyframes floatReverse {
            0%, 100% { transform: translateY(0px) translateX(0px); }
            25% { transform: translateY(10px) translateX(-8px); }
            50% { transform: translateY(20px) translateX(8px); }
            75% { transform: translateY(15px) translateX(-12px); }
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) translateX(0px); }
            33% { transform: translateY(-15px) translateX(8px); }
            66% { transform: translateY(12px) translateX(-6px); }
        }

        /* Animasi partikel bintang berkilau */
        @keyframes sparkle {
            0% { 
                transform: scale(0) rotate(0deg);
                opacity: 0.8;
            }
            50% { 
                transform: scale(1) rotate(45deg);
                opacity: 1;
            }
            100% { 
                transform: scale(0.5) rotate(90deg) translateY(40px);
                opacity: 0;
            }
        }

        .floating-shape-1 {
            animation: float 8s ease-in-out infinite;
        }

        .floating-shape-2 {
            animation: floatReverse 12s ease-in-out infinite;
        }

        .floating-shape-3 {
            animation: floatSlow 10s ease-in-out infinite;
        }

        .floating-shape-mobile-1 {
            animation: float 6s ease-in-out infinite;
        }

        .floating-shape-mobile-2 {
            animation: floatReverse 9s ease-in-out infinite;
        }

        /* Animasi efek mengetik pada judul */
        .typing-text {
            border-right: 3px solid rgba(255, 255, 255, 0.8);
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 50% { border-color: rgba(255, 255, 255, 0.8); }
            51%, 100% { border-color: transparent; }
        }

        .typing-container {
            display: inline-block;
            min-height: 1.2em;
        }

        /* Gaya untuk kanvas partikel */
        #sparkle-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 5;
        }

        .hero-wrapper {
            position: relative;
            overflow: hidden;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-12">
        <div
            class="hero-wrapper bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 rounded-2xl sm:rounded-3xl mb-16 sm:mb-20 lg:mb-24" data-aos="fade-up">
            <canvas id="sparkle-canvas"></canvas>
            <div class="absolute inset-0 bg-black/10"></div>

            <div class="relative z-10 px-6 py-16 sm:px-12 sm:py-20 lg:px-16 lg:py-24">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-[1.7rem] sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 leading-tight">
                        Selamat Datang
                        <span class="block text-primary-100 mt-1 sm:mt-2">
                            <span class="typing-container">
                                <span id="typing-text" class="typing-text"></span>
                            </span>
                        </span>
                    </h1>
                    <p class="text-1xl sm:text-lg lg:text-xl text-primary-100 mb-6 sm:mb-8 leading-relaxed max-w-3xl mx-auto px-2 sm:px-0">
                        Platform untuk menampilkan karya media digital dari mahasiswa <br class="hidden sm:block"> Universitas Nurul Huda
                    </p>
                    
                    <div class="max-w-xl mx-auto mb-8">
                        <form action="{{ route('media.index') }}" method="GET" class="relative flex items-center">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                <i data-lucide="search" class="w-5 h-5 text-primary-100/70"></i>
                            </div>
                            <input type="search" name="search"
                                   class="w-full bg-white/20 backdrop-blur-sm border-2 border-white/30 text-white placeholder-primary-100/70 rounded-lg py-3 pl-12 pr-24 sm:pr-28 focus:ring-2 focus:ring-white/80 focus:border-white/50 transition duration-200"
                                   placeholder="Cari karya, penulis, atau topik...">
                            <button type="submit"
                                    class="absolute right-1.5 top-1/2 -translate-y-1/2 inline-flex items-center justify-center bg-white text-primary-600 px-4 py-1.5 rounded-md font-semibold hover:bg-primary-50 transition-transform duration-200 hover:scale-105">
                                Cari
                            </button>
                        </form>
                    </div>

                    <div class="flex flex-row gap-3 sm:gap-4 justify-center max-w-md sm:max-w-none mx-auto">
                        <a href="{{ route('media.index') }}"
                            class="inline-flex items-center justify-center space-x-2 bg-white text-primary-600 text-sm sm:text-base px-4 sm:px-6 py-2 sm:py-3 rounded-md font-semibold hover:bg-primary-50 transition-transform duration-200 hover:scale-105 will-change-transform">
                            <span>Jelajahi Galeri</span>
                        </a>

                        <a href="{{ route('about') }}"
                            class="inline-flex items-center justify-center space-x-2 bg-primary-700/30 text-white text-sm sm:text-base px-4 sm:px-6 py-2 sm:py-3 rounded-md font-semibold hover:bg-primary-700/50 hover:scale-105 will-change-transform transition-all duration-200 border border-primary-400/30">
                            <span>Lebih Lanjut</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-20 translate-x-32 floating-shape-1"></div>
            <div class="hidden sm:block absolute bottom-0 right-0 w-96 h-96 bg-white/5 rounded-full translate-y-48 translate-x-48 floating-shape-2"></div>
            <div class="hidden sm:block absolute top-0 left-0 w-96 h-96 bg-white/5 rounded-full translate-y-48 -translate-x-20 floating-shape-3"></div>
            
            <div class="sm:hidden absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -translate-y-10 translate-x-20 floating-shape-mobile-1"></div>
            <div class="sm:hidden absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-32 -translate-x-16 floating-shape-mobile-2"></div>
        </div>

        <div class="mb-20 sm:mb-24 lg:mb-28" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center mb-12 sm:mb-16 lg:mb-20">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-neutral-900 mb-2 sm:mb-4">Statistik Repository</h2>
                    <p class="text-base sm:text-lg text-neutral-600 max-w-2xl mx-auto px-4 sm:px-0">
                        Lihat pencapaian dan perkembangan komunitas kreatif kami
                    </p>
                </div>

                @if (!empty($stats))
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        <div
                            class="group bg-white rounded-xl sm:rounded-2xl p-6 shadow-sm border border-neutral-200/50 hover:shadow-xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-1 will-change-transform">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300 will-change-transform">
                                    <i data-lucide="image" class="w-5 h-5 text-white"></i>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-medium text-neutral-600 uppercase tracking-wide">Total Media</p>
                                <p class="text-xl sm:text-3xl font-bold text-neutral-900">{{ number_format($stats['total_media']) }}</p>
                            </div>
                        </div>

                        <div
                            class="group bg-white rounded-xl sm:rounded-2xl p-6 shadow-sm border border-neutral-200/50 hover:shadow-xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-1 will-change-transform">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300 will-change-transform">
                                    <i data-lucide="users" class="w-5 h-5 text-white"></i>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-medium text-neutral-600 uppercase tracking-wide">Total Mahasiswa</p>
                                <p class="text-xl sm:text-3xl font-bold text-neutral-900">{{ number_format($stats['total_mahasiswa']) }}</p>
                            </div>
                        </div>

                        <div
                            class="group bg-white rounded-xl sm:rounded-2xl p-6 shadow-sm border border-neutral-200/50 hover:shadow-xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-1 will-change-transform col-span-2 lg:col-span-1">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300 will-change-transform">
                                    <i data-lucide="graduation-cap" class="w-5 h-5 text-white"></i>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-medium text-neutral-600 uppercase tracking-wide">Total Prodi</p>
                                <p class="text-xl sm:text-3xl font-bold text-neutral-900">{{ number_format($stats['total_prodi']) }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-amber-50 border border-amber-200 rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center mx-4 sm:mx-0">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i data-lucide="alert-triangle" class="w-6 h-6 sm:w-8 sm:h-8 text-amber-600"></i>
                        </div>
                        <h3 class="text-base sm:text-lg font-semibold text-amber-800 mb-2">Statistik Tidak Tersedia</h3>
                        <p class="text-sm sm:text-base text-amber-700">Data statistik sedang tidak dapat ditampilkan saat ini.</p>
                    </div>
                @endif
        </div>

        <div class="mb-20 sm:mb-24 lg:mb-28" data-aos="fade-up" data-aos-delay="150">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-neutral-900 mb-2 sm:mb-4">Jelajahi Kategori Populer</h2>
                <p class="text-base sm:text-lg text-neutral-600 max-w-2xl mx-auto px-4 sm:px-0">
                    Temukan karya digital berdasarkan bidang yang paling diminati.
                </p>
            </div>

            {{-- KODE KATEGORI YANG DIMODIFIKASI MULAI DARI SINI --}}
            @if ($kategoris->isNotEmpty())
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach ($kategoris as $kategori)
                        {{-- KARTU KATEGORI BARU --}}
                        <a href="{{ route('media.index', ['kategori' => $kategori->slug]) }}"
                           class="group block rounded-xl border border-neutral-200/50 bg-white p-6 shadow-sm transition-all duration-300 hover:shadow-xl hover:border-primary-200 hover:-translate-y-1 will-change-transform">
                            
                            <div class="flex h-full flex-col justify-between">
                                {{-- Bagian atas kartu: Nama Kategori --}}
                                <div>
                                    {{-- Elemen dekoratif: Garis gradien yang memanjang saat di-hover --}}
                                    <div class="mb-4 h-1 w-10 rounded-full bg-gradient-to-r from-primary-400 to-primary-600 transition-all duration-300 group-hover:w-16"></div>
                                    
                                    <h3 class="text-lg font-bold text-neutral-800 group-hover:text-primary-600 transition-colors duration-300" title="{{ $kategori->nama_kategori }}">
                                        {{ $kategori->nama_kategori }}
                                    </h3>
                                </div>

                                {{-- Bagian bawah kartu: Jumlah Karya dengan Ikon --}}
                                <div class="mt-5 flex items-center text-sm font-medium text-neutral-600">
                                    {{-- Ikon ditambahkan di sini --}}
                                    <i data-lucide="file-stack" class="mr-2 h-4 w-4 flex-shrink-0 text-neutral-400 group-hover:text-primary-500 transition-colors duration-300"></i>
                                    <span>{{ $kategori->media_count }} Karya</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-8 sm:mt-12">
                     <a href="{{ route('media.index') }}"
                           class="inline-flex items-center justify-center space-x-2 bg-primary-100 text-primary-700 px-5 py-2.5 rounded-lg font-semibold hover:bg-primary-200 transition-all duration-200 will-change-transform text-sm">
                            <span>Lihat Kategori Lainnya</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                </div>
            @else
                <div class="bg-neutral-50 border-2 border-dashed border-neutral-300 rounded-xl sm:rounded-2xl p-8 sm:p-12 text-center mx-4 sm:mx-0">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-neutral-200 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                        <i data-lucide="folder-x" class="w-6 h-6 sm:w-8 sm:h-8 text-neutral-400"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-neutral-600 mb-2">Belum Ada Kategori</h3>
                    <p class="text-sm sm:text-base text-neutral-500">Belum ada kategori yang tersedia saat ini.</p>
                </div>
            @endif
            {{-- AKHIR DARI MODIFIKASI KODE KATEGORI --}}

        </div>
        <div data-aos="fade-up" data-aos-delay="200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12 sm:mb-16 lg:mb-20">
                    <div class="mb-4 sm:mb-0">
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-neutral-900 mb-2 sm:mb-4">Karya Terbaru</h2>
                        <p class="text-base sm:text-lg text-neutral-600">
                            Jelajahi karya-karya digital terkini dari mahasiswa berbakat
                        </p>
                    </div>
                    <div class="mt-2 sm:mt-0">
                        <a href="{{ route('media.index') }}"
                            class="inline-flex items-center space-x-2 text-primary-600 hover:text-primary-700 font-semibold group">
                            <span>Lihat Semua</span>
                            <i data-lucide="arrow-right"
                                class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200 will-change-transform"></i>
                        </a>
                    </div>
                </div>

                @if ($latest_media->isNotEmpty())
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($latest_media as $media)
                            <article
                                class="group bg-white rounded-xl sm:rounded-2xl shadow-sm border border-neutral-200/50 overflow-hidden hover:shadow-xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-1 will-change-transform">
                                <a href="{{ route('media.show', $media) }}" class="block">
                                    <div class="aspect-w-16 aspect-h-9 bg-neutral-100 overflow-hidden">
                                        @if ($media->gambar_cover)
                                            <img src="{{ asset('storage/' . $media->gambar_cover) }}" alt="Cover {{ $media->judul }}"
                                                class="w-full h-32 sm:h-48 object-cover group-hover:scale-105 transition-transform duration-500 will-change-transform">
                                        @else
                                            <div
                                                class="w-full h-32 sm:h-48 bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center">
                                                <i data-lucide="image" class="w-8 h-8 sm:w-12 sm:h-12 text-neutral-400"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-center justify-between mb-3">
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-primary-100 text-primary-700">
                                                {{ Str::limit($media->kategori->nama_kategori ?? 'N/A', 12) }}
                                            </span>
                                            <span class="text-xs text-neutral-500 font-medium">{{ $media->tahun_terbit }}</span>
                                        </div>

                                        <h3
                                            class="text-sm sm:text-base font-semibold text-neutral-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors duration-200">
                                            {{ $media->judul }}
                                        </h3>
                                        
                                        {{-- MODIFIKASI: Menampilkan metadata penulis & prodi di semua ukuran layar --}}
                                        <div class="space-y-1 text-xs text-neutral-600 mb-4">
                                            <p class="font-medium truncate">
                                                {{ $media->mahasiswa->nama_lengkap ?? 'N/A' }}
                                                @if($media->mahasiswa->nim)
                                                    <span class="text-neutral-500">({{ $media->mahasiswa->nim }})</span>
                                                @endif
                                            </p>
                                            <p class="text-neutral-500 truncate">
                                                {{ $media->mahasiswa->prodi->nama_prodi ?? 'N/A' }}
                                            </p>
                                        </div>
                                        
                                        {{-- MODIFIKASI: Tombol "Lihat Detail" selalu terlihat --}}
                                        <div class="pt-3 border-t border-neutral-100">
                                            <span
                                                class="inline-flex items-center space-x-2 text-primary-600 font-medium text-sm group-hover:text-primary-700">
                                                <span>Lihat Detail</span>
                                                <i data-lucide="arrow-right"
                                                    class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200 will-change-transform"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="bg-neutral-50 border-2 border-dashed border-neutral-300 rounded-xl sm:rounded-2xl p-8 sm:p-12 text-center mx-4 sm:mx-0">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-neutral-200 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i data-lucide="image-off" class="w-6 h-6 sm:w-8 sm:h-8 text-neutral-400"></i>
                        </div>
                        <h3 class="text-base sm:text-lg font-semibold text-neutral-600 mb-2">Belum Ada Media</h3>
                        <p class="text-sm sm:text-base text-neutral-500 mb-4 sm:mb-6">Belum ada media yang dipublikasikan saat ini.</p>
                        <a href="{{ route('media.index') }}"
                            class="inline-flex items-center space-x-2 bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg sm:rounded-xl font-medium transition-transform duration-200 hover:scale-105 will-change-transform text-sm sm:text-base">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                            <span>Jelajahi Galeri</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                lucide.createIcons();
                
                const typingElement = document.getElementById('typing-text');
                if (typingElement) {
                    const words = ['di Repository Media', 'Karya Mahasiswa', 'Universitas Nurul Huda'];
                    let currentWordIndex = 0;
                    let currentCharIndex = 0;
                    let isDeleting = false;
                    let isPaused = false;

                    function typeAnimation() {
                        const currentWord = words[currentWordIndex];
                        if (!isDeleting && !isPaused) {
                            if (currentCharIndex < currentWord.length) {
                                typingElement.textContent = currentWord.substring(0, currentCharIndex + 1);
                                currentCharIndex++;
                                setTimeout(typeAnimation, 100);
                            } else {
                                isPaused = true;
                                setTimeout(() => {
                                    isPaused = false;
                                    isDeleting = true;
                                    typeAnimation();
                                }, 2000);
                            }
                        } else if (isDeleting && !isPaused) {
                            if (currentCharIndex > 0) {
                                typingElement.textContent = currentWord.substring(0, currentCharIndex - 1);
                                currentCharIndex--;
                                setTimeout(typeAnimation, 50);
                            } else {
                                isDeleting = false;
                                currentWordIndex = (currentWordIndex + 1) % words.length;
                                setTimeout(typeAnimation, 500);
                            }
                        }
                    }
                    setTimeout(typeAnimation, 1000);
                }

                const canvas = document.getElementById('sparkle-canvas');
                if (canvas) {
                    const ctx = canvas.getContext('2d');
                    const heroWrapper = document.querySelector('.hero-wrapper');
                    let particles = [];
                    let lastMouseX = null;
                    let lastMouseY = null;

                    function resizeCanvas() {
                        canvas.width = heroWrapper.offsetWidth;
                        canvas.height = heroWrapper.offsetHeight;
                    }
                    window.addEventListener('resize', resizeCanvas);
                    resizeCanvas();

                    class Particle {
                        constructor(x, y) {
                            this.x = x;
                            this.y = y;
                            this.size = Math.random() * 8 + 2;
                            this.speedY = Math.random() * 2 + 1;
                            this.opacity = 0.8;
                            this.life = 0;
                            this.maxLife = Math.random() * 30 + 20;
                            this.rotation = Math.random() * 360;
                        }

                        update() {
                            this.y += this.speedY;
                            this.life++;
                            this.opacity = 0.8 * (1 - this.life / this.maxLife);
                            this.size *= 0.95;
                            this.rotation += 2;
                        }

                        draw() {
                            ctx.save();
                            ctx.translate(this.x, this.y);
                            ctx.rotate(this.rotation * Math.PI / 180);
                            ctx.beginPath();
                            for (let i = 0; i < 5; i++) {
                                ctx.lineTo(Math.cos((18 + i * 72) * Math.PI / 180) * this.size, Math.sin((18 + i * 72) * Math.PI / 180) * this.size);
                                ctx.lineTo(Math.cos((54 + i * 72) * Math.PI / 180) * (this.size / 2), Math.sin((54 + i * 72) * Math.PI / 180) * (this.size / 2));
                            }
                            ctx.closePath();
                            ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
                            ctx.fill();
                            ctx.restore();
                        }
                    }

                    let lastParticleTime = 0;
                    function createParticles(x, y) {
                        const now = Date.now();
                        if (now - lastParticleTime > 50) {
                            for (let i = 0; i < 2; i++) {
                                particles.push(new Particle(x + (Math.random() - 0.5) * 20, y + (Math.random() - 0.5) * 20));
                            }
                            lastParticleTime = now;
                        }
                    }

                    heroWrapper.addEventListener('mousemove', (e) => {
                        const rect = heroWrapper.getBoundingClientRect();
                        lastMouseX = e.clientX - rect.left;
                        lastMouseY = e.clientY - rect.top;
                    });
                    
                    heroWrapper.addEventListener('mouseleave', () => {
                        lastMouseX = null;
                        lastMouseY = null;
                    });

                    function animateParticles() {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        if (lastMouseX !== null && lastMouseY !== null) {
                            createParticles(lastMouseX, lastMouseY);
                        }

                        particles = particles.filter(p => p.life < p.maxLife && p.y < canvas.height);
                        particles.forEach(p => {
                            p.update();
                            p.draw();
                        });

                        requestAnimationFrame(animateParticles);
                    }
                    animateParticles();
                }
            });
        </script>
    @endsection