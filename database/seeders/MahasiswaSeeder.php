<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [
            ['nim' => '22255202045', 'nama_lengkap' => 'Ahmad Budi Santoso', 'prodi_id' => 1],
            ['nim' => '22255202046', 'nama_lengkap' => 'Siti Nurhaliza', 'prodi_id' => 1],
            ['nim' => '22255202047', 'nama_lengkap' => 'Rendi Pratama', 'prodi_id' => 2],
            ['nim' => '22255202048', 'nama_lengkap' => 'Dewi Sartika', 'prodi_id' => 2],
            ['nim' => '22255202049', 'nama_lengkap' => 'Agus Salim', 'prodi_id' => 3],
            ['nim' => '22255202050', 'nama_lengkap' => 'Lestari Indah', 'prodi_id' => 4],
            ['nim' => '22255202051', 'nama_lengkap' => 'Bayu Setiawan', 'prodi_id' => 5],
            ['nim' => '22255202052', 'nama_lengkap' => 'Anisa Rahmawati', 'prodi_id' => 6],
        ];
        
        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}