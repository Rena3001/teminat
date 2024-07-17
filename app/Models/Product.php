<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Product extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'pdf_file',
        'brand_id',
        'category_id',
    ];

    protected $translatable = ['title', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->order = Product::max('order') + 1;
        });
    }
}
