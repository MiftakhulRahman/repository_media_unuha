<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan penting: yang tidak depend dulu
        $this->call([
            ProdiSeeder::class,
            KategoriSeeder::class,
            MahasiswaSeeder::class,
            MediaSeeder::class,     
            AdminSeeder::class,
        ]);
    }
}