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
        'image_logo_light',
        'image_logo_dark',
        'home_about_title',
        'home_about_subtitle',
        'home_about_desc',
        'time_line_title',
        'footer_title',
        'address',
        'phone',
        'fax',
        'email',
        'about_banner',
        'about_title',
        'about_desc',
        'about_iframe',
        'contact_title',
        'contact_image',
        'casting_desc',
        'welding_title',
        'welding_image',
        'casting_title',
        'casting_image',
        'valve_title',
        'valve_image',
    ];

    protected $translatable = [
        'home_about_title',
        'home_about_subtitle',
        'home_about_desc',
        'time_line_title',
        'footer_title',
        'about_title',
        'about_desc',
        'contact_title',
        'casting_desc',
        'welding_title',
        'casting_title',
        'valve_title',
    ];
}
