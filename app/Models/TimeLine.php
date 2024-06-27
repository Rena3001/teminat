<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class TimeLine extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'image',
        'year',
    ];

    protected $translatable = ['title'];
}
