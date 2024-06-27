<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Director extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'image',
        'fullname',
        'position',
        'page_id',
    ];

    protected $translatable = ['position'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'group_id');
    }
}
