<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Media extends Model
{
    use HasFactory, HasSlug;
    
    protected $primaryKey = 'media_id';
    
    protected $table = 'media';
    
    protected $fillable = [
        'mahasiswa_id',
        'kategori_id',
        'judul',
        'slug',
        'gambar_cover',
        'deskripsi',
        'judul_penelitian',
        'tahun_terbit',
        'link_media'
    ];
    
    /**
     * Relasi Many to One: Banyak Media milik satu Mahasiswa
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'mahasiswa_id');
    }
    
    /**
     * Relasi Many to One: Banyak Media milik satu Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    public function getSlugOptions(): SlugOptions
    {
    return SlugOptions::create()
        ->generateSlugsFrom('judul')
        ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}