<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Branch extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'address',
        'phone',
        'fax',
        'email_domestic',
        'email_request',
        'map_link',
    ];

    protected $translatable = ['title'];
}
