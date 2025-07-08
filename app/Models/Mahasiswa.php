<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Mahasiswa extends Model
{
    use HasFactory, HasSlug;

    protected $primaryKey = 'mahasiswa_id';

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'prodi_id',
        'slug'
    ];

    /**
     * Relasi Many to One: Banyak Mahasiswa milik satu Prodi
     * belongsTo karena mahasiswa punya foreign key prodi_id
     */
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'prodi_id');
    }

    /**
     * Relasi One to Many: Satu Mahasiswa punya banyak Media
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'mahasiswa_id', 'mahasiswa_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_lengkap')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
