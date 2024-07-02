<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends BaseModel
{
    use HasFactory,  HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'parent_id',
    ];

    protected $translatable = ['title', 'slug'];



    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault();
    }

    public function childrenCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        if (!$this->parent_id) {
            $childrenCategories = $this->childrenCategories();
            if ($childrenCategories) {
                return $this->hasMany(Product::class, 'category_id')->whereIn('category_id', $childrenCategories->pluck('id'));
            }
        } else {
            return $this->hasMany(Product::class, 'category_id');
        }
    }
}