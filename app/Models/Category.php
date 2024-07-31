<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends BaseModel
{
    use HasFactory,  HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
    ];

    protected $translatable = ['title', 'slug','description'];




}
