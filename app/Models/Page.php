<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Page extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'image_banner',
        'iframe_url',
        'pdf_file',
    ];

    protected $translatable = ['title', 'slug', 'desc'];

    public function directors()
    {
        return $this->hasMany(Director::class, 'page_id');
    }
}
