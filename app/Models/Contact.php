<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'email',
        'proffession',
        'number',
        'file',
        'note',
    ];
}
