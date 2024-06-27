<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class ValveCategory extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
    ];

    protected $translatable = ['title', 'slug'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
