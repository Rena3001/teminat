<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactCard extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
    ];
}
