<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Repository Media')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'outfit': ['Outfit', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        neutral: {
                            50: '#fafafa',
                            100: '#f5f5f5',
                            200: '#e5e5e5',
                            300: '#d4d4d4',
                            400: '#a3a3a3',
                            500: '#737373',
                            600: '#525252',
                            700: '#404040',
                            800: '#262626',
                            900: '#171717',
                        }
                    },
                    animation: {
                        'aurora': 'aurora 60s linear infinite',
                    },
                    keyframes: {
                        aurora: {
                            '0%': {
                                transform: 'translate(0px, 0px) rotate(0deg)'
                            },
                            '25%': {
                                transform: 'translate(40px, -60px) rotate(90deg)'
                            },
                            '50%': {
                                transform: 'translate(80px, 20px) rotate(180deg)'
                            },
                            '75%': {
                                transform: 'translate(-40px, 80px) rotate(270deg)'
                            },
                            '100%': {
                                transform: 'translate(0px, 0px) rotate(360deg)'
                            },
                        }
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', system-ui, sans-serif;
            background-color: #FAFAFA;
        }

        /* Kelas utility untuk akselerasi hardware pada animasi transform */
        .will-change-transform {
            will-change: transform;
        }

        .hamburger-line {
            display: block;
            height: 2px;
            width: 100%;
            background-color: currentColor;
            transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55), opacity 0.3s ease-in-out;
            transform-origin: center;
        }

        #mobile-menu-button.open .hamburger-line-top {
            transform: translateY(8px) rotate(45deg);
        }

        #mobile-menu-button.open .hamburger-line-middle {
            opacity: 0;
            transform: scale(0);
        }

        #mobile-menu-button.open .hamburger-line-bottom {
            transform: translateY(-8px) rotate(-45deg);
        }

        #mobile-menu {
            transform: translateY(-1rem);
            opacity: 0;
            visibility: hidden;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out, visibility 0.3s;
        }
        
        #mobile-menu.open {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body class="h-full bg-neutral-50 text-neutral-900 antialiased">
    <div class="min-h-full flex flex-col">
        <header class="bg-white/80 backdrop-blur-xl border-b border-neutral-200/80 sticky top-0 z-50 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    {{-- Logo di sebelah kiri --}}
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('logo.png') }}" alt="" width="40">
                        <span class="text-xl font-bold text-neutral-900 tracking-tight">Repository Media</span>
                    </a>

                    {{-- Navigasi kanan: untuk guest atau admin --}}
                    <div class="flex items-center space-x-2">
                        {{-- Navigasi desktop --}}
                        <nav class="hidden md:flex items-center space-x-2">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ request()->routeIs('home')
                                          ? 'text-primary-600 bg-primary-100/60 font-semibold hover:bg-primary-200/60'
                                          : 'text-neutral-700 hover:text-neutral-900 hover:bg-neutral-100' }}">
                                <span>Beranda</span>
                            </a>
                            <a href="{{ route('media.index') }}"
                                class="inline-flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ request()->routeIs('media.*')
                                          ? 'text-primary-600 bg-primary-100/60 font-semibold hover:bg-primary-200/60'
                                          : 'text-neutral-700 hover:text-neutral-900 hover:bg-neutral-100' }}">
                                <span>Media</span>
                            </a>
                            <a href="{{ route('about') }}"
                                class="inline-flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ request()->routeIs('about')
                                          ? 'text-primary-600 bg-primary-100/60 font-semibold hover:bg-primary-200/60'
                                          : 'text-neutral-700 hover:text-neutral-900 hover:bg-neutral-100' }}">
                                <span>Tentang</span>
                            </a>
                        </nav>

                        {{-- Profil admin, tampil jika sudah login --}}
                        @auth('admin')
                            <div class="relative group ml-4">
                                <button
                                    class="flex items-center space-x-2 text-sm rounded-full pl-2 pr-3 py-1.5 text-neutral-700 hover:bg-neutral-100 transition-all duration-200">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center overflow-hidden">
                                        @php $admin = Auth::guard('admin')->user(); @endphp
                                        @if ($admin && $admin->profile_photo_path)
                                            <img src="{{ asset('storage/' . $admin->profile_photo_path) }}"
                                                alt="Foto Profil" class="w-full h-full object-cover">
                                        @else
                                            <span
                                                class="text-white font-semibold text-sm">{{ substr($admin->name, 0, 1) }}</span>
                                        @endif
                                    </div>
                                    <span class="hidden sm:block font-medium">{{ $admin->name }}</span>
                                    <i data-lucide="chevron-down" class="w-4 h-4 opacity-70"></i>
                                </button>
                                {{-- Dropdown profil admin dengan animasi halus --}}
                                <div
                                    class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl shadow-neutral-900/10 border border-neutral-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform group-hover:translate-y-0 translate-y-2 will-change-[transform,opacity]">
                                    <div class="py-2 px-2">
                                        <div class="px-3 py-2">
                                            <p class="text-sm font-semibold text-neutral-800">{{ $admin->name }}</p>
                                            <p class="text-xs text-neutral-500 truncate">{{ $admin->email }}</p>
                                        </div>
                                        <hr class="my-1 border-neutral-200/70">
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="flex items-center w-full px-3 py-2 text-sm text-neutral-700 hover:bg-neutral-100 hover:text-primary-600 rounded-md transition-colors">
                                            <i data-lucide="layout-dashboard" class="w-4 h-4 mr-2.5"></i> Dashboard
                                        </a>
                                        <hr class="my-1 border-neutral-200/70">
                                        <button onclick="document.getElementById('logout-form-public').submit();"
                                            class="flex items-center w-full px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-md transition-colors">
                                            <i data-lucide="log-out" class="w-4 h-4 mr-2.5"></i> Logout
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form id="logout-form-public" action="{{ route('admin.logout') }}" method="POST"
                                class="hidden">@csrf</form>
                        @endauth

                        <button id="mobile-menu-button"
                            class="md:hidden p-2 rounded-lg text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 transition-colors"
                            onclick="toggleMobileMenu()" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Buka menu utama</span>
                            <div class="w-6 h-6 flex flex-col justify-around items-center">
                                <span class="hamburger-line hamburger-line-top"></span>
                                <span class="hamburger-line hamburger-line-middle"></span>
                                <span class="hamburger-line hamburger-line-bottom"></span>
                            </div>
                        </button>
                    </div>
                </div>

                <div id="mobile-menu" class="md:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-xl shadow-lg">
                    <div class="flex flex-col space-y-1 pt-2 pb-4 px-4">
                        <a href="{{ route('home') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-lg text-base font-medium transition-all duration-200
                                  {{ request()->routeIs('home') ? 'text-primary-600 bg-primary-100/60 font-semibold hover:bg-primary-200/60' : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                            <span>Beranda</span>
                        </a>
                        <a href="{{ route('media.index') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-lg text-base font-medium transition-all duration-200
                                  {{ request()->routeIs('media.*') ? 'text-primary-600 bg-primary-100/60 font-semibold hover:bg-primary-200/60' : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                            <span>Media</span>
                        </a>
                        <a href="{{ route('about') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-lg text-base font-medium transition-all duration-200
                                  {{ request()->routeIs('about') ? 'text-primary-600 bg-primary-100/60 font-semibold hover:bg-primary-200/60' : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                            <span>Tentang</span>
                        </a>
                        
                        {{-- [MODIFIKASI] Keterangan dan Sosial Media di Mobile Menu --}}
                        <div class="pt-4 mt-4 border-t border-neutral-200/80">
                            <p class="px-3 text-sm text-neutral-500 mb-6">Terhubung dengan kami di media sosial.</p>
                            <div class="flex items-center space-x-4 px-3">
                                <a href="https://www.instagram.com/m_rahman08/" class="text-neutral-500 hover:text-primary-600 transition-colors">
                                    <i data-lucide="instagram" class="w-6 h-6"></i>
                                </a>
                                <a href="https://web.facebook.com/miftakhul.rahman.75" class="text-neutral-500 hover:text-primary-600 transition-colors">
                                    <i data-lucide="facebook" class="w-6 h-6"></i>
                                </a>
                                <a href="https://github.com/MiftakhulRahman" class="text-neutral-500 hover:text-primary-600 transition-colors">
                                    <i data-lucide="github" class="w-6 h-6"></i>
                                </a>
                            </div>
                        </div>

                        {{-- Menu admin mobile, tampil jika sudah login --}}
                        @auth('admin')
                            <div class="pt-4 mt-4 border-t border-neutral-200/80">
                                <div class="px-3 py-2 mb-2">
                                    <p class="text-sm font-semibold text-neutral-800">
                                        {{ Auth::guard('admin')->user()->name }}</p>
                                    <p class="text-xs text-neutral-500">{{ Auth::guard('admin')->user()->email }}</p>
                                </div>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="flex items-center space-x-3 px-3 py-3 rounded-lg text-base font-medium text-neutral-700 hover:text-primary-600 hover:bg-primary-50 transition-all duration-200">
                                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                                    <span>Dashboard</span>
                                </a>
                                <button onclick="document.getElementById('logout-form-mobile').submit();"
                                    class="flex items-center space-x-3 px-3 py-3 rounded-lg text-base font-medium text-red-600 hover:bg-red-50 transition-all duration-200 w-full text-left">
                                    <i data-lucide="log-out" class="w-5 h-5"></i>
                                    <span>Logout</span>
                                </button>
                            </div>
                            <form id="logout-form-mobile" action="{{ route('admin.logout') }}" method="POST"
                                class="hidden">@csrf</form>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-grow">
            @yield('content')
        </main>

        <footer class="bg-white border-t border-neutral-200/80 mt-24">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="space-y-4 col-span-2 md:col-span-1">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3">
                            <img src="{{ asset('logo.png') }}" alt="" width="40">
                            <span class="text-xl font-bold text-neutral-900">Repository Media</span>
                        </a>
                        <p class="text-sm text-neutral-600">Platform untuk menampilkan karya media digital mahasiswa
                            dengan desain modern dan fitur lengkap.</p>
                        
                        {{-- [MODIFIKASI] Mengganti Ikon Sosial Media di Footer --}}
                        <div class="flex space-x-4">
                            <a href="https://www.instagram.com/m_rahman08/" class="text-neutral-500 hover:text-primary-600 transition-colors"><i
                                    data-lucide="instagram" class="w-5 h-5"></i></a>
                            <a href="https://web.facebook.com/miftakhul.rahman.75" class="text-neutral-500 hover:text-primary-600 transition-colors"><i
                                    data-lucide="facebook" class="w-5 h-5"></i></a>
                            <a href="https://github.com/MiftakhulRahman" class="text-neutral-500 hover:text-primary-600 transition-colors"><i
                                    data-lucide="github" class="w-5 h-5"></i></a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-neutral-900 tracking-wider uppercase">Jelajahi</h3>
                        <ul class="mt-4 space-y-3">
                            <li><a href="{{ route('home') }}"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Beranda</a>
                            </li>
                            <li><a href="{{ route('media.index') }}"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Repository
                                    Media</a></li>
                            <li><a href="{{ route('about') }}"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Tentang
                                    Kami</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-neutral-900 tracking-wider uppercase">Bantuan</h3>
                        <ul class="mt-4 space-y-3">
                            <li><a href="#"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Panduan
                                    Penggunaan</a></li>
                            <li><a href="#"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">FAQ</a>
                            </li>
                            <li><a href="#"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Kontak
                                    Support</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-neutral-900 tracking-wider uppercase">Informasi</h3>
                        <ul class="mt-4 space-y-3">
                            <li><a href="#"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Kebijakan
                                    Privasi</a></li>
                            <li><a href="#"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Syarat
                                    & Ketentuan</a></li>
                            <li><a href="#"
                                    class="text-sm text-neutral-600 hover:text-primary-600 hover:underline transition-colors">Kontribusi</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-neutral-200/80 text-center text-sm text-neutral-500">
                    &copy; {{ date('Y') }} Miftakhul Rahman. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();

        // Inisialisasi animasi AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
        });

        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        function toggleMobileMenu() {
            menuButton.classList.toggle('open');
            mobileMenu.classList.toggle('open');

            const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', !isExpanded);
        }

        document.addEventListener('click', function(event) {
            const isClickInsideButton = menuButton.contains(event.target);
            const isClickInsideMenu = mobileMenu.contains(event.target);

            if (mobileMenu.classList.contains('open') && !isClickInsideButton && !isClickInsideMenu) {
                toggleMobileMenu();
            }
        });
    </script>
</body>

</html>