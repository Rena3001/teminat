<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lang extends BaseModel
{
    use HasFactory;
    protected $fillable = ['country', 'code', 'image'];
}
