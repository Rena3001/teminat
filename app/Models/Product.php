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
        'group_id',
        'category_id',
    ];

    protected $translatable = ['title', 'slug'];

    public function category()
    {
        return $this->belongsTo(ValveCategory::class, 'category_id');
    }

    public function group()
    {
        return $this->belongsTo(WeldingGroup::class, 'group_id');
    }
}
