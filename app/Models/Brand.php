<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Brand extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
    ];

    protected $translatable = ['title'];
}
