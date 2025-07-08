@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

    {{-- Header Halaman --}}
    <div class="bg-white">
        {{-- Mengurangi padding vertikal di mobile (py-20) dan menambahkannya di layar lebih besar (lg:py-28) --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
            <div class="text-center" data-aos="fade-up">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-neutral-900 mb-4 tracking-tight">
                    Mengenal Repository Media
                </h1>
                <p class="text-lg sm:text-xl text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    Sebuah wadah untuk kreativitas, inovasi, dan portofolio digital bagi mahasiswa Universitas Nurul Huda.
                </p>
            </div>
        </div>
    </div>

    {{-- Bagian Misi Aplikasi --}}
    {{-- Menggunakan padding yang lebih konsisten --}}
    <div class="bg-neutral-50/70 border-y border-neutral-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
            {{-- Mengubah gap agar lebih responsif dan menambahkan align-center --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl sm:text-4xl font-bold text-neutral-900 mb-6">Misi Kami</h2>
                    {{-- Menambahkan class `space-y-4` untuk jarak antar paragraf yang konsisten --}}
                    <div class="prose prose-lg max-w-none text-neutral-600 space-y-4">
                        <p>
                            Aplikasi ini dibangun untuk menjadi sebuah platform pusat yang menampilkan dan mengarsipkan
                            berbagai jenis karya media digital yang dihasilkan oleh para mahasiswa.
                        </p>
                        <p>
                            Tujuannya adalah untuk memberikan apresiasi terhadap karya-karya inovatif, sekaligus menjadi
                            portofolio digital yang dapat diakses oleh publik dan calon pemberi kerja. Kami percaya setiap
                            karya berhak mendapatkan panggungnya.
                        </p>
                    </div>
                </div>
                {{-- Sedikit penyesuaian pada kotak ikon agar lebih modern --}}
                <div class="bg-white rounded-2xl p-8 aspect-square lg:aspect-auto lg:h-full flex items-center justify-center border border-neutral-200/80"
                    data-aos="fade-left" data-aos-delay="100">
                    <div class="text-center">
                        <i data-lucide="sparkles" class="w-20 h-20 text-primary-500 mx-auto"></i>
                        <p class="mt-4 text-lg font-semibold text-primary-800">Mengubah Ide Menjadi Karya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bagian Fitur Unggulan --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-neutral-900 mb-4">Fitur Unggulan Platform</h2>
                <p class="text-lg text-neutral-600 max-w-2xl mx-auto">Dirancang untuk memberikan pengalaman terbaik bagi
                    mahasiswa.</p>
            </div>
            {{-- Mengubah gap agar lebih teratur di berbagai ukuran layar --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
                {{-- Kartu Fitur 1: Penambahan efek transisi dan shadow yang lebih baik --}}
                <div
                    class="bg-neutral-50/50 p-8 rounded-2xl border border-neutral-200/80 text-center hover:shadow-xl hover:border-primary-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="w-16 h-16 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="archive" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-2">Galeri Terpusat</h3>
                    <p class="text-neutral-600 leading-relaxed">Semua karya mahasiswa dari berbagai prodi terkumpul dalam
                        satu galeri yang mudah diakses.</p>
                </div>
                {{-- Kartu Fitur 2 --}}
                <div
                    class="bg-neutral-50/50 p-8 rounded-2xl border border-neutral-200/80 text-center hover:shadow-xl hover:border-primary-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="w-16 h-16 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="contact-2" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-2">Portofolio Digital</h3>
                    <p class="text-neutral-600 leading-relaxed">Menjadi rekam jejak digital dan portofolio online bagi
                        setiap mahasiswa yang berkontribusi.</p>
                </div>
                {{-- Kartu Fitur 3 --}}
                <div
                    class="bg-neutral-50/50 p-8 rounded-2xl border border-neutral-200/80 text-center hover:shadow-xl hover:border-primary-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="w-16 h-16 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="search" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-2">Pencarian Canggih</h3>
                    <p class="text-neutral-600 leading-relaxed">Temukan karya dengan mudah berdasarkan judul, nama, prodi,
                        kategori, atau tahun terbit.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bagian Informasi Kreator --}}
    <div class="bg-gradient-to-br from-primary-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
            <div class="max-w-2xl mx-auto text-center" data-aos="fade-up">

                <img src="{{ asset('Foto_Mifta.jpg') }}" alt="Foto Miftakhul Rahman"
                    class="w-24 h-24 rounded-full object-cover mx-auto mb-5 shadow-lg">

                <h2 class="text-3xl sm:text-4xl font-bold text-neutral-900 mb-1">Miftakhul Rahman</h2>
                <p class="text-lg text-primary-700 font-medium mb-4">Pengembang & Kreator Platform</p>
                <p class="text-neutral-600 leading-relaxed text-base sm:text-lg">
                    Platform ini adalah wujud dari dedikasi untuk menciptakan solusi digital yang bermanfaat bagi komunitas
                    akademik.
                </p>

                <div class="flex justify-center space-x-6 mt-8">
                    <!-- Ikon media sosial -->
                    <a href="https://github.com/MiftakhulRahman" class="text-neutral-500 hover:text-primary-600 transition-colors">
                        <i data-lucide="github" class="w-7 h-7"></i>
                    </a>
                    <a href="https://www.instagram.com/m_rahman08/" class="text-neutral-500 hover:text-primary-600 transition-colors">
                        <i data-lucide="instagram" class="w-7 h-7"></i>
                    </a>
                    <a href="https://miftakhulrahman.github.io/" class="text-neutral-500 hover:text-primary-600 transition-colors">
                        <i data-lucide="globe" class="w-7 h-7"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
