<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Galeri Media</title>

    {{-- Memuat Tailwind CSS dan Font dari Google --}}
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
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }

        .login-container {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(14, 165, 233, 0.1), rgba(56, 189, 248, 0.1));
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 40%;
            left: 5%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a3a3a3;
            transition: color 0.2s;
        }

        .input-field {
            padding-left: 42px;
            padding-right: 42px; 
        }

        .input-group:focus-within .input-icon {
            color: #0ea5e9;
        }
    </style>
</head>

<body class="h-full antialiased relative">
    {{-- Floating Background Shapes --}}
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-md w-full space-y-8">

            {{-- Bagian Header Form --}}
            <div class="text-center">
                {{-- Logo Section --}}
                <img src="{{ asset('logo.png') }}" alt="Logo Galeri Media" width="100" class="flex-shrink-0 mx-auto">

                <h2 class="mt-6 text-3xl font-bold text-neutral-900 mb-2">
                    Halaman Login Admin
                </h2>
                <p class="text-neutral-600">
                    Silakan masuk untuk mengelola konten repository media
                </p>
            </div>

            {{-- Card Form Login --}}
            <div class="login-container p-8 shadow-2xl rounded-2xl space-y-6 border border-white/20">

                {{-- Pesan Error Validasi --}}
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-sm text-red-700 p-4 rounded-xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">Terjadi Kesalahan:</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                    @csrf

                    {{-- Input Email --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-neutral-700 mb-2">
                            Alamat Email
                        </label>
                        <div class="input-group">
                            <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                </path>
                            </svg>
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                autocomplete="email" required
                                class="input-field appearance-none block w-full py-3 border border-neutral-300 rounded-xl shadow-sm placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200"
                                placeholder="admin@galerimedia.com">
                        </div>
                    </div>

                    {{-- Input Password --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-neutral-700 mb-2">
                            Password
                        </label>
                        <div class="input-group">
                            {{-- Ikon Kunci --}}
                            <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="input-field appearance-none block w-full py-3 border border-neutral-300 rounded-xl shadow-sm placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200"
                                placeholder="Masukkan password Anda">
                            
                            {{-- Tombol untuk menampilkan/menyembunyikan password --}}
                            <button type="button" id="togglePasswordVisibility" class="absolute inset-y-0 right-0 flex items-center pr-4 text-neutral-400 hover:text-primary-500">
                                {{-- Ikon Mata Terbuka --}}
                                <svg id="eye-icon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{-- Ikon Mata Tercoret (hidden by default) --}}
                                <svg id="eye-slash-icon" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 .847 0 1.67.129 2.458.368M18 10.5a9.542 9.542 0 01-1.34 4.318m-1.338 1.956A10.04 10.04 0 0112 19M5.25 5.25l13.5 13.5"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Remember Me & Lupa Password --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-neutral-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-neutral-700">
                                Ingat saya
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-primary-600 hover:text-primary-500 transition-colors duration-200">
                                Lupa password?
                            </a>
                        </div>
                    </div>

                    {{-- Tombol Login --}}
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200 transform hover:-translate-y-0.5">
                            Masuk ke Dashboard
                        </button>
                    </div>
                </form>

                {{-- Footer --}}
                <div class="pt-4 border-t border-neutral-200">
                    <p class="text-center text-xs text-neutral-500">
                        &copy; {{ date('Y') }} Repository Media UNUHA. All rights reserved.
                    </p>
                </div>
            </div>

            {{-- Link Kembali ke Home (Posisi Baru) --}}
            <div class="text-center">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-sm font-medium text-primary-600 hover:text-primary-700 transition-colors duration-200 group">
                    <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Website
                </a>
            </div>
        </div>
    </div>
    
    {{-- Script untuk Toggle Password --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePasswordVisibility');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeSlashIcon = document.getElementById('eye-slash-icon');

            toggleButton.addEventListener('click', function () {
                // Cek tipe input saat ini
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Ganti ikon
                eyeIcon.classList.toggle('hidden');
                eyeSlashIcon.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>