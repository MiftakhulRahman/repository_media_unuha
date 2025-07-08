@extends('layouts.admin')

{{-- Mengirim judul halaman ke layout utama --}}
@section('page-title', 'Pengaturan Profil')

@section('content')
<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Breadcrumb dan Tombol Aksi --}}
    <div class="flex justify-between items-center mb-6">
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-neutral-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-neutral-500 md:ms-2">Profil Saya</span>
                    </div>
                </li>
            </ol>
        </nav>
        <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg shadow-sm hover:bg-primary-700 focus:outline-none">
            Simpan Perubahan
        </button>
    </div>

    {{-- Layout 2 Kolom --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Kiri: Foto Profil --}}
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-xl border border-neutral-200/80 shadow-sm text-center">
                <h3 class="text-lg font-semibold text-neutral-800 mb-4">Foto Profil</h3>
                <div class="w-32 h-32 rounded-full mx-auto bg-neutral-100 flex items-center justify-center overflow-hidden mb-4 border-2 border-white shadow-md">
                    @if ($admin->profile_photo_path)
                        <img id="photo-preview" src="{{ asset('storage/' . $admin->profile_photo_path) }}" alt="Foto Profil" class="w-full h-full object-cover">
                    @else
                        <img id="photo-preview" src="https://ui-avatars.com/api/?name={{ urlencode($admin->name) }}&color=7F9CF5&background=EBF4FF" alt="Foto Profil" class="w-full h-full object-cover">
                    @endif
                </div>
                <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="hidden" onchange="previewImage(event)">
                <label for="profile_photo" class="cursor-pointer inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-50">
                    Pilih Foto Baru
                </label>
                <p class="text-xs text-neutral-500 mt-2">Kosongkan jika tidak ingin mengubah.</p>
            </div>
        </div>

        {{-- Kolom Kanan: Informasi & Password --}}
        <div class="lg:col-span-2 space-y-8">
            {{-- Card Informasi Profil --}}
            <div class="bg-white p-8 rounded-xl border border-neutral-200/80 shadow-sm">
                <h3 class="text-lg font-semibold text-neutral-800 border-b border-neutral-200 pb-4 mb-6">Informasi Akun</h3>
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-neutral-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $admin->name) }}" required class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-neutral-700">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}" required class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
            </div>

            {{-- Card Ubah Password --}}
            <div class="bg-white p-8 rounded-xl border border-neutral-200/80 shadow-sm">
                <h3 class="text-lg font-semibold text-neutral-800 border-b border-neutral-200 pb-4 mb-6">Ubah Password</h3>
                <p class="text-sm text-neutral-500 mb-6">Kosongkan semua kolom di bawah ini jika Anda tidak ingin mengubah password Anda.</p>
                <div class="space-y-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-neutral-700">Password Baru</label>
                        <input type="password" id="password" name="password" autocomplete="new-password" class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-neutral-700">Konfirmasi Password Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" class="mt-1 block w-full px-4 py-2.5 border border-neutral-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('photo-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush