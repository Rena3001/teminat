<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class WeldingSlider extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'image',
        'title',
        'subtitle',
    ];

    protected $translatable = ['title', 'subtitle',];
}
