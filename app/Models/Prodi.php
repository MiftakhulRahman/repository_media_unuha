<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Prodi extends Model
{
    use HasFactory, HasSlug;

    protected $primaryKey = 'prodi_id';

    protected $fillable = [
        'nama_prodi',
        'singkatan',
        'slug'
    ];

    /**
     * Relasi One to Many: Satu Prodi punya banyak Mahasiswa
     * hasMany karena prodi_id ada di tabel mahasiswas (foreign key)
     */
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'prodi_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_prodi')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
