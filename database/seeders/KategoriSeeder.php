<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Animasi'],
            ['nama_kategori' => 'Video'],
            ['nama_kategori' => 'E-Book'],
            ['nama_kategori' => 'Flibook'],
            ['nama_kategori' => 'Media Pembelajaran Interaktif'],
            ['nama_kategori' => 'Aplikasi Pendidikan'],
            ['nama_kategori' => 'Podcast Edukasi'],
        ];
        
        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}