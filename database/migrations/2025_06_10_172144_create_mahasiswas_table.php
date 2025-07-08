<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('mahasiswa_id');
            $table->string('nim')->unique();
            $table->string('nama_lengkap');
            $table->string('slug')->unique();
            
            // Foreign Key ke Prodi
            $table->foreignId('prodi_id')
                  ->constrained('prodis', 'prodi_id')
                  ->restrictOnDelete(); // RESTRICT: tidak bisa hapus prodi jika masih ada mahasiswa
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};