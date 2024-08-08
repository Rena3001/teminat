<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory,HasTranslations;
    protected $fillable = [
        'title',
        'slug'
    ];
    protected $translatable = ['title', 'slug'];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_tag');
    }
}
