<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class WeldingCategory extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'image_sm',
    ];

    protected $translatable = ['title', 'slug'];


    public function groups()
    {
        return $this->hasMany(WeldingGroup::class, 'category_id');
    }
}
