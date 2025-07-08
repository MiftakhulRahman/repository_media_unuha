{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'Dashboard Admin')</title>

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
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
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

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Outfit', system-ui, sans-serif;
            background-color: #FAFAFA;
        }

        .will-change-transform {
            will-change: transform;
        }

        /* Custom scrollbar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Sidebar animation */
        .sidebar-enter {
            transform: translateX(-100%);
        }

        .sidebar-enter-active {
            transform: translateX(0);
            transition: transform 0.3s ease-out;
        }
    </style>
</head>

<body class="h-full bg-neutral-50 text-neutral-900 antialiased">
    <div class="min-h-full flex">
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl border-r border-neutral-200/80 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0 transition-transform duration-300 ease-in-out">
            <div class="flex flex-col h-full">
                <div class="flex items-center h-16 px-4 border-b border-neutral-200/80">
                    <div class="flex items-center space-x-3 w-full">
                        <img src="{{ asset('logo.png') }}" alt="" width="40">
                        <span class="text-xl font-bold text-neutral-900 tracking-tight">Repository Media</span>
                    </div>
                </div>

                <nav class="flex-1 p-4 space-y-2 overflow-y-auto scrollbar-thin">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group
                              {{ request()->routeIs('admin.dashboard')
                                  ? 'text-primary-700 bg-primary-100/80 shadow-sm'
                                  : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                        <div class="flex items-center justify-center w-5 h-5">
                            <i data-lucide="layout-dashboard"
                                class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-primary-600' : 'text-neutral-500 group-hover:text-primary-500' }}"></i>
                        </div>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.prodi.index') }}"
                        class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group
                              {{ request()->routeIs('admin.prodi.*')
                                  ? 'text-primary-700 bg-primary-100/80 shadow-sm'
                                  : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                        <div class="flex items-center justify-center w-5 h-5">
                            <i data-lucide="graduation-cap"
                                class="w-5 h-5 {{ request()->routeIs('admin.prodi.*') ? 'text-primary-600' : 'text-neutral-500 group-hover:text-primary-500' }}"></i>
                        </div>
                        <span>Kelola Prodi</span>
                    </a>

                    <a href="{{ route('admin.kategori.index') }}"
                        class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group
                              {{ request()->routeIs('admin.kategori.*')
                                  ? 'text-primary-700 bg-primary-100/80 shadow-sm'
                                  : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                        <div class="flex items-center justify-center w-5 h-5">
                            <i data-lucide="folder"
                                class="w-5 h-5 {{ request()->routeIs('admin.kategori.*') ? 'text-primary-600' : 'text-neutral-500 group-hover:text-primary-500' }}"></i>
                        </div>
                        <span>Kelola Kategori</span>
                    </a>

                    <a href="{{ route('admin.mahasiswa.index') }}"
                        class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group
                              {{ request()->routeIs('admin.mahasiswa.*')
                                  ? 'text-primary-700 bg-primary-100/80 shadow-sm'
                                  : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                        <div class="flex items-center justify-center w-5 h-5">
                            <i data-lucide="users"
                                class="w-5 h-5 {{ request()->routeIs('admin.mahasiswa.*') ? 'text-primary-600' : 'text-neutral-500 group-hover:text-primary-500' }}"></i>
                        </div>
                        <span>Kelola Mahasiswa</span>
                    </a>

                    <a href="{{ route('admin.media.index') }}"
                        class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group
                              {{ request()->routeIs('admin.media.*')
                                  ? 'text-primary-700 bg-primary-100/80 shadow-sm'
                                  : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                        <div class="flex items-center justify-center w-5 h-5">
                            <i data-lucide="image"
                                class="w-5 h-5 {{ request()->routeIs('admin.media.*') ? 'text-primary-600' : 'text-neutral-500 group-hover:text-primary-500' }}"></i>
                        </div>
                        <span>Kelola Media</span>
                    </a>

                    <div class="pt-4 mt-4 border-t border-neutral-200/80">
                        <p class="px-3 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-3">Akun &
                            Situs</p>

                        <a href="{{ route('admin.profile.edit') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group
                                  {{ request()->routeIs('admin.profile.*')
                                      ? 'text-primary-700 bg-primary-100/80 shadow-sm'
                                      : 'text-neutral-700 hover:text-primary-600 hover:bg-primary-50' }}">
                            <div class="flex items-center justify-center w-5 h-5">
                                <i data-lucide="user-cog"
                                    class="w-5 h-5 {{ request()->routeIs('admin.profile.*') ? 'text-primary-600' : 'text-neutral-500 group-hover:text-primary-500' }}"></i>
                            </div>
                            <span>Profil Saya</span>
                        </a>

                        <a href="{{ route('home') }}" target="_blank"
                            class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group text-neutral-700 hover:text-primary-600 hover:bg-primary-50">
                            <div class="flex items-center justify-center w-5 h-5">
                                <i data-lucide="external-link"
                                    class="w-5 h-5 text-neutral-500 group-hover:text-primary-500"></i>
                            </div>
                            <span>Lihat Situs</span>
                        </a>
                    </div>
                </nav>

                <div class="p-4 border-t border-neutral-200/80">
                    <button onclick="document.getElementById('logout-form').submit();"
                        class="flex items-center space-x-3 px-3 py-3 rounded-lg text-sm font-medium transition-all duration-200 group w-full text-red-600 hover:bg-red-50">
                        <div class="flex items-center justify-center w-5 h-5">
                            <i data-lucide="log-out" class="w-5 h-5 text-red-500"></i>
                        </div>
                        <span>Logout</span>
                    </button>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col lg:ml-0">
            <header class="bg-white/90 backdrop-blur-xl border-b border-neutral-200/80 sticky top-0 z-40">
                <div class="flex items-center justify-between h-16 px-6">
                    <div class="flex items-center space-x-4">
                        <button id="sidebar-toggle"
                            class="lg:hidden p-2 rounded-lg text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 transition-colors">
                            <i data-lucide="menu" class="w-6 h-6"></i>
                        </button>
                        <div>
                            <h2 class="text-lg font-semibold text-neutral-900">@yield('page-title', 'Dashboard')</h2>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="relative group">
                            <button
                                class="flex items-center space-x-2 text-sm rounded-full pl-2 pr-3 py-1.5 text-neutral-700 hover:bg-neutral-100 transition-all duration-200">
                                <div
                                    class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center overflow-hidden">
                                    @php $admin = Auth::guard('admin')?->user(); @endphp
                                    @if ($admin && $admin->profile_photo_path)
                                        <img src="{{ asset('storage/' . $admin->profile_photo_path) }}"
                                            alt="Foto Profil" class="w-full h-full object-cover">
                                    @else
                                        <span
                                            class="text-white font-semibold text-sm">{{ $admin ? substr($admin->name, 0, 1) : 'A' }}</span>
                                    @endif
                                </div>
                                <span class="hidden sm:block font-medium">{{ $admin?->name ?? 'Admin' }}</span>
                                <i data-lucide="chevron-down" class="w-4 h-4 opacity-70"></i>
                            </button>
                            <div
                                class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl shadow-neutral-900/10 border border-neutral-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform group-hover:translate-y-0 translate-y-2 will-change-[transform,opacity]">
                                <div class="py-2 px-2">
                                    <div class="px-3 py-2">
                                        <p class="text-sm font-semibold text-neutral-800">
                                            {{ $admin?->name ?? 'Admin' }}</p>
                                        <p class="text-xs text-neutral-500 truncate">
                                            {{ $admin?->email ?? 'admin@example.com' }}</p>
                                    </div>
                                    <hr class="my-1 border-neutral-200/70">
                                    <a href="{{ route('admin.profile.edit') }}"
                                        class="flex items-center w-full px-3 py-2 text-sm text-neutral-700 hover:bg-neutral-100 hover:text-primary-600 rounded-md transition-colors">
                                        <i data-lucide="user-cog" class="w-4 h-4 mr-2.5"></i> Edit Profil
                                    </a>
                                    <a href="{{ route('home') }}" target="_blank"
                                        class="flex items-center w-full px-3 py-2 text-sm text-neutral-700 hover:bg-neutral-100 hover:text-primary-600 rounded-md transition-colors">
                                        <i data-lucide="external-link" class="w-4 h-4 mr-2.5"></i> Lihat Situs
                                    </a>
                                    <hr class="my-1 border-neutral-200/70">
                                    <button onclick="document.getElementById('logout-form-header').submit();"
                                        class="flex items-center w-full px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-md transition-colors">
                                        <i data-lucide="log-out" class="w-4 h-4 mr-2.5"></i> Logout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto bg-neutral-50">
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg shadow-sm"
                            data-aos="fade-down">
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-600 mr-3 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">Berhasil!</p>
                                    <p class="text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-sm"
                            data-aos="fade-down">
                            <div class="flex items-center">
                                <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 mr-3 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">Error!</p>
                                    <p class="text-sm">{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-sm"
                            data-aos="fade-down">
                            <div class="flex">
                                <i data-lucide="alert-triangle"
                                    class="w-5 h-5 text-red-600 mr-3 flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <p class="font-medium">Whoops! Ada beberapa masalah dengan input Anda:</p>
                                    <ul class="mt-2 text-sm list-disc list-inside space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

    <form id="logout-form-header" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Initialize AOS
        AOS.init({
            duration: 600,
            once: true,
            offset: 50,
        });

        // Sidebar functionality
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        sidebarToggle?.addEventListener('click', openSidebar);
        sidebarOverlay?.addEventListener('click', closeSidebar);

        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                closeSidebar();
            }
        });

        // Auto-close sidebar on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                if (!sidebar.classList.contains('-translate-x-full')) {
                    closeSidebar();
                }
            }
        });

        // Auto-dismiss notifications
        setTimeout(() => {
            const notifications = document.querySelectorAll('[data-aos="fade-down"]');
            notifications.forEach(notification => {
                if (notification.classList.contains('bg-green-50') ||
                    notification.classList.contains('bg-red-50')) {

                    const notificationAos = AOS.getArround(notification)[0];
                    if (notificationAos.settings.shown) {
                        setTimeout(() => {
                            notification.style.transition =
                                'opacity 0.3s ease, transform 0.3s ease';
                            notification.style.opacity = '0';
                            notification.style.transform = 'translateY(-20px)';
                            setTimeout(() => notification.remove(), 300);
                        }, 5000);
                    }
                }
            });
        }, 100);
    </script>

    {{-- MODAL INCLUDE --}}
    @include('layouts.partials.delete-confirm-modal')

    <script>
        // SCRIPT UNTUK MODAL KONFIRMASI HAPUS
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('delete-confirm-modal');
            if (!deleteModal) return;

            const cancelBtn = document.getElementById('cancel-delete-btn');
            const confirmBtn = document.getElementById('confirm-delete-btn');
            const modalText = document.getElementById('modal-text');
            let formToSubmit = null;

            function showModal(form, message) {
                formToSubmit = form;
                modalText.innerHTML = message ||
                    'Aksi ini tidak dapat dibatalkan. Pastikan Anda benar-benar ingin melanjutkan.';
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
                AOS.refreshHard(); // Refresh AOS untuk memutar animasi modal
            }

            function hideModal() {
                formToSubmit = null;
                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
            }

            document.querySelectorAll('button[data-delete-form]').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const message = this.getAttribute('data-delete-message');
                    showModal(form, message);
                });
            });

            confirmBtn.addEventListener('click', function() {
                if (formToSubmit) {
                    formToSubmit.submit();
                }
            });

            cancelBtn.addEventListener('click', hideModal);
            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    hideModal();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !deleteModal.classList.contains('hidden')) {
                    hideModal();
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
