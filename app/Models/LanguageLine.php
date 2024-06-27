<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\TranslationLoader\LanguageLine as LL;
use App\Traits\AsJsonTrait;

class LanguageLine extends LL
{
    use HasFactory, AsJsonTrait;
}
