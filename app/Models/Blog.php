<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory,HasTranslations;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
    ];
    protected $translatable = ['title', 'slug','description'];

}
