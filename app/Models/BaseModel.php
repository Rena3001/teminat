<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\AsJsonTrait;

class BaseModel extends Model
{
    use HasFactory, AsJsonTrait;
}
