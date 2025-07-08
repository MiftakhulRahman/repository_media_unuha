<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');


            // Foreign Key ke Mahasiswa 
            $table->foreignId('mahasiswa_id')
                ->constrained('mahasiswas', 'mahasiswa_id')
                ->cascadeOnDelete(); // CASCADE: hapus mahasiswa = hapus semua medianya

            // Foreign Key ke Kategori 
            $table->foreignId('kategori_id')
                ->nullable() // Harus nullable karena SET NULL
                ->constrained('kategoris', 'kategori_id')
                ->nullOnDelete(); // SET NULL: hapus kategori = set kategori_id jadi null

            $table->string('judul');
            $table->string('gambar_cover')->nullable();
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('judul_penelitian');
            $table->year('tahun_terbit');
            $table->string('link_media');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
