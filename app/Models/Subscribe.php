<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribe extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'country',
        'email',
    ];
}
