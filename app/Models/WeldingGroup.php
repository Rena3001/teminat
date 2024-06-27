<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class WeldingGroup extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'category_id',
        'parent_id',
    ];

    protected $translatable = ['title', 'slug'];


    public function category()
    {
        return $this->belongsTo(ValveCategory::class, 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(WeldingGroup::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'group_id');
    }

    public function groups()
    {
        return $this->hasMany(WeldingGroup::class, 'parent_id');
    }
}
