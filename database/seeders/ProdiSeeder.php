<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        $prodis = [
            ['nama_prodi' => 'Pendidikan Bahasa dan Sastra Indonesia', 'singkatan' => 'PBSI'],
            ['nama_prodi' => 'Pendidikan Teknologi Informasi', 'singkatan' => 'PTI'],
            ['nama_prodi' => 'Pendidikan Bahasa Inggris', 'singkatan' => 'PBI'],
            ['nama_prodi' => 'Pendidikan Ekonomi', 'singkatan' => 'PE'],
            ['nama_prodi' => 'Pendidikan Fisika', 'singkatan' => 'PS'],
            ['nama_prodi' => 'Pendidikan Agama Islam', 'singkatan' => 'PAI'],
            ['nama_prodi' => 'Pendidikan Guru Madrasah Ibtidaiyah', 'singkatan' => 'PGMI'],
        ];
        
        foreach ($prodis as $prodi) {
            Prodi::create($prodi);
        }
    }
}