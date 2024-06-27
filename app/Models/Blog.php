<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Blog extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'desc',
        'desc_short',
        'published_at',
    ];

    protected $translatable = ['title', 'slug', 'desc', 'desc_short'];
}
