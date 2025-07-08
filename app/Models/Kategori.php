<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Kategori extends Model
{
    use HasFactory,HasSlug;

    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'nama_kategori',
        'slug'
    ];

    /**
     * Relasi One to Many: Satu Kategori punya banyak Media
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'kategori_id', 'kategori_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_kategori')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
