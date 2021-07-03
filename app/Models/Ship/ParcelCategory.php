<?php

namespace App\Models\Ship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ParcelCategory extends Model
{
    use HasFactory, HasSlug;

    protected $fillable =
        [
            'title',
            'slug',
            'weight',
            'size',
            'price',
        ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
