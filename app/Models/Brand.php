<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->order = Brand::max('order') + 1;
        });
    }
}
