<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Setting extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'fb',
        'tw',
        'in',
        'inst',
        'yt',
        'address',
        'phone',
        'fax',
        'email',
        'home_about_title',
        'home_about_subtitle',
        'footer_title',
        'about_title',
        'about_iframe',
        'contact_title',
        'categories_title',
        'home_about_desc',
        'about_desc',
        'image_logo_light',
        'image_logo_dark',
        'logo_light',
        'logo_dark',
        'favicon',
        'iframe_map',
        'about_banner',
        'contact_image',
    ];

    protected $translatable = [
        'home_about_title',
        'home_about_subtitle',
        'home_about_desc',
        'footer_title',
        'about_title',
        'about_desc',
        'contact_title',
        'categories_title',
        'address',
    ];
}
